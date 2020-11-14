<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller 
{
    public function dog()
    {
        $data['title'] = 'Products';
        
        $data['start'] = $this->uri->segment(4);
        //config
        $config['base_url'] = 'http://localhost/PetFriend/category/dog/index';
        $config['total_rows'] = $this->model_category->countCategoryProducts(2);
        $config['per_page'] = 10;
        
        //Start styling pagination
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
        //end styling pagination

        //initialize
        $this->pagination->initialize($config);
        $data['dog'] = $this->model_category->data_dog($config['per_page'],$data['start'])->result();

        $this->load->view('home/header',$data);
        $this->load->view('home/dog_category',$data);
        $this->load->view('home/footer');
    }
    public function cat()
    {

        $data['title'] = 'Products';

        $data['start'] = $this->uri->segment(4);
  
        //config
        $config['base_url'] = 'http://localhost/PetFriend/category/cat/index';
        $config['total_rows'] = $this->model_category->countCategoryProducts(1);
        $config['per_page'] = 10;
        
        //Start styling pagination
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
        //end styling pagination

        //initialize
        $this->pagination->initialize($config);
        $data['cat'] = $this->model_category->data_cat($config['per_page'],$data['start'])->result();
 
        $this->load->view('home/header',$data);
        $this->load->view('home/cat_category',$data);
        $this->load->view('home/footer');
    }
    public function birds()
    {
        $data['title'] = 'Products';
        $data['start'] = $this->uri->segment(4);
    
        //config
        $config['base_url'] = 'http://localhost/PetFriend/category/birds/index';
        $config['total_rows'] = $this->model_category->countCategoryProducts(3);
        $config['per_page'] = 10;
        
        //Start styling pagination
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
        //end styling pagination

        //initialize
        $this->pagination->initialize($config);
        $data['birds'] = $this->model_category->data_birds($config['per_page'],$data['start'])->result();
        $this->load->view('home/header',$data);
        $this->load->view('home/birds_category',$data);
        $this->load->view('home/footer');
    }
    public function smallp()
    {
        $data['title'] = 'Products';
        $data['start'] = $this->uri->segment(4);

        //config
        $config['base_url'] = 'http://localhost/PetFriend/category/smallp/index';
        $config['total_rows'] = $this->model_category->countCategoryProducts(4);
        $config['per_page'] = 10;
        
        //Start styling pagination
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
        //end styling pagination

        //initialize
        $this->pagination->initialize($config);
        $data['smallp'] = $this->model_category->data_smallpet($config['per_page'],$data['start'])->result();
        $this->load->view('home/header',$data);
        $this->load->view('home/smallp_category',$data);
        $this->load->view('home/footer');
    }
}