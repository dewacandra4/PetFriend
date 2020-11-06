<?php
class Model_category extends CI_Model{
    public function countCategoryProducts($category)
    {
        $this->db->where('category_id',$category);
        return $this->db->get('products')->num_rows();
    }
    public function data_dog($limit, $start){
        $query = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->limit($limit, $start)
        ->where('category.cid= 2')->get(); 
        return $query;
    }
    public function data_cat($limit, $start){
        $query = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->limit($limit, $start)
        ->where('category.cid= 1')->get(); 
        return $query;
    }
    public function data_birds($limit, $start){
        $query = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->limit($limit, $start)
        ->where('category.cid= 3')->get(); 
        return $query;
    }
    public function data_smallpet($limit, $start){
        $query = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->limit($limit, $start)
        ->where('category.cid= 4')->get(); 
        return $query;
    }

    public function show_dog(){
        $query = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->where('category.cid= 2')->get(); 
        return $query;
    }
    public function show_cat(){
        $query = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->where('category.cid= 1')->get(); 
        return $query;
    }
    public function show_birds(){
        $query = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->where('category.cid= 3')->get(); 
        return $query;
    }
    public function show_smallpet(){
        $query = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->where('category.cid= 4')->get(); 
        return $query;
    }
}