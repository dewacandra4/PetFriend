<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller 
{
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
                redirect('customer/change_password');
			}
			else
			{
				if($current_password == $new_password)
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                	redirect('customer/change_password');
				}
				else
				{
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('username',$this->session->userdata('username'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!</div>');
                redirect('customer/change_password');
				}
			}
		}
	}

	public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `role_id` FROM `user` WHERE `username` = '$lol'")->row()->role_id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `role_id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/profile',$data);//ngirim variable user data ke page customer nanti 
        $this->load->view('customer/footer');
    }
}
