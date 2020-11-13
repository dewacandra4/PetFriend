<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_sorder extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'Service Order List';
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
        $data['sorder']=$this->db->get('services_order')->result_array();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/list_services',$data);
        $this->load->view('admin/footer');
    }
    public function view_detail($oid)
    {
        $data['title'] = 'Service Order Detail';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $service_type= $this->db->query("SELECT `service_id` FROM `services_order` WHERE `sorder_id` = '$oid'")->row()->service_id;
        $query = $this->db->query("SELECT `user_id` FROM `services_order` WHERE `sorder_id` = '$oid'")->row()->user_id;
        $customer = $this->db->query("SELECT * FROM `user` WHERE `id` = $query");
        $row= $customer->row_array();
        $data['customer']= $row;
        $data['serviceo'] = $this->model_services->get_myserviceo_orderid($oid)->result();

        if($service_type == 1)
        {
            $price=$this->db->query("SELECT `price` FROM `services` WHERE `id` = '1'")->row()->price;
            $data['pethotel'] = $this->model_services->get_myhotel_detail($oid)->result();
        }
        if($service_type == 2)
        {
            $price=$this->db->query("SELECT `price` FROM `services` WHERE `id` = '2'")->row()->price;
            $data['pethealth'] = $this->model_services->get_myhealth_detail($oid)->result();
            $doc= $this->db->query("SELECT `doc_id` FROM `pethealth_order` WHERE `sorder_id` = '$oid'")->row()->doc_id;
            $data['vete'] = $this->model_services->get_vet_data($oid)->result();
        }
        if($service_type == 3)
        {
            $price=$this->db->query("SELECT `price` FROM `services` WHERE `id` = '3'")->row()->price;
            $data['petsalon'] = $this->model_services->get_mysalon_detail($oid)->result();
        }
        //get repeater guest for pet hotel
        $this->db->where('user_id',$result);
        $this->db->where('order_status', "Order Complete");
        $this->db->where('service_id', 1);
        $rep = $this->db->get('services_order');
        $comcount = $rep->num_rows();
        $rept = [
            'rep' =>  $comcount,
            'price' =>  $price
        ];
        $data['guest']= $rept;

        $this->load->view('admin/header',$data);
        $this->load->view('admin/sidebar',$data);
        $this->load->view('admin/detail_service',$data);
        $this->load->view('admin/footer');
    }
    public function confirm_order(){
        $this->form_validation->set_rules('order_status', 'Order Status', 'required');
        $sorder_id = $this->input->post('sorder_id');
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
            $data['sorder']=$this->db->get('services_order')->result_array();
            $this->load->view('admin/header',$data);
            $this->load->view('admin/sidebar',$data);
            $this->load->view('admin/list_services',$data);
            $this->load->view('admin/footer');
        }
        else{
            $user_id = $this->db->get_where('services_order', ['sorder_id'=> $sorder_id])->row()->user_id;
            $email =  $this->db->get_where('user', ['id'=> $user_id])->row()->email;
            if($this->input->post('order_status') == "On Process")
            {
                $data_array = array(
                    'order_status'=> $this->input->post('order_status')
                );
                
                $send = $this->_sendEmail($sorder_id,$email, 'process');
                if($send == true){
                    $update = $this->model_services->updateStatus($data_array,$sorder_id);
                    if($update == TRUE){
                        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" 
                        role="alert">Customer order processing! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div>');
                        redirect('admin/list_sorder');
                    }
                    else{
                        $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to Process the order<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button></div>');
                        redirect('admin/list_sorder');
                    }
                }
                elseif($send == false){
                    $this->session->set_flashdata('error', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to send the email, please check the admin email configuration<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/list_sorder');
                }
            }
            elseif($this->input->post('order_status') == "Awaiting Payment")
            {
                $data_array = array(
                    'order_status'=> $this->input->post('order_status')
                );
                $this->model_products->updateStatus($data_array,$order_id);
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" 
                role="alert">Awaiting Payment ! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('admin/list_sorder');
            }
        }
    }
    public function complete_order()
    {
        $sorder_id = $this->input->post('sorder_id');
        $status = array(
            'order_status'=> "Order Complete"
        );
        $user_id = $this->db->get_where('services_order', ['sorder_id'=> $sorder_id])->row()->user_id;
        $email =  $this->db->get_where('user', ['id'=> $user_id])->row()->email;
        $send = $this->_sendEmail($sorder_id,$email, 'complete');
        if($send == true)
        {
            $update = $this->model_services->updateStatus($status,$sorder_id);
            if($update == TRUE)
            {
                $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Order Completed! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('admin/list_sorder');
            }
            else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to Complete the order<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('admin/list_sorder');
            }
        }
        elseif($send == false)
        {
            $this->session->set_flashdata('error', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Failed to send the email, please check the admin email configuration<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('admin/list_sorder');
        }
        
    }
    private function _sendEmail($sorder_id, $email, $type)
    {
        $date_created = $this->db->query("SELECT `order_date` FROM `services_order` WHERE `sorder_id` = $sorder_id")->row()->order_date;
        $order_date = date('d F yy', $date_created);
        $order_status = $this->db->query("SELECT `order_status` FROM `services_order` WHERE `sorder_id` = $sorder_id")->row()->order_status;
        $total_price = $this->db->query("SELECT `total_price` FROM `services_order` WHERE `sorder_id` = $sorder_id")->row()->total_price;
        $payment_method = $this->db->query("SELECT `payment_method` FROM `services_order` WHERE `sorder_id` = $sorder_id")->row()->payment_method;
        $address = $this->db->query("SELECT `customer_address` FROM `services_order` WHERE `sorder_id` = $sorder_id")->row()->customer_address;
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
        $data = array(
            'order_date'=> $order_date,
            'sorder_id' => $sorder_id,
            'order_status'=>$order_status,
            'total_price'=>$total_price,
            'payment_method'=>$payment_method,
            'address'=>$address,
        );
        $this->email->initialize($config);
        $this->email->from('finalprojectdua@gmail.com', 'PetFriend Admin');
        $this->email->to($email);

        if ($type == 'complete') {
            $body = $this->load->view('message/scomplete.php',$data,TRUE);
            $this->email->subject('Order Complete');
            $this->email->message($body);
        }
        elseif($type="process")
        {
            $body = $this->load->view('message/sprocess.php',$data,TRUE);
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