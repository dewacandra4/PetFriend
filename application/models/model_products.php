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
        $result =  $this->db->select('*')
        ->from('products')
        ->join('category', 'category.id = products.category_id')
        ->where('products.id',$id)->get();
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

    public function countListProducts()
    {
        return $this->db->get('products_order')->num_rows();
    }

    public function getProducts()
    {
        return $this->db->get('products')->result_array();
    }
    public function getProductsPagination($limit, $start)
    {
        return $this->db->get('products',$limit, $start)->result_array();
    }

    public function getListProducts()
    {
        return $this->db->get('products_order')->result_array();
    }
    //update status payment
    function updateStatus($data, $order_id)
    {
        $this->db->where('order_id',$order_id);
        $this->db->update('products_order', $data);
        return TRUE;
    }

    public function search($keyword)
    {
        $this->db->like('name', $keyword );
        $this->db->or_like('description', $keyword );
        $result = $this->db->get('products')->result(); 
        return $result;
    }
//search ascending price order
    public function Asearch($keyword)
    {
        $this->db->like('name', $keyword );
        $this->db->or_like('description', $keyword );
        $this->db->order_by('price', 'ASC');
        $result = $this->db->get('products')->result(); 
        return $result;
    }
//search descending price order
    public function Dsearch($keyword)
    {
        $this->db->like('name', $keyword );
        $this->db->or_like('description', $keyword );
        $this->db->order_by('price', 'DESC');
        $result = $this->db->get('products')->result(); 
        return $result;
    }
//search between entered price
    public function Psearch($keyword,$max,$min)
    {
        $this->db->where('products.price >=', $min);
        $this->db->where('products.price <=', $max);
        $result = $this->db->get('products')->result(); 
        return $result;
    }
//get all product order based on user id (displayed on My Order Product)
    public function get_myproducto($id, $limit, $start)
    {
        $this->db->where('user_id', $id);
        $this->db->where('order_status', "Awaiting Payment");
        $this->db->or_where('order_status', "On Process");
        $result = $this->db->get('products_order', $limit, $start);
        return $result;
    }
//get product detail from product order_id
    public function get_myproducto_detail($oid)
    {
        return $this->db->get_where("products_order_detail", array('order_id'=> $oid));
    }
//get product order based on product order id
    public function get_myproducto_orderid($oid)
    {
        return $this->db->get_where("products_order", array('order_id'=> $oid));
    }

    //get all product order based on user id to verify the payment due date
    public function get_myproducto2($id)
    {
        $this->db->where('user_id', $id);
        $this->db->where('order_status', "Awaiting Payment");
        $result = $this->db->get('products_order');
        return $result;
    }

}