<?php

class Model_services extends CI_Model{
    public function show_data(){
        return $this->db->get('services');
    }
    public function add_services($data,$table){
        $this->db->insert($table,$data);
    }
    public function edit_services($where,$table){
        return $this->db->get_where($table,$where);
    }
    public function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function delete_data($where,$table)
    {
        $this->db->where($where);
        $this->db->delete($table);
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

    //get all service order based on user id (displayed on My Order service)
    public function get_myserviceo($id, $limit, $start)
    {
        $this->db->select('*');
        $this->db->from('services_order');
        $this->db->join('services', 'services.id = services_order.service_id');
        $this->db->where('services_order.user_id', $id);
        $this->db->where('services_order.order_status', "Awaiting Payment");
        $this->db->or_where('services_order.order_status', "On Process");
        $this->db->limit($limit, $start);
        $result = $this->db->get();
        return $result;
    }

    //get all pet hotel service order based on user id to verify the payment due date
    public function get_myserviceo2($id)
    {
        $this->db->where('user_id', $id);
        $this->db->where('order_status', "Awaiting Payment");
        $result = $this->db->get('services_order');
        return $result;
    }

    public function getListServices()
    {
        return $this->db->get('services_order')->result_array();

    }
}