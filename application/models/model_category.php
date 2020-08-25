<?php

class Model_category extends CI_Model{
    public function data_dog(){
        return $this->db->get_where("products", array('category'=>'dog'));
    }
    
    public function data_cat(){
        return $this->db->get_where("products", array('category'=>'cat'));
    }

}