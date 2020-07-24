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
}
