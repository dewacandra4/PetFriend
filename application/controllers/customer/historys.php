<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class historys extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'My Service Order History';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $data['start'] = $this->uri->segment(4);
        date_default_timezone_set('Asia/Singapore');
        $status = array('Order Complete');
        $this->db->where('user_id', $result);
        $this->db->where_in('order_status', $status);
        $data['order']= $this->db->get('services_order')->result_array();
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/myservice_history',$data);
        $this->load->view('customer/footer');
    }

    public function view_reciept_service($oid)
    {
        $data['title'] = 'Service Order Detail (History)';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $service_type= $this->db->query("SELECT `service_id` FROM `services_order` WHERE `sorder_id` = '$oid'")->row()->service_id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $data['serviceo'] = $this->model_services->get_myserviceo_orderid($oid)->result();

        if($service_type == 1)
        {
            $price=$this->db->query("SELECT `price` FROM `services` WHERE `id` = '1'")->row()->price;
            $data['pethotel'] = $this->model_services->get_myhotel_detail($oid)->result();
        }
        
        if($service_type == 2)
        {
            $price=$this->db->query("SELECT `price` FROM `services` WHERE `id` = '2'")->row()->price;
            $data['pethealth'] = $this->model_services->get_myhealth_detail($oid)->result();
            $doc= $this->db->query("SELECT `doc_id` FROM `pethealth_order` WHERE `sorder_id` = '$oid'")->row()->doc_id;
            $data['vete'] = $this->model_services->get_vet_data($oid)->result();
        }
        
        if($service_type == 3)
        {
            $price=$this->db->query("SELECT `price` FROM `services` WHERE `id` = '3'")->row()->price;
            $data['petsalon'] = $this->model_services->get_mysalon_detail($oid)->result();
        }

        //get repeater guest for pet hotel
        $this->db->where('user_id',$result);
        $this->db->where('order_status', "Order Complete");
        $this->db->where('service_id', 1);
        $rep = $this->db->get('services_order');
        $comcount = $rep->num_rows();
        $rept = [
            'rep' =>  $comcount,
            'price' =>  $price
        ];
        $data['guest']= $rept;

        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/reciept_service',$data);
        $this->load->view('customer/footer');
    }

}