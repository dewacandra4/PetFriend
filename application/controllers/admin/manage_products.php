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
        $data['barang'] = $this->db->select('*')
        ->from('category')
        ->join('products', 'category.cid = products.category_id')->get()->result_array(); 
        $data['cate'] =  $this->db->get('category')->result_array();
        // var_dump($data['barang']);
        // $this->db->get('products')->result_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/data_products',$data);
        $this->load->view('admin/footer');
    }
    public function add_action()
    {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $category_id = $this->input->post('category_id');
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
                'category_id' => $category_id,
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

    public function update()
    {
        //rules validation
        $this->form_validation->set_rules('name', 'Product Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        // $this->form_validation->set_rules('category_id', 'Category', 'required');
        $this->form_validation->set_rules('stock', 'Stock', 'required|numeric');
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Manage Products';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $user = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['admin']= $row;
            $data['start'] = $this->uri->segment(4);
            $data['barang'] = $this->db->select('*')
            ->from('category')
            ->join('products', 'category.cid = products.category_id')->get()->result_array(); 
            $data['cate'] =  $this->db->get('category')->result_array();
            // var_dump($data['barang']);
            // $this->db->get('products')->result_array();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/data_products',$data);
            $this->load->view('admin/footer');
        }
        else
        {
            $id = $this->input->post('id');
            $name = $this->input->post('name');
            $description = $this->input->post('description');
            $price = $this->input->post('price');
            $category_id = $this->input->post('category_id');
            $stock = $this->input->post('stock');
            $upload_image = $_FILES['img']['name'];
            
            $data['product'] = $this->model_products->show_data()->result();
            if($upload_image)
            {
                $config['upload_path'] = './assets/products';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
    
                $this->load->library('upload', $config);//load librari upload
            
                if($this->upload->do_upload('img'))
                {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('img', $new_image);
                }
                
                else
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" 
                    role="alert">Error file extension or file larger than 2MB <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/manage_products/index');
                  
                }
            }
            if($category_id)
            {
                $data = array(
                    'name' => $name,
                    'description' => $description,
                    // 'img' => $new_image,
                    'category_id' => $category_id,
                    'price' => $price,
                    'stock' => $stock,
                );
            }
            else
            {
                $data = array(
                    'name' => $name,
                    'description' => $description,
                    // 'img' => $new_image,
                    // 'category_id' => $category_id,
                    'price' => $price,
                    'stock' => $stock,
                );
            }
    
            $where = array(
                'id' =>$id
            );
            $this->db->where($where);
            $this->db->update('products', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Successfully Edited! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/manage_products/index');
            // else{
            //     $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" 
            //     role="alert">Image Field cannot be empty<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //     <span aria-hidden="true">&times;</span>
            //     </button></div>');
            //     redirect('admin/manage_products/index');
            // }
        }
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $where = array('id' => $id);
        $this->model_products->delete_data($where,'products');
        redirect('admin/manage_products/index');
    }
}