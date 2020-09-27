<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_symptom extends CI_Model {
	// public function getlistkelompokgejala()
	// {
	// 	return $this->db->get('kelompok_gejala');
	// }

	function get_list_by_id($id){
         $sql = "select id,code,symptom from symptoms where id in (".$id.")";
         return $this->db->query($sql);
     }
     function get_by_type($type){
        $this->db->select('*');
        $this->db->from('symptoms');
         $this->db->where('type_id',$type);
        return $this->db->get();
    }
}