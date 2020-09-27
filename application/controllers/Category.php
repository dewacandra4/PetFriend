<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller 
{
    public function dog()
    {
        $data['dog'] = $this->model_category->data_dog()->result();
        $data['title'] = 'Products';
        $this->load->view('home/header',$data);
        $this->load->view('home/dog_category',$data);
        $this->load->view('home/footer');
    }
    public function cat()
    {
        $data['cat'] = $this->model_category->data_cat()->result();
        $data['title'] = 'Products';
        $this->load->view('home/header',$data);
        $this->load->view('home/cat_category',$data);
        $this->load->view('home/footer');
    }
    public function birds()
    {
        $data['birds'] = $this->model_category->data_birds()->result();
        $data['title'] = 'Products';
        $this->load->view('home/header',$data);
        $this->load->view('home/birds_category',$data);
        $this->load->view('home/footer');
    }
    public function smallp()
    {
        $data['smallp'] = $this->model_category->data_smallpet()->result();
        $data['title'] = 'Products';
        $this->load->view('home/header',$data);
        $this->load->view('home/smallp_category',$data);
        $this->load->view('home/footer');
    }
}