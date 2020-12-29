<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_diagnosis extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Diagnosis Result History';
        date_default_timezone_set('Asia/Singapore');
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $data['start'] = $this->uri->segment(4);
        $diagnosis = $this->db->query("SELECT DISTINCT  a.* FROM `diagnosis_result` a 
        LEFT OUTER JOIN `diagnosis_result` b 
        ON a.created_at = b.created_at AND a.cf_value < b.cf_value 
        WHERE  a.user_id = $result AND b.created_at IS NULL
        ");
        $array = $diagnosis->result_array();
        $num_unique = array_unique($array, SORT_REGULAR);//to remove duplicate array value
        $data['diagnosis'] = $num_unique;
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/diagnosis_history',$data);
        $this->load->view('customer/footer');
    }
    public function detail()
    {
        $data['title'] = 'Detail Diagnosis Result';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $data["username"] = $user;
        $date = $this->uri->segment(4);
        $cust_id = $this->uri->segment(5);
        $symptom_id = $this->db->query("SELECT `symptom_id` FROM `history` WHERE `created_at` = '$date' AND `user_id` = '$cust_id'");
        //get pet type
        $symp_id = $symptom_id->row()->symptom_id;
        $type =   $this->db->select('*')
        ->from('type')
        ->join('symptoms', 'symptoms.type_id = type.id')
        ->where('symptom_id',  $symp_id)->get()->row_array(); 
        $data['type'] = $type;

        $user = $this->db->query("SELECT * FROM `user` WHERE `id` = '$cust_id' ");
        //get customer info
        $data['customer'] = $user->row_array();

        //get symptom
        $data['date'] = $this->db->select('*')
        ->from('symptoms')
        ->join('history', 'symptoms.symptom_id = history.symptom_id')
        ->where('created_at', $date)->get()->result_array(); 
        
        //get disease
        
        $this->db->select_max('cf_value');
        $this->db->where('created_at', $date);
        $max = $this->db->get('diagnosis_result');
        
        if($max->num_rows() >0)
        {
            $max2 = $max->result_array();
            $result = $max2[0]['cf_value'];
            //get list diseases
            $this->db->select('*');
            $this->db->where('created_at', $date);
            $this->db->order_by('cf_value', 'DESC');
            $query2 = $this->db->get('diagnosis_result');
            if ($query->num_rows() > 0)
            {
                $array = $query2->result_array();
                $num_unique = array_unique($array, SORT_REGULAR);
                function cmp($a, $b)
                {
                    return ($a["cf_value"] > $b["cf_value"]) ? -1 : 1;
                }
                usort($num_unique, "cmp");//sorting array dari terbesar ke kecil
                $data['listDiseases']= $num_unique;//to remove duplicate array value
            }
        }
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/detail_diag',$data);
        $this->load->view('customer/footer');
    }
}
