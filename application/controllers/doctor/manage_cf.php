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
        //load library
        $this->load->library('pagination');
        //config
        $config['base_url'] = 'http://localhost/PetFriend/doctor/manage_cf/index';
        $config['total_rows'] = $this->model_doctor->countAllCF();
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
        
        $config['cur_tag_open'] = '<li class="page-item active "><a class="page-link " href="#">';
        $config['cur_tag_close'] = '</a></li>';
        
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');
        //initialize
        $this->pagination->initialize($config);
        
        
        $data['cf'] = $this->model_cf->getListCF($config['per_page'],$data['start']);
        $this->load->view('doctor/header',$data);
        $this->load->view('doctor/sidebar',$data);
        $this->load->view('doctor/cf_value/data_cf',$data);
        $this->load->view('doctor/footer');
    }
    public function create()
	{
		if (isset($_POST['submit'])){
			$this->model_cf->insert();
			redirect('doctor/manage_cf/index');
		}
        $data['title'] = 'CF Value';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['doctor']= $row;
		$data['content'] = 'doctor/manage_cf/create';
		$this->load->view('doctor/header',$data);
        $this->load->view('doctor/sidebar',$data);
        $this->load->view('doctor/cf_value/add_cf',$data);
        $this->load->view('doctor/footer');


	}
    public function edit()
    {
        $this->form_validation->set_rules('md', 'md', 'required|trim');
        $this->form_validation->set_rules('mb', 'mb', 'required|trim');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Edit CF';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $id=$this->uri->segment(4);
            $data['diseases'] = $this->db->query("SELECT * FROM diseases order by id")->result();
            $data['symptoms'] = $this->db->query("SELECT * FROM symptoms order by id")->result();
            $data['cf'] = $this->model_cf->getById($id);
            $data['content'] = 'doctor/manage_cf/edit';
            $this->load->view('doctor/header',$data);
            $this->load->view('doctor/sidebar',$data);
            $this->load->view('doctor/cf_value/edit_cf',$data);
            $this->load->view('doctor/footer');
        }
        else
        {
            if (isset($_POST['submit']))
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
                $this->model_cf->edit($id, $data);
                redirect('doctor/manage_cf/index');
            }
        }

    }
    
    public function delete($id)
    {
        $where = array('id_cf' => $id);
        $this->model_doctor->delete_data($where,'cf');
        redirect('doctor/manage_cf/index');
    }
}