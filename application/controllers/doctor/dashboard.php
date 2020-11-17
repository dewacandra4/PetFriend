<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
	{
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $data['title']= 'Dashboard';
        $data['info1']= $this->model_services-> get_mypethealtho_on($result);
        $this->load->view('doctor/header',$data);
        $this->load->view('doctor/sidebar');
		$this->load->view('doctor/dashboard',$data);
		$this->load->view('doctor/footer');
	}
	public function change_password()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('current_password','Current Password','required|trim');
		$this->form_validation->set_rules('new_password1','New Password','required|trim|min_length[10]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2','Repeat New Password','required|trim|min_length[10]|matches[new_password1]');

		if($this->form_validation->run() == false)
		{			
			$this->load->view('doctor/header',$data);
			$this->load->view('doctor/sidebar');
			$this->load->view('doctor/change_password');
			$this->load->view('doctor/footer');
		}
		else
		{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password, $data['user']['password']))
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('doctor/dashboard/change_password');
			}
			else
			{
				if($current_password == $new_password)
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                	redirect('doctor/dashboard/change_password');
				}
				else
				{
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('username',$this->session->userdata('username'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!</div>');
                redirect('doctor/dashboard/change_password');
				}
			}
		}
	}

	public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['doctor']= $row;
        $this->load->view('doctor/header',$data);
        $this->load->view('doctor/sidebar',$data);
        $this->load->view('doctor/profile',$data);
        $this->load->view('doctor/footer');
	}
	
	public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['doctor']= $row;
		$this->form_validation->set_rules('name','name','required|trim');
		$this->form_validation->set_rules('address','address', 'required|trim');
        $this->form_validation->set_rules('phone','phone','required|numeric'); 
        if($this->form_validation->run()==false)
        {
            $this->load->view('doctor/header',$data);
            $this->load->view('doctor/sidebar',$data);
            $this->load->view('doctor/edit',$data);
            $this->load->view('doctor/footer');
        }
        else
        {
            $name = $this->input->post('name'); 
			$address = $this->input->post('address'); 
			$phone = $this->input->post('phone'); 
            $upload_image = $_FILES['image']['name'];

			if($upload_image)
            {
                $config['upload_path'] = './assets/dp';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);//load librari upload
            

                if (!$this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Error file extension or file larger than 2MB <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('doctor/dashboard/profile');
                }
                else
                {
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.jpg')
                    {
                        unlink(FCPATH . 'assets/dp/'. $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }
            
            }
            
            $this->db->set('name', $name);//update isi database 
            $this->db->set('phone', $phone);
            $this->db->set('address', $address);
            $this->db->where('id',$result);
            $this->db->update('user');//update di tablenya user
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Your profile has been updated! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('doctor/dashboard/profile');
        }
    }

    //view list of pet health order that assign to the logged in veterinarian
    public function pethealth_list()
    {
        $data['title'] = 'Pet Health Order List';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['doctor']= $row;
        $data['start'] = $this->uri->segment(4);

                //load library
                $this->load->library('pagination');
                //config
                $config['base_url'] = 'http://localhost/PetFriend/doctor/dashboard/pethealth_list';
                $config['total_rows'] = $this->model_services->get_mypethealtho_on($result);
                $config['per_page'] = 8;
                //styling
                $config['full_tag_open'] = '<nav>
                <ul class="pagination justify-content-center">';
                $config['full_tag_close'] = '</ul>
                </nav>';
                $config['first_link'] = 'First';
                $config['first_tag_open'] = '<li class="page-item">';
                $config['first_tag_close'] = '</li>';
        
                $config['last_link'] = 'Last';
                $config['last_tag_open'] = '<li class="page-item">';
                $config['last_tag_close'] = '</li>';
                
                $config['next_link'] = '&raquo';
                $config['next_tag_open'] = '<li class="page-item">';
                $config['next_tag_close'] = '</li>';
                
                $config['prev_link'] = '&laquo';
                $config['prev_tag_open'] = '<li class="page-item">';
                $config['prev_tag_close'] = '</li>';
                
                $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
                $config['cur_tag_close'] = '</a></li>';
                
                $config['num_tag_open'] = '<li class="page-item">';
                $config['num_tag_close'] = '</li>';
        
                $config['attributes'] = array('class' => 'page-link');
        
                //initialize
                $this->pagination->initialize($config);

        $data['serviceo'] = $this->model_services->get_pethealtho_on($result, $config['per_page'], $data['start'])->result();
        $this->load->view('doctor/header',$data);
        $this->load->view('doctor/sidebar',$data);
        $this->load->view('doctor/pethealtho_list',$data);
        $this->load->view('doctor/footer');
    }

    public function view_reciept_service($oid)
    {
        $data['title'] = 'Pet Health Order Detail';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $service_type= $this->db->query("SELECT `service_id` FROM `services_order` WHERE `sorder_id` = '$oid'")->row()->service_id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['doctor']= $row;
        $data['serviceo'] = $this->model_services->get_myserviceo_orderid($oid)->result();

        $price=$this->db->query("SELECT `price` FROM `services` WHERE `id` = '2'")->row()->price;
        $data['pethealth'] = $this->model_services->get_myhealth_detail($oid)->result();
        $doc= $this->db->query("SELECT `doc_id` FROM `pethealth_order` WHERE `sorder_id` = '$oid'")->row()->doc_id;
        $data['vete'] = $this->model_services->get_vet_data($oid)->result();

        $rept = [
            'price' =>  $price
        ];
        $data['guest']= $rept;

        $this->load->view('doctor/header',$data);
        $this->load->view('doctor/sidebar',$data);
        $this->load->view('doctor/reciept_pethealth',$data);
        $this->load->view('doctor/footer');
    }

     //to download diagnosis result file
     public function download($a)
     {
         $this->load->helper('download');
         $Path = './assets/diagnosis/'.$a;
         $data = file_get_contents($Path);
         $name = $a;
         force_download($name, $data);
     }

     public function complete ($oid)
     {
         $this->db->set('order_status', "Order Complete");
         $this->db->where('sorder_id', $oid);
         $this->db->update('services_order');
         $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
         Pet Health Order with Order id : #'.$oid.' has been Completed <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button></div>');
         redirect('doctor/dashboard/pethealth_list');
 
     }
 


}
