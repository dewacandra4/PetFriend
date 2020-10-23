<?php

class Model_category extends CI_Model{
    public function data_dog(){
        $query = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->where('category.cid= 2')->get(); 
        return $query;
    }
    
    public function data_cat(){
        $query = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->where('category.cid= 1')->get(); 
        return $query;
    }
    public function data_birds(){
        $query = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->where('category.cid= 3')->get(); 
        return $query;
    }
    public function data_smallpet(){
        $query = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->where('category.cid= 4')->get(); 
        return $query;
    }

}