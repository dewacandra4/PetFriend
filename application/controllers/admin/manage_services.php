<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_services extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Manage Services';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['admin']= $row;
        $data['services'] = $this->model_services->show_data()->result();
        $data['ss'] = $this->db->get('services')->result();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/data_services',$data);
        $this->load->view('admin/footer');
    }
    public function update()
    {
        $this->form_validation->set_rules('name', 'Services Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('resource', 'Resource', 'required|numeric');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Manage Services';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $user = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['admin']= $row;
            $data['services'] = $this->model_services->show_data()->result();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/data_services',$data);
            $this->load->view('admin/footer');
        }
        else
        {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $price = $this->input->post('price');
            $resource = $this->input->post('resource');
            // $is_available = $this->input->post('is_available');
            $upload_image = $_FILES['img']['name'];
            if($upload_image)
            {
                $config['upload_path'] = './assets/services';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
    
                $this->load->library('upload', $config);//load librari upload
            
                if(!$this->upload->do_upload('img'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" 
                    role="alert">Error file extension or file larger than 2MB <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/manage_services/index');
                }
    
                else
                {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('img', $new_image);
                }
            }
            if(isset($_POST['is_available']))
            {
                $is_available = $_POST['is_available'] = 1;
            }
            else
            {
                $is_available = $_POST['is_available'] = 0;
            }
            $data = array(
                'name' => $name,
                'description' => $description,
                'price' => $price,
                'resource' => $resource,
                'is_available' => $is_available
            );
    
            $where = array(
                'id' =>$id
            );
            $this->model_services->update_data($where,$data, 'services');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible 
            fade show" role="alert">Successfully Edited! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/manage_services/index');
        }
    }
}