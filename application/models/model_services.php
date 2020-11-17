<?php

class Model_services extends CI_Model{
    public function show_data(){
        return $this->db->get('services');
    }
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function edit_services($where,$table){
        return $this->db->get_where($table,$where);
    }

    public function detail_service($id)
    {
        $result = $this->db->where('id',$id)->get('services');
        if($result->num_rows()>0)
        {
            return $result->result();
        }
        else
        {
            return false;
        }
    }
    function updateStatus($data, $sorder_id)
    {
        $this->db->where('sorder_id',$sorder_id);
        $this->db->update('services_order', $data);
        return TRUE;
    }
    
    public function countListServices()
    {
        return $this->db->get('services_order')->num_rows();
    }

    //get number of all service order based on user id (displayed on My Order service)
    public function countListServices_id($id)
    {
        $this->db->where('user_id', $id);
        return $this->db->get('services_order')->num_rows();
    }

    //get all service order based on user id (displayed on My Order service)
    public function get_myserviceo($id, $limit, $start)
    {
        $names = array('Awaiting Payment', 'On Process');
        $this->db->select('*');
        $this->db->from('services_order');
        $this->db->join('services', 'services.id = services_order.service_id');
        $this->db->where('services_order.user_id', $id);
        $this->db->where_in('services_order.order_status', $names);
        $this->db->limit($limit, $start);
        $result = $this->db->get();
        return $result;
    }

    //get all pet hotel service order based on user id to verify the payment due date
    public function get_myserviceo2($id)
    {
        $this->db->where('user_id', $id);
        $this->db->where('order_status', "Awaiting Payment");
        $this->db->where('service_id', 1);
        $result = $this->db->get('services_order');
        return $result;
    }

    public function getListServices()
    {
        return $this->db->get('services_order')->result_array();

    }

    //get service order based on service order id
    public function get_myserviceo_orderid($oid)
    {
        return $this->db->get_where("services_order", array('sorder_id'=> $oid));
    }

    //get Pet Hotel order detail from Service order_id
    public function get_myhotel_detail($oid)
    {
        return $this->db->get_where("pethotel_order", array('sorder_id'=> $oid));
    }
    
   //get Pet salon order detail from Service order_id
    public function get_mysalon_detail($oid)
    {
        return $this->db->get_where("petsalon_order", array('sorder_id'=> $oid));
    }

    //get Pet Health order detail from Service order_id
    public function get_myhealth_detail($oid)
    {
        return $this->db->get_where("pethealth_order", array('sorder_id'=> $oid));
    }

    //get service order based on service order id
    public function get_vet($role_id)
    {
        return $this->db->get_where("user", array('role_id'=> $role_id));
    }

    //get the responsible veterinarian based on order
    public function get_vet_data($oid)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('pethealth_order', 'pethealth_order.doc_id = user.id');
        $this->db->where('pethealth_order.sorder_id', $oid);
        $result = $this->db->get();
        return $result;
    }

    //get all service order count based on user id with status awaiting payment (displayed on Customer Dashboard)
    public function get_myserviceo_await($id)
    {
        $this->db->where('user_id', $id);
        $this->db->where('order_status', "Awaiting Payment");
        $result = $this->db->get('services_order')->num_rows();
        return $result;
    }

    //get all pet health order count based on doctor id with status on process (displayed on veterinarian Dashboard)
    public function get_mypethealtho_on($id)
    {
        $names = array('On Process');
        $this->db->select('*');
        $this->db->from('services_order');
        $this->db->join('pethealth_order', 'pethealth_order.sorder_id = services_order.sorder_id');
        $this->db->where('pethealth_order.doc_id', $id);
        $this->db->where_in('services_order.order_status', $names);
        $result = $this->db->get()->num_rows();
        return $result;
    }
}