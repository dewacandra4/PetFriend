<?php

function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth/login');
    } 
    else 
    {
        $role_id = $ci->session->userdata('role_id');
        $menu = $ci->uri->segment(1);
        if($menu == "admin")
        {
            $menu = "Admin";
        }
        else
        {
            $menu = "Customer";
        }

        $queryRole = $ci->db->get_where('user_role', ['role' => $menu])->row_array();
        $role = $queryRole['role'];

        $userAccess = $ci->db->get_where('user_role', [
            'id' => $role_id,
            'role' => $role
        ])->row_array();

        if (empty($userAccess))
        {
            redirect('auth/blocked');
        }
    }
}

function is_admin()
{
    $ci = get_instance();
    $role_id = $ci->session->userdata('role_id');
    if($role_id == 1)
    {
        return 1;
    }
    elseif($role_id == 2)
    {
        return 2;
    }
    else
    {
        return false;
    }
}