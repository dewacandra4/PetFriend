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
        $data['title'] = 'Manage diseases';
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
        $config['base_url'] = 'http://localhost/PetFriend/doctor/manage_diseases/index';
        $config['total_rows'] = $this->model_doctor->countAllDiseases();
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
        
        
        $data['disease'] = $this->model_doctor->getDiseases($config['per_page'],$data['start']);
        $this->load->view('doctor/header',$data);
        $this->load->view('doctor/sidebar',$data);
        $this->load->view('doctor/diseases/data_diseases',$data);
        $this->load->view('doctor/footer');
    }
    public function add_action()
    {
        $this->form_validation->set_rules('code', 'Code', 'required|trim|is_unique[diseases.code]',  [
            'is_unique' => 'This code has already been registered !'
        ]);
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('information', 'Information', 'required|trim');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Add Diseases';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $this->load->view('doctor/header',$data);
            $this->load->view('doctor/sidebar',$data);
            $this->load->view('doctor/diseases/add_diseases',$data);
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
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Added Successfully</div>');
            redirect('doctor/manage_diseases/index');
        }
    }
    public function edit($id)
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('information', 'Information', 'required|trim');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Edit Diseases';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $where = array('id' => $id);
            $data['diseases'] = $this->model_doctor->edit_data($where, 'diseases')->result();
            $this->load->view('doctor/header',$data);
            $this->load->view('doctor/sidebar',$data);
            $this->load->view('doctor/diseases/edit_diseases',$data);
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
            redirect('doctor/manage_diseases/index');
        }
    }
    public function delete($id)
    {
        $where = array('id' => $id);
        $this->model_doctor->delete_data($where,'diseases');
        redirect('doctor/manage_diseases/index');
    }
}