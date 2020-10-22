<?php

class Model_category extends CI_Model{
    public function data_dog(){
        return $this->db->get_where("products", array('category'=>'dog'));
    }
    
    public function data_cat(){
        return $this->db->get_where("products", array('category'=>'cat'));
    }
    public function data_birds(){
        return $this->db->get_where("products", array('category'=>'birds'));
    }
    public function data_smallpet(){
        return $this->db->get_where("products", array('category'=>'small pet'));
    }

}