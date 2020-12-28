<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_group extends CI_Model {

	function get_list_data($type){
        $this->db->where('name', $type);
        $this->db->from('type');
        return $this->db->get();
    }
}
