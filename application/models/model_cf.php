<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cf extends CI_Model {

	public function getListCF($limit, $start = 0, $q = null){
		return $this->db->select('*, cf.id_cf AS cfid ')
						->from('cf')
						->join('symptoms', 'symptoms.id = cf.symptom_id ')
						->join('diseases', 'diseases.id = cf.disease_id ')
						->order_by('cf.id_cf', 'DESC')
                        ->limit($limit, $start)
						->get()
						->result_array();
	}

	public function insert(){ 
		$symptom_id = $this->input->post('symptom_id');
		$disease_id = $this->input->post('disease_id');
		$md = $this->input->post('md');
		$mb = $this->input->post('mb');

		$data = array(
					'symptom_id'=>$symptom_id,
					'disease_id'=>$disease_id,
					'md'=>$md,
					'mb'=>$mb,
				);
		$this->db->insert('cf', $data);

	}

	public function getById($id){
		return $query = $this->db->query("SELECT *, a.id_cf as cid FROM cf a JOIN diseases b ON b.id = a.disease_id WHERE a.id_cf='$id' ")->row_array();

	}

	public function edit($id,$data){
		$this->db->where('id_cf',$id);
		$this->db->update('cf', $data);
	}

	// public function hapus($id){
	// 	$this->db->where('id', $id);
	// 	$this->db->delete('cf');
	// }

	// public function getlistnilaicf()
	// {
	// 	// return $this->db->get('gejala');

	// 	return $this->db->select('*, gejala_penyakit.id AS gpid ')
	// 					->from('gejala_penyakit')
	// 					->join('gejala', 'gejala.id = gejala_penyakit.gejala_id ')
	// 					->join('penyakit', 'penyakit.id = gejala_penyakit.penyakit_id ')
	// 					->get()
	// 					->result_array();
	// }

	function get_by_symptom($symptom){
         $sql = "select distinct disease_id,p.code,p.name,p.information from cf gp inner join diseases p on gp.disease_id=p.id where symptom_id in (".$symptom.") order by disease_id,symptom_id";
         return $this->db->query($sql);
     }

     function get_symptom_by_disease($id,$symptom=null){
         $sql = "select cf.symptom_id,mb,md from cf where disease_id=".$id;
         if($symptom!=null)
            $sql=$sql." and symptom_id in (".$symptom.")";
        $sql=$sql." order by symptom_id";
         return $this->db->query($sql);
     }

     function getSympt(){
     	return $this->db->get('symptoms');
     }

     function getDiseases(){
     	return $this->db->get('diseases');
     }

}
