<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_order extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Product Order List';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $user = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['admin']= $row;
        $data['start'] = $this->uri->segment(4);
        $status = array('Awaiting Payment', 'On Process');
        date_default_timezone_set('Asia/Singapore');
        $this->db->or_where_in('order_status', $status);
        $data['order']= $this->db->get('products_order')->result_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/list_products',$data);
        $this->load->view('admin/footer');
    }
    public function view_detail($oid)
    {
        $data['title'] = 'Product Order Detail';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['admin']= $row;
        $user_id = $this->db->get_where('products_order', ['order_id'=> $oid ])->row()->user_id;

        $data['customer'] = $this->db->get_where('user', ['id'=> $user_id])->row_array();
        $data['producto_orderid'] = $this->model_products->get_myproducto_orderid($oid)->result();
        $data['producto_detail'] = $this->model_products->get_myproducto_detail($oid)->result();

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/detail_product',$data);
        $this->load->view('admin/footer');
    }
    public function confirm_order(){
        $this->form_validation->set_rules('order_status', 'Order Status', 'required');
        $order_id = $this->input->post('order_id');
        if($this->form_validation->run() == false){
            $data['title'] = 'Order List';
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $user = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$user'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['admin']= $row;
            $data['start'] = $this->uri->segment(4);
            $status = array('Awaiting Payment', 'On Process');
            $this->db->or_where_in('order_status', $status);
            $data['order']= $this->db->get('products_order')->result_array();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/list_products',$data);
            $this->load->view('admin/footer');
        }
        else{
            $user_id = $this->db->get_where('products_order', ['order_id'=> $order_id])->row()->user_id;
            $email =  $this->db->get_where('user', ['id'=> $user_id])->row()->email;
            if($this->input->post('order_status') == "On Process"){
                $waktu = time();
                $data_array = array(
                    'delivery_date' => $waktu,
                    'order_status'=> $this->input->post('order_status')
                );
                $update = $this->model_products->updateStatus($data_array,$order_id);
                $send = $this->_sendEmail($order_id,$email, 'process');
                if($send == true){
                    $update = $this->model_products->updateStatus($data_array,$order_id);
                    if($update == true){
                        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show"
                         role="alert">Customer order processing! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div>');
                        redirect('admin/list_order');
                    }
                    else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to Process the order<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div>');
                        redirect('admin/list_order');
                    }
                }
                else{
                    $this->session->set_flashdata('error', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to send the email, please check the admin email configuration<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/list_order');
                }
            }
            elseif($this->input->post('order_status') == "Awaiting Payment"){
                $data_array = array(
                    'order_status'=> $this->input->post('order_status')
                );
                $this->model_products->updateStatus($data_array,$order_id);
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" 
                role="alert">Awaiting Payment ! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('admin/list_order');
            }
        }
    }
    public function complete_order()
    {
        date_default_timezone_set('Asia/Singapore');
        $waktu = date('Y-m-d H:i:s');
        $order_id = $this->input->post('order_id');
        $status = array(
            "finish_date"=>  $waktu,
            'order_status'=> "Order Complete"
        );
        $user_id = $this->db->get_where('products_order', ['order_id'=> $order_id])->row()->user_id;
        $email =  $this->db->get_where('user', ['id'=> $user_id])->row()->email;
        $update = $this->model_products->updateStatus($status,$order_id);
        $send= $this->_sendEmail($order_id,$email, 'complete');
        if($send == true)
        {
            if($update == TRUE)
            {
                $sql = "UPDATE products AS p JOIN products_order_detail AS po ON p.id = po.product_id JOIN products_order as pd ON po.order_id = pd.order_id SET p.stock = p.stock-po.order_qty, p.sold = p.sold+po.order_qty WHERE p.id = po.product_id AND po.order_id = $order_id ";
                $this->db->query($sql);
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Order Completed! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('admin/list_order');
            }
            else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to Complete the order<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('admin/list_order');
            }
        }
        elseif($send == false)
        {
            $this->session->set_flashdata('error', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to send the email, please check the admin email configuration<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/list_order');
        }
    }

    private function _sendEmail($order_id, $email, $type)
    {
        $date_created = $this->db->query("SELECT `order_date` FROM `products_order` WHERE `order_id` = $order_id")->row()->order_date;
        $order_date = date('d F yy', $date_created);
        $order_status = $this->db->query("SELECT `order_status` FROM `products_order` WHERE `order_id` = $order_id")->row()->order_status;
        $total_price = $this->db->query("SELECT `total_price` FROM `products_order` WHERE `order_id` = $order_id")->row()->total_price;
        $payment_method = $this->db->query("SELECT `payment_method` FROM `products_order` WHERE `order_id` = $order_id")->row()->payment_method;
        $address = $this->db->query("SELECT `delivery_address` FROM `products_order` WHERE `order_id` = $order_id")->row()->delivery_address;
        $data = array(
            'order_date'=> $order_date,
            'order_id' => $order_id,
            'order_status'=>$order_status,
            'total_price'=>$total_price,
            'payment_method'=>$payment_method,
            'address'=>$address,
        );
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'finalprojectdua@gmail.com',
            'smtp_pass' => 'WEJANCUKAPAINAKUNK0S0NGGNIDIH4CK',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];
        $this->email->initialize($config);
        $this->email->from('finalprojectdua@gmail.com', 'PetFriend Admin');
        $this->email->to($email);
        if ($type == 'complete') {
            $body = $this->load->view('message/complete.php',$data,TRUE);
            $this->email->subject('Order Complete');
            $this->email->message($body);
        }
        elseif($type="process")
        {
            $body = $this->load->view('message/process.php',$data,TRUE);
            $this->email->subject('Your Order Has Been Processed!');
            $this->email->message($body);
        } 
        if ($this->email->send()) {
            return true;
        } else {
            return false;
        }
    }
}