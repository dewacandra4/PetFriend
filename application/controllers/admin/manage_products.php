<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_products extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Manage Products';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['admin']= $row;
        $data['start'] = $this->uri->segment(4);    
        $data['product'] = $this->model_products->getProducts();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/data_products',$data);
        $this->load->view('admin/footer');
    }
    public function add_action()
    {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $stock = $this->input->post('stock');
        $upload_image = $_FILES['img']['name'];
        if($upload_image && $name && $description && $price && $stock)
        {
            $config['upload_path'] = './assets/products';
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
                redirect('admin/manage_products/index');
            }

            else
            {
                $new_image = $this->upload->data('file_name');
            }
            $data = array(
                'name' => $name,
                'description' => $description,
                'img' => $new_image,
                'price' => $price,
                'stock' => $stock,
                'is_available' => 1,
                'date_added' => time()
            );
            $this->model_products->add_products($data, 'products');
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" 
            role="alert">New product successfully added<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/manage_products/index');
        }
        else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" 
            role="alert">Field cannot be empty<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/manage_products/index');
        }
    }
    public function edit($id)
    {
        $data['title'] = 'Edit Products';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $where = array('id' => $id);
        $data['products'] = $this->model_products->edit_products($where, 'products')->result();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/edit_products',$data);
        $this->load->view('admin/footer');

    }
    public function update()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $price = $this->input->post('price');
        $stock = $this->input->post('stock');
        $upload_image = $_FILES['img']['name'];
        $data['product'] = $this->model_products->show_data()->result();
        if($upload_image)
        {
            $config['upload_path'] = './assets/products';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);//load librari upload
        
            if(! $this->upload->do_upload('img'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" 
                role="alert">Error file extension or file larger than 2MB <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('admin/manage_products/index');
            }

            else
            {
                $new_image = $this->upload->data('file_name');
                $this->db->set('img', $new_image);
            }
        }
        $data = array(
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'stock' => $stock,
        );

        $where = array(
            'id' =>$id
        );
        $this->model_products->update_data($where,$data, 'products');
        redirect('admin/manage_products/index');
    }
    public function delete($id)
    {
        $where = array('id' => $id);
        $this->model_products->delete_data($where,'products');
        redirect('admin/manage_products/index');
    }
}