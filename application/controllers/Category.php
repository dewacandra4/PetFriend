<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller 
{
    public function dog()
    {
        $data['dog'] = $this->model_category->data_dog()->result();
        $data['title'] = 'Products';
        $this->load->view('home/header',$data);
        $this->load->view('home/products',$data);
        $this->load->view('home/footer');
    }
}