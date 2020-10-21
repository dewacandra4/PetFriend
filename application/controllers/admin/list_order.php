<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_order extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function products_order()
    {
        $data['title'] = 'Order List';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['admin']= $row;
        $data['start'] = $this->uri->segment(4);
        //load library
        $this->load->library('pagination');
        //config
        $config['base_url'] = 'http://localhost/PetFriend/admin/list_order/products_order';
        $config['total_rows'] = $this->model_products->countListProducts();
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

        $data['product'] = $this->model_products->getListProducts($config['per_page'],$data['start']);
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/list_products',$data);
        $this->load->view('admin/footer');
    }
    public function view_detail($oid)
    {
        $data['title'] = 'Order Detail';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['admin']= $row;
        $user_id = $this->db->get_where('products_order', ['order_id'=> $oid ])->row()->user_id;

        $data['customer'] = $this->db->get_where('user', ['id'=> $user_id])->row_array();
        $data['producto_orderid'] = $this->model_products->get_myproducto_orderid($oid)->result();
        $data['producto_detail'] = $this->model_products->get_myproducto_detail($oid)->result();

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/detail_product',$data);
        $this->load->view('admin/footer');
    }
}