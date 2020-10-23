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
        elseif($menu == "customer")
        {
            $menu = "Customer";
        }
        else
        {
            $menu = "Veterinarian";
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
    elseif($role_id == 3)
    {
        return 3;
    }
    else
    {
        return false;
    }
}

function is_category()
{
    $ci = get_instance();
    $id = $ci->uri->segment(3);
    $queryRole = $ci->db->get_where('products', ['id' => $id])->row_array();
    $category = $queryRole['category_id'];

    if($category == 1)
    {
        return 1;
    }
    else if($category == 2)
    {
        return 2;
    }
    else if($category == 3)
    {
        return 3;
    }
    else
    {
        return 4;
    }
}