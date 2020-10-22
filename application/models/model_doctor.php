<?php

class Model_doctor extends CI_Model{
    public function show_dataD(){
        return $this->db->get('diseases');
    }
    public function show_dataS(){
        return $this->db->get('symptoms');
    }

    public function add_data($data,$table){
        $this->db->insert($table,$data);
    }
    public function edit_data($where,$table){
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
    public function detail_product($id)
    {
        $result = $this->db->where('id',$id)->get('diseases');
        if($result->num_rows()>0)
        {
            return $result->result();
        }
        else
        {
            return false;
        }
    }
    public function countAlldiseases()
    {
        return $this->db->get('diseases')->num_rows();
    }
    public function countAllSympt()
    {
        return $this->db->get('symptoms')->num_rows();
    }
    public function countAllCF()
    {
        return $this->db->get('cf')->num_rows();
    }
    public function getDiseases($limit, $start)
    {
        return $this->db->get('diseases', $limit, $start)->result_array();
    }
    public function getSympt($limit, $start)
    {
        return $this->db->get('symptoms', $limit, $start)->result_array();
    }
}