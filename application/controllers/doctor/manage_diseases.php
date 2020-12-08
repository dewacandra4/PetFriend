<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_diseases extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Manage Diseases';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['doctor']= $row;
        $data['start'] = $this->uri->segment(4);
        
        $data['disease'] = $this->model_doctor->getDiseases();
        $this->load->view('doctor/header',$data);
        $this->load->view('doctor/sidebar',$data);
        $this->load->view('doctor/diseases/data_diseases',$data);
        $this->load->view('doctor/footer');
    }
    public function add_action()
    {
        $code = $this->input->post('code');
        $this->form_validation->set_rules('code', 'Code', 'required|trim|is_unique[diseases.code]',  [
            'is_unique' => 'The disease code #'.$code.' has already been registered !'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('information', 'Information', 'required|trim');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Manage Diseases';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $user = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['doctor']= $row;
            $data['start'] = $this->uri->segment(4);
            
            $data['disease'] = $this->model_doctor->getDiseases();
            $this->load->view('doctor/header',$data);
            $this->load->view('doctor/sidebar',$data);
            $this->load->view('doctor/diseases/data_diseases',$data);
            $this->load->view('doctor/footer');
        }
        else
        {
            $code = $this->input->post('code');
            $name = $this->input->post('name');
            $information = $this->input->post('information');
            $data = array(
                'code' => $code,
                'name' => $name,
                'information' => $information,         
            );
            $this->model_doctor->add_data($data, 'diseases');
            if($this->db->affected_rows())
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Data Added Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('doctor/manage_diseases/index');
            }
            elseif(!$this->db->affected_rows())
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to add the disease data! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('doctor/manage_diseases/index');
            }
        }
    }
    public function edit()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('information', 'Information', 'required|trim');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Manage Diseases';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $user = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['doctor']= $row;
            $data['start'] = $this->uri->segment(4);
            
            $data['disease'] = $this->model_doctor->getDiseases();
            $this->load->view('doctor/header',$data);
            $this->load->view('doctor/sidebar',$data);
            $this->load->view('doctor/diseases/data_diseases',$data);
            $this->load->view('doctor/footer');
        }
        else
        {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $code = $this->input->post('code');
            $information = $this->input->post('information');
            $data['diseases'] = $this->model_doctor->show_dataD()->result();
            $data = array(
                'name' => $name,
                'information' => $information,
            );
            $where = array(
                'id' =>$id
            );
            $this->model_doctor->update_data($where,$data, 'diseases');
            if($this->db->affected_rows())
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible 
                fade show" role="alert">Successfully Edited! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('doctor/manage_diseases/index');
            }
            elseif(!$this->db->affected_rows())
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to edit the disease #'.$code.'! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('doctor/manage_diseases/index');
            }
        }
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $code = $this->input->post('code');
        $name = $this->input->post('name');
        $where = array('id' => $id);
        $this->model_doctor->delete_data($where,'diseases');
        if($this->db->affected_rows())
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Disease <strong>#'.$code.'('.$name.')</strong> removed! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('doctor/manage_diseases/index');
        }
        elseif(!$this->db->affected_rows())
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to remove the diseases #'.$code.'! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('doctor/manage_diseases/index');
        }
    }
}