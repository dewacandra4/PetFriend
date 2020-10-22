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
		$data['title']= 'Dashboard';
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar');
		$this->load->view('customer/dashboard');
		$this->load->view('customer/footer');
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
			$this->load->view('customer/header',$data);
			$this->load->view('customer/sidebar');
			$this->load->view('customer/change_password');
			$this->load->view('customer/footer');
		}
		else
		{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password, $data['user']['password']))
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('customer/dashboard/change_password');
			}
			else
			{
				if($current_password == $new_password)
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                	redirect('customer/dashboard/change_password');
				}
				else
				{
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('username',$this->session->userdata('username'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!</div>');
                redirect('customer/dashboard/change_password');
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
        $data['customer']= $row;
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/profile',$data);
        $this->load->view('customer/footer');
	}
	
	public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
		$this->form_validation->set_rules('name','name','required|trim');
		$this->form_validation->set_rules('address','address', 'required|trim');
        $this->form_validation->set_rules('phone','phone','required|numeric'); 
        if($this->form_validation->run()==false)
        {
            $this->load->view('customer/header',$data);
            $this->load->view('customer/sidebar',$data);
            $this->load->view('customer/edit',$data);
            $this->load->view('customer/footer');
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
                    redirect('customer/dashboard/profile');
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
            redirect('customer/dashboard/profile');
        }
    }
//view the product order
    public function my_producto()
    {
        $data['title'] = 'My Product Order';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $data['producto'] = $this->model_products->get_myproducto($result)->result();
        $p = $this->model_products->get_myproducto($result)->result();//to verify the payment due date
        $email= $this->db->query("SELECT `email` FROM `user` WHERE `username` = '$lol'")->row()->email;
        $namee= $this->db->query("SELECT `name` FROM `user` WHERE `username` = '$lol'")->row()->name;
        
        date_default_timezone_set('Asia/Singapore');
        foreach ($p as $po)
        {
            if($po->payment_method == "Bank Transfer" || $po->payment_method == "M-Banking" )
            {
                if(time() - $po->order_date > (60 * 60 * 24))
                {
                    $poid=$po->order_id;
                    $this->db->set('order_status', "Canceled");
                    $this->db->where('order_id', $po->order_id);
                    $this->db->update('products_order');
                    //$this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Order with Order Id : #'.$po->order_id
                    //.' has been canceled 
                    //<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   // <span aria-hidden="true">&times;</span>
                    //</button></div>');
                    $this->_sendEmail($poid,$email,$namee);
                    redirect('customer/dashboard/my_producto');
                }
            }
        }

        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/my_producto',$data);
        $this->load->view('customer/footer');
    }

    public function view_reciept($oid)
    {
        $data['title'] = 'Order Detail';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;

        $data['producto_orderid'] = $this->model_products->get_myproducto_orderid($oid)->result();
        $data['producto_detail'] = $this->model_products->get_myproducto_detail($oid)->result();

        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/reciept_product',$data);
        $this->load->view('customer/footer');
    }

    private function _sendEmail($poid,$email,$namee)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'finalprojectdua@gmail.com',
            'smtp_pass' => 'jmVqQvZ3rs9qmC9',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('finalprojectdua@gmail.com', 'PetFriend Admin');
        $this->email->to($email);

            $this->email->subject('Canceled Product Order');
            $this->email->message('Dear '.$namee.', <br> Your Product Order with ID #'.$poid.' has been canceled because you did not make a payment,<br>
            please visit PetFriend website to see more detailed information, <br>Thank You ^^ ');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


}
