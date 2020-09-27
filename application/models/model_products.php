<?php

class Model_products extends CI_Model{
    public function show_data(){
        return $this->db->get('products');
    }
    public function add_products($data,$table){
        $this->db->insert($table,$data);
    }
    public function edit_products($where,$table){
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
        $result = $this->db->where('id',$id)->get('products');
        if($result->num_rows()>0)
        {
            return $result->result();
        }
        else
        {
            return false;
        }
    }
    public function countAllProducts()
    {
        return $this->db->get('products')->num_rows();
    }

    public function getProducts($limit, $start)
    {
        return $this->db->get('products', $limit, $start)->result_array();
    }
}