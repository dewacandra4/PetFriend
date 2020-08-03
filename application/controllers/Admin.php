<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
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
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar');
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
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
			$this->load->view('admin/header',$data);
			$this->load->view('admin/sidebar');
			$this->load->view('admin/change_password');
			$this->load->view('admin/footer');
		}
		else
		{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password, $data['user']['password']))
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('admin/change_password');
			}
			else
			{
				if($current_password == $new_password)
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                	redirect('admin/change_password');
				}
				else
				{
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('username',$this->session->userdata('username'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!</div>');
                redirect('admin/change_password');
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
        $data['admin']= $row;
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/profile',$data);
        $this->load->view('admin/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['admin']= $row;
		$this->form_validation->set_rules('name','name','required|trim');
		$this->form_validation->set_rules('address','address', 'required|trim');
        $this->form_validation->set_rules('phone','phone','required|numeric'); 
        if($this->form_validation->run()==false)
        {
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/edit',$data);
            $this->load->view('admin/footer');
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
            
                if(! $this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" 
                    role="alert">Error file extension or file larger than 2MB <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/profile');
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
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" 
            role="alert">Your profile has been updated! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/profile');
        }
    }
}
