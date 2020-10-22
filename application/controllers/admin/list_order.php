<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_order extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Order List';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['admin']= $row;
        $data['start'] = $this->uri->segment(4);
        $data['product'] = $this->model_products->getListProducts();
        $data['order']=$this->db->get('products_order')->result_array();
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
    public function confirm_payment()
    {
        $this->form_validation->set_rules('order_status', 'Order Status', 'required');
        $order_id = $this->input->post('order_id');
        $data = array(
            'order_status'=> $this->input->post('order_status'),
        );
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Order List';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $user = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['admin']= $row;
            $data['start'] = $this->uri->segment(4);
            $data['product'] = $this->model_products->getListProducts();
            $data['order']=$this->db->get('products_order')->result_array();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/list_products',$data);
            $this->load->view('admin/footer');
        }
        else
        {
            $this->model_products->updateStatus($data,$order_id);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Successfully Edited! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/list_order');
        }
    }
}