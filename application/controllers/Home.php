<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['products'] = $this->model_products->show_data()->result();
		$data['title']= 'PetFriend';
		$this->load->view('home/header',$data);
		$this->load->view('home/home',$data);
		$this->load->view('home/footer');
	}
	public function products()
	{
		$data['products'] = $this->model_products->show_data()->result();
		$data['title'] = 'Products';
        $this->load->view('home/header',$data);
        $this->load->view('home/products',$data);
        $this->load->view('home/footer');
	}
}