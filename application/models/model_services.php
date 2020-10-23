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
    public function getListServices()
    {
        return $this->db->get('services_order')->result_array();
    }
}