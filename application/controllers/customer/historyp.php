<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class historyp extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'My Products Order History';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $data['start'] = $this->uri->segment(4);
        date_default_timezone_set('Asia/Singapore');
        $status = array('Order Complete','Cancelled');
        $this->db->where('user_id', $result);
        $this->db->where_in('order_status', $status);
        $data['order']= $this->db->get('products_order')->result_array();
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/myproduct_history',$data);
        $this->load->view('customer/footer');
    }

    public function view_reciept($oid)
    {
        $data['title'] = 'Product Order Detail (History)';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;

        $data['producto_orderid'] = $this->model_products->get_myproducto_orderid($oid)->result();
        $data['producto_detail'] = $this->model_products->get_myproducto_detail($oid)->result();

        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/reciept_product',$data);
        $this->load->view('customer/footer');
    }

    public function re_order($oid)
    {
        date_default_timezone_set('Asia/Singapore');
        $this->db->set('order_status', "Awaiting Payment");
        $this->db->set('order_date', time());
        $this->db->where('order_id', $oid);
        $this->db->update('products_order');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        Order with Order id : #'.$oid.' successfully re-ordered<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('customer/dashboard/my_producto');
    }
}