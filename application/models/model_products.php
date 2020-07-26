<?php

class Model_products extends CI_Model{
    public function show_data(){
        return $this->db->get('products');
    }
}