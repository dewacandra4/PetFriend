<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class review extends CI_Controller 
{
    public function review_product()
    {
        date_default_timezone_set('Asia/Singapore');
        $user_id = $this->input->post ('user_id');
        $product_id = $this->input->post ('product_id');
            $data = [
                'user_id' => $user_id,
                'product_id' => $product_id,
                'rating' => $this->input->post ('rating'),
                'title' => $this->input->post ('title'),
                'content' => $this->input->post ('content'),
                'review_date' => time(),
            ];

        $this->db->insert('review', $data);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        Your review has been posted
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');

        redirect('home/detail_product/'.$product_id);

    }

    public function delete_review($rid)
    {
        $product_id = $this->db->query("SELECT `product_id` FROM `review` WHERE `id` = '$rid'")->row()->product_id;
        $this->model_products->delete_review($rid);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        Your review successfully deleted
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('home/detail_product/'.$product_id);

    }
}