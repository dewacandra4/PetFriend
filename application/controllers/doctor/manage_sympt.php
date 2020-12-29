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
        
        $data['symptoms'] = $this->model_doctor->getSympt();
        $this->load->view('doctor/header',$data);
        $this->load->view('doctor/sidebar',$data);
        $this->load->view('doctor/symptoms/data_sympt',$data);
        $this->load->view('doctor/footer');
    }
    public function add_action()
    {
        $code = $this->input->post('code');
        $this->form_validation->set_rules('code', 'Code', 'required|trim|is_unique[symptoms.code]',  [
            'is_unique' => 'This symptom code #'.$code.' has already been registered !'
        ]);
        $this->form_validation->set_rules('symptom', 'Symptom', 'required|trim');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Manage Symptoms';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $user = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['doctor']= $row;
            $data['start'] = $this->uri->segment(4);
            
            $data['symptoms'] = $this->model_doctor->getSympt();
            $this->load->view('doctor/header',$data);
            $this->load->view('doctor/sidebar',$data);
            $this->load->view('doctor/symptoms/data_sympt',$data);
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
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible 
            fade show" role="alert">Data Added Successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('doctor/manage_sympt/index');
        }
    }
    public function edit(){
        $this->form_validation->set_rules('symptom', 'Symptom', 'required|trim');
        $this->form_validation->set_rules('type_id', 'type_id', 'required|trim');
        if($this->form_validation->run() == false){
            $data['title'] = 'Manage Symptoms';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $user = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['doctor']= $row;
            $data['start'] = $this->uri->segment(4);
            $data['symptoms'] = $this->model_doctor->getSympt();
            $this->load->view('doctor/header',$data);
            $this->load->view('doctor/sidebar',$data);
            $this->load->view('doctor/symptoms/data_sympt',$data);
            $this->load->view('doctor/footer');
        }
        else{
            $symptom_id = $this->input->post('symptom_id');
            $type_id = $this->input->post('type_id');
            $code = $this->input->post('code');
            $symptom = $this->input->post('symptom');
            $data = array(
                'type_id' => $type_id,
                'symptom' => $symptom,
            );
            $where = array(
                'symptom_id' =>$symptom_id
            );
            $update = $this->model_doctor->update_data($where,$data, 'symptoms');
            if($this->db->affected_rows()){
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible 
                fade show" role="alert">Successfully Edited! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('doctor/manage_sympt/index'); 
            }
            elseif(!$this->db->affected_rows()){
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible 
                fade show" role="alert">Failed to edit symptom data! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('doctor/manage_sympt/index'); 
            }
        }
    }
    public function delete(){
        $symptom_id = $this->input->post('symptom_id');
        $code = $this->input->post('code');
        $symptom = $this->input->post('symptom');
        $where = array('symptom_id' => $symptom_id);
        $this->model_doctor->delete_data($where,'symptoms');
        if($this->db->affected_rows()){
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Symptom <strong>#'.$code.'('.$symptom.')</strong> removed! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('doctor/manage_sympt/index');
        }
        elseif(!$this->db->affected_rows()){
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to remove the symptom #'.$code.'! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('doctor/manage_sympt/index');
        }
    }
}