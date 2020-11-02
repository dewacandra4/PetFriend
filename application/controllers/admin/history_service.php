<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_service extends CI_Controller 
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
        date_default_timezone_set('Asia/Singapore');
        // $data['product'] = $this->model_products->getListProducts("Awaiting Payment");
        $status = array('Order Complete');
        $this->db->or_where_in('order_status', $status);
        $data['order']= $this->db->get('services_order')->result_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/service_history',$data);
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
        $user_id = $this->db->get_where('services_order', ['order_id'=> $oid ])->row()->user_id;

        $data['customer'] = $this->db->get_where('user', ['id'=> $user_id])->row_array();
        $data['producto_orderid'] = $this->model_services->get_myproducto_orderid($oid)->result();
        $data['producto_detail'] = $this->model_services->get_myproducto_detail($oid)->result();

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/detail_product',$data);
        $this->load->view('admin/footer');
    }
}