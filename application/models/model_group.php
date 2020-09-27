<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_group extends CI_Model {

	// public function daftarGejala(){
	// 	return $this->db->get('kelompok_gejala')->result();
	// }

	// public function insert(){
	// 	$nama = $this->input->post('nama');
	// 	$keterangan = $this->input->post('keterangan');

	// 	$data = array(
	// 					'nama'=>$nama,
	// 					'keterangan'=>$keterangan,
	// 			);
	// 	$this->db->insert('kelompok_gejala', $data);

	// }

	// public function getById($id){
	// 	return $query = $this->db->query("SELECT * FROM kelompok_gejala WHERE id='$id' ")->row_array();

	// }

	// public function edit(){
	// 	$id = $this->input->post('id');
	// 	$nama = $this->input->post('nama');
	// 	$keterangan = $this->input->post('keterangan');

	// 	$data = array(
	// 				'nama'=>$nama,
	// 				'keterangan'=>$keterangan,
	// 	);
	// 	$this->db->where('id',$id);
	// 	$this->db->update('kelompok_gejala', $data);
	// }

	// public function hapus($id){
	// 	$this->db->where('id', $id);
	// 	$this->db->delete('kelompok_gejala');
	// }

	function get_list_data($type){
        $this->db->where('name', $type);
        $this->db->from('type');
        return $this->db->get();
    }
}
