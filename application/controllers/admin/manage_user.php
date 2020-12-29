<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_User extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    //view products
    public function index()
    {
        $data['title'] = 'Manage Users';
        date_default_timezone_set('Asia/Singapore');
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $data['users'] = $this->db->select('*')
        ->from('user_role')
        ->join('user', 'user_role.id = user.role_id')->get()->result(); 
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['admin']= $row;
        $data['start'] = $this->uri->segment(4);

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/data_users',$data);
        $this->load->view('admin/footer');
    }
    public function change_role()
    {
        $role = $this->input->post('role');
        $id = $this->input->post('id');
        $role_name = $this->db->query("SELECT role FROM user_role WHERE id= '$role'")->row()->role;
        $where = array(
            'id' =>$id
        );
        $data = array(
            'role_id' => $role
        );
        $name = $this->db->get_where('user', ['id'=> $id])->row()->username;
        $this->db->where($where);
        $update = $this->db->update('user',$data);
        if($this->db->affected_rows())
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Successfully change user #'.$name.' role to '.$role_name.'! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/manage_user/index');
        }
        elseif(!$this->db->affected_rows())
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to change user #'.$name.' role! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/manage_user/index');
        }
    }
    public function delete()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $where = array('id' => 12345);
        $this->db->where($where);
        $this->db->delete('user');
        if($this->db->affected_rows())
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">User #'.$name.' removed! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/manage_user/index');
        }
        elseif(!$this->db->affected_rows())
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to delete the user #'.$name.'! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/manage_user/index');
        }
    }
    public function active_acc()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $is_active = $this->input->post('is_active'); //value = 1 ->active
        $where = array('id' => $id);
        $data = array(
            'is_active' => $is_active
        );
        $this->db->where($where);
        $this->db->update('user',$data);
        if($this->db->affected_rows())
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">User #'.$username.' account activated! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/manage_user/index');
        }
        elseif(!$this->db->affected_rows())
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to active account #'.$username.'! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/manage_user/index');
        }
    }
    public function deactive_acc()
    {
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $is_active = $this->input->post('is_active');// value = 0 -> deactive
        $where = array('id' => $id);
        $data = array(
            'is_active' => $is_active
        );
        $this->db->where($where);
        $this->db->update('user',$data);
        if($this->db->affected_rows())
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">User`s #'.$username.' account disabled! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/manage_user/index');
        }
        elseif(!$this->db->affected_rows())
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to deactivate account #'.$username.'! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/manage_user/index');
        }
    }
}