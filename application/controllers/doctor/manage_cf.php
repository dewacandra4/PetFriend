<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_cf extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'CF Value';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['doctor']= $row;
        $data['start'] = $this->uri->segment(4);
        
        $data['diseases'] = $this->db->query("SELECT * FROM diseases order by id")->result();
        $data['symptoms'] = $this->db->query("SELECT * FROM symptoms order by symptom_id")->result();
        // $data['cf_id'] = $this->model_cf->getById($id);
        $data['cf'] = $this->model_cf->getListCF();
        $this->load->view('doctor/header',$data);
        $this->load->view('doctor/sidebar',$data);
        $this->load->view('doctor/cf_value/data_cf',$data);
        $this->load->view('doctor/footer');
    }
    public function add_action()
	{
        $this->form_validation->set_rules('symptom', 'Symptom', 'required|trim');
        $this->form_validation->set_rules('disease', 'Disease', 'required|trim');
        $this->form_validation->set_rules('mb', 'MB', 'required|trim|numeric');
        $this->form_validation->set_rules('md', 'MD', 'required|trim|numeric');
        if($this->form_validation->run() == false)
        {
            
            $data['title'] = 'CF Value';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $user = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['doctor']= $row;
            $data['start'] = $this->uri->segment(4);
            
            $data['cf'] = $this->model_cf->getListCF();
            $this->load->view('doctor/header',$data);
            $this->load->view('doctor/sidebar',$data);
            $this->load->view('doctor/cf_value/data_cf',$data);
            $this->load->view('doctor/footer');
        }
	    else{
            $symptom = $this->input->post('symptom');
            $disease = $this->input->post('disease');
            $md = $this->input->post('md');
            $mb = $this->input->post('mb');

            $data = array(
                        'symptom_id'=>$symptom,
                        'disease_id'=>$disease,
                        'md'=>$md,
                        'mb'=>$mb,
                    );
            $this->model_cf->insert($data);
            if($this->db->affected_rows())
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Data Added Successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('doctor/manage_cf/index');
            }
            elseif(!$this->db->affected_rows())
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to add the CF Value data! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('doctor/manage_cf/index');
            }
		}
	}
    public function edit()
    {
        $this->form_validation->set_rules('md', 'md', 'required|numeric|trim');
        $this->form_validation->set_rules('mb', 'mb', 'required|numeric|trim');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'CF Value';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $user = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['doctor']= $row;
            $data['start'] = $this->uri->segment(4);
            
            $data['diseases'] = $this->db->query("SELECT * FROM diseases order by id")->result();
            $data['symptoms'] = $this->db->query("SELECT * FROM symptoms order by symptom_id")->result();
            // $data['cf_id'] = $this->model_cf->getById($id);
            $data['cf'] = $this->model_cf->getListCF();
            $this->load->view('doctor/header',$data);
            $this->load->view('doctor/sidebar',$data);
            $this->load->view('doctor/cf_value/data_cf',$data);
            $this->load->view('doctor/footer');
        }
        else
        {
            $id = $this->input->post('id');
            $symptom_id = $this->input->post('symptom_id');
            $disease_id = $this->input->post('disease_id');
            $md = $this->input->post('md');
            $mb = $this->input->post('mb');

            $data = array(
                        'symptom_id'=>$symptom_id,
                        'disease_id'=>$disease_id,
                        'md'=>$md,'mb'=>$mb,
            );
            $update= $this->model_cf->edit($id, $data);
            if($this->db->affected_rows())
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible 
                fade show" role="alert">Successfully Edited! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('doctor/manage_cf/index'); 
            }
            elseif(!$this->db->affected_rows())
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible 
                fade show" role="alert">Failed to edit symptom data! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('doctor/manage_cf/index'); 
            }
        }

    }
    
    public function delete()
    {
        $id_cf = $this->input->post('id_cf');
        $where = array('id_cf' => $id_cf);
        $this->model_doctor->delete_data($where,'cf');
        if($this->db->affected_rows())
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">CF ID <strong>#'.$id_cf.'</strong> removed! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('doctor/manage_cf/index');
        }
        elseif(!$this->db->affected_rows())
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to remove the CF ID #'.$id_cf.'! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('doctor/manage_cf/index');
        }
    }
}