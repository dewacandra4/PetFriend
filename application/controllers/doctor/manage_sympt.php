<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_sympt extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Manage Symptoms';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['doctor']= $row;
        $data['start'] = $this->uri->segment(4);
        //load library
        
        $this->load->library('pagination');
        //config
        $config['base_url'] = 'http://localhost/PetFriend/doctor/manage_sympt/index';
        $config['total_rows'] = $this->model_doctor->countAllSympt();
        $config['per_page'] = 8;
        
        //styling
        $config['full_tag_open'] = '<nav>
        <ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul>
        </nav>';
        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        
        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        
        $config['attributes'] = array('class' => 'page-link');

        //initialize
        $this->pagination->initialize($config);
        
        
        $data['symptoms'] = $this->model_doctor->getSympt($config['per_page'],$data['start']);
        $this->load->view('doctor/header',$data);
        $this->load->view('doctor/sidebar',$data);
        $this->load->view('doctor/symptoms/data_sympt',$data);
        $this->load->view('doctor/footer');
    }
    public function add_action()
    {
        $this->form_validation->set_rules('code', 'Code', 'required|trim|is_unique[symptoms.code]',  [
            'is_unique' => 'This code has already been registered !'
        ]);
        $this->form_validation->set_rules('symptom', 'Symptom', 'required|trim');
        // $this->form_validation->set_rules('type_id', 'type_id', 'required|trim');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Add Symptom';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $this->load->view('doctor/header',$data);
            $this->load->view('doctor/sidebar',$data);
            $this->load->view('doctor/symptoms/add_sympt',$data);
            $this->load->view('doctor/footer');
        }
        else
        {
            $type_id = $this->input->post('type_id');
            $code = $this->input->post('code');
            $symptom = $this->input->post('symptom');
            $data = array(
                'type_id' => $type_id,         
                'code' => $code,
                'symptom' => $symptom,
            );
            $this->model_doctor->add_data($data, 'symptoms');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Added Successfully</div>');
            redirect('doctor/manage_sympt/index');
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('symptom', 'Symptom', 'required|trim');
        $this->form_validation->set_rules('type_id', 'type_id', 'required|trim');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Edit Symptoms';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $where = array('id' => $id);
            $data['symptoms'] = $this->model_doctor->edit_data($where, 'symptoms')->result();
            $this->load->view('doctor/header',$data);
            $this->load->view('doctor/sidebar',$data);
            $this->load->view('doctor/symptoms/edit_symptoms',$data);
            $this->load->view('doctor/footer');
        }
        else
        {
            $id = $this->input->post('id');
            $type_id = $this->input->post('type_id');
            $code = $this->input->post('code');
            $symptom = $this->input->post('symptom');
            $data['product'] = $this->model_doctor->show_dataS()->result();
            $data = array(
                'type_id' => $type_id,
                'symptom' => $symptom,
            );
            $where = array(
                'id' =>$id
            );
            $this->model_doctor->update_data($where,$data, 'symptoms');
            redirect('doctor/manage_sympt/index'); 
        }
    }
    public function delete($id)
    {
        $where = array('id' => $id);
        $this->model_doctor->delete_data($where,'symptoms');
        redirect('doctor/manage_sympt/index');
    }
}