<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller 
{
	public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
	{
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $data['title']= 'Dashboard';
        $data['info1']= $this->model_products->get_myproducto_await($result);
        $data['info2']= $this->model_services->get_myserviceo_await($result);
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar');
		$this->load->view('customer/dashboard',$data);
		$this->load->view('customer/footer');
	}
	public function change_password()
	{
		$data['title'] = 'Change Password';
		$data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
		$this->form_validation->set_rules('current_password','Current Password','required|trim');
		$this->form_validation->set_rules('new_password1','New Password','required|trim|min_length[10]|matches[new_password2]');
		$this->form_validation->set_rules('new_password2','Repeat New Password','required|trim|min_length[10]|matches[new_password1]');

		if($this->form_validation->run() == false)
		{			
			$this->load->view('customer/header',$data);
			$this->load->view('customer/sidebar');
			$this->load->view('customer/change_password');
			$this->load->view('customer/footer');
		}
		else
		{
			$current_password = $this->input->post('current_password');
			$new_password = $this->input->post('new_password1');
			if(!password_verify($current_password, $data['user']['password']))
			{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('customer/dashboard/change_password');
			}
			else
			{
				if($current_password == $new_password)
				{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                	redirect('customer/dashboard/change_password');
				}
				else
				{
					$password_hash = password_hash($new_password, PASSWORD_DEFAULT);
					$this->db->set('password', $password_hash);
					$this->db->where('username',$this->session->userdata('username'));
					$this->db->update('user');

					$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Changed!</div>');
                redirect('customer/dashboard/change_password');
				}
			}
		}
	}

	public function profile()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/profile',$data);
        $this->load->view('customer/footer');
	}
	
	public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
		$this->form_validation->set_rules('name','name','required|trim');
		$this->form_validation->set_rules('address','address', 'required|trim');
        $this->form_validation->set_rules('phone','phone','required|numeric'); 
        if($this->form_validation->run()==false)
        {
            $this->load->view('customer/header',$data);
            $this->load->view('customer/sidebar',$data);
            $this->load->view('customer/edit',$data);
            $this->load->view('customer/footer');
        }
        else
        {
            $name = $this->input->post('name'); 
			$address = $this->input->post('address'); 
			$phone = $this->input->post('phone'); 
            $upload_image = $_FILES['image']['name'];

			if($upload_image)
            {
                $config['upload_path'] = './assets/dp';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);//load librari upload
            

                if (!$this->upload->do_upload('image'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Error file extension or file larger than 2MB <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('customer/dashboard/profile');
                }
                else
                {
                    $old_image = $data['user']['image'];
                    if($old_image != 'default.jpg')
                    {
                        unlink(FCPATH . 'assets/dp/'. $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }
            
            }
            
            $this->db->set('name', $name);//update isi database 
            $this->db->set('phone', $phone);
            $this->db->set('address', $address);
            $this->db->where('id',$result);
            $this->db->update('user');//update di tablenya user
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Your profile has been updated! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('customer/dashboard/profile');
        }
    }
//view the product order
    public function my_producto()
    {
        $data['title'] = 'My Product Order';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $data['start'] = $this->uri->segment(4);
        $p = $this->model_products->get_myproducto2($result)->result();//to verify the payment due date
        $email= $this->db->query("SELECT `email` FROM `user` WHERE `username` = '$lol'")->row()->email;
        $namee= $this->db->query("SELECT `name` FROM `user` WHERE `username` = '$lol'")->row()->name;
        
        date_default_timezone_set('Asia/Singapore');
        foreach ($p as $po)
        {
            if($po->payment_method == "Bank Transfer" || $po->payment_method == "M-Banking")
            {
                if(time() - $po->order_date > (60 * 60 * 24))
                {
                    $poid=$po->order_id;
                    $this->db->set('order_status', "Cancelled");
                    $this->db->where('order_id', $po->order_id);
                    $this->db->update('products_order');
                    $this->_sendEmail($poid,$email,$namee,'product');
                    redirect('customer/dashboard/my_producto');
                }
            }
        }

                //load library
                $this->load->library('pagination');
                //config
                $config['base_url'] = 'http://localhost/PetFriend/customer/dashboard/my_producto';
                $config['total_rows'] = $this->model_products->countListProducts_id($result);
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
                
                $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
                $config['cur_tag_close'] = '</a></li>';
                
                $config['num_tag_open'] = '<li class="page-item">';
                $config['num_tag_close'] = '</li>';
        
                $config['attributes'] = array('class' => 'page-link');
        
                //initialize
                $this->pagination->initialize($config);

        $data['producto'] = $this->model_products->get_myproducto($result, $config['per_page'], $data['start'])->result();
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/my_producto',$data);
        $this->load->view('customer/footer');
    }

    //view the Service Order
    public function my_serviceo()
    {
        $data['title'] = 'My Service Order';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $data['start'] = $this->uri->segment(4);
        $s = $this->model_services->get_myserviceo2($result)->result();//to verify the payment due date
        $email= $this->db->query("SELECT `email` FROM `user` WHERE `username` = '$lol'")->row()->email;
        $namee= $this->db->query("SELECT `name` FROM `user` WHERE `username` = '$lol'")->row()->name;
        
        date_default_timezone_set('Asia/Singapore');
        foreach ($s as $so)
        {
            if($so->payment_method == "Bank Transfer" || $so->payment_method == "M-Banking")
            {
                if(time() - $so->order_date > (60 * 60 * 0.5))
                {
                    $soid=$so->sorder_id;
                    $this->db->where('sorder_id', $so->sorder_id);
                    $this->db->delete('services_order');
                    $this->_sendEmail($soid,$email,$namee,'hotel');
                    redirect('customer/dashboard/my_serviceo');
                }
            }
        }

                //load library
                $this->load->library('pagination');
                //config
                $config['base_url'] = 'http://localhost/PetFriend/customer/dashboard/my_serviceo';
                $config['total_rows'] = $this->model_services->countListServices_id($result);
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
                
                $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
                $config['cur_tag_close'] = '</a></li>';
                
                $config['num_tag_open'] = '<li class="page-item">';
                $config['num_tag_close'] = '</li>';
        
                $config['attributes'] = array('class' => 'page-link');
        
                //initialize
                $this->pagination->initialize($config);

        $data['serviceo'] = $this->model_services->get_myserviceo($result, $config['per_page'], $data['start'])->result();
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/my_serviceo',$data);
        $this->load->view('customer/footer');
    }

    public function view_reciept($oid)
    {
        $data['title'] = 'Product Order Detail';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;

        $data['producto_orderid'] = $this->model_products->get_myproducto_orderid($oid)->result();
        $data['producto_detail'] = $this->model_products->get_myproducto_detail($oid)->result();

        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/reciept_product',$data);
        $this->load->view('customer/footer');
    }

    public function view_reciept_service($oid)
    {
        $data['title'] = 'Service Order Detail';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $service_type= $this->db->query("SELECT `service_id` FROM `services_order` WHERE `sorder_id` = '$oid'")->row()->service_id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
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

        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/reciept_service',$data);
        $this->load->view('customer/footer');
    }


    private function _sendEmail($poid,$email,$namee,$type)
    {
        if ($type == 'product')
        {
            $date_created = $this->db->query("SELECT `order_date` FROM `products_order` WHERE `order_id` = $poid")->row()->order_date;
            $order_date = date('d F yy', $date_created);
            $datap = array(
                'order_date'=> $order_date,
                'order_id' => $poid,
                'name'=>$namee,
            );
        }
        if ($type == 'hotel')
        {
            $date_created2 = $this->db->query("SELECT `order_date` FROM `services_order` WHERE `sorder_id` = $poid")->row()->order_date;
            $order_date2 = date('d F yy', $date_created2);
            $datas = array(
                'order_date'=> $order_date2,
                'sorder_id' => $poid,
                'name'=>$namee,
            );
        }

        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'finalprojectdua@gmail.com',
            'smtp_pass' => '2yShDYTAyc2hw5j',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('finalprojectdua@gmail.com', 'PetFriend Admin');
        $this->email->to($email);

        if ($type == 'product')
        {
            $body = $this->load->view('message/product.php',$datap,TRUE);
            $this->email->subject('Cancelled Product Order');
            $this->email->message($body);
        }
        if ($type == 'hotel')
        {
            $body = $this->load->view('message/hotel.php',$datas,TRUE);
            $this->email->subject('Cancelled Pet Hotel Order');
            $this->email->message($body);
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function cancel_product ($oid)
    {
        $this->db->set('order_status', "Cancelled");
        $this->db->where('order_id', $oid);
        $this->db->update('products_order');
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">
        Order with Order id : #'.$oid.' successfully cancelled<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('customer/dashboard/my_producto');

    }
    //to download diagnosis result file
    public function download($a)
    {
        $this->load->helper('download');
        $Path = './assets/diagnosis/'.$a;
        $data = file_get_contents($Path);
        $name = $a;
        force_download($name, $data);
    }

    //to upload payment proof (Product)
    public function proof_product($oid)
    {
        $data['title'] = 'Upload Payment Proof';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $data['order_id']= $oid;
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/upload_proofp',$data);
        $this->load->view('customer/footer');

    }

    public function upload_proofp()
    {
            $order_id = $this->input->post('order_id'); 
            $upload_image = $_FILES['payment_proof']['name'];

			if($upload_image)
            {
                $config['upload_path'] = 'assets/recieptp';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);//load librari upload
            

                if (!$this->upload->do_upload('payment_proof'))
                {
                    $error =  $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Error file extension or file larger than 2MB '.$error.'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('customer/dashboard/proof_product/'.$order_id);
                }
                else
                {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('payment_proof', $new_image);
                    $this->db->where('order_id',$order_id);
                    $this->db->update('products_order');
                }
            
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Your payment proof has been uploaded! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('customer/dashboard/my_producto');
        
    }

    //to upload payment proof (Service)
    public function proof_service($oid)
    {
        $data['title'] = 'Upload Payment Proof';
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $data['sorder_id']= $oid;
        $this->load->view('customer/header',$data);
        $this->load->view('customer/sidebar',$data);
        $this->load->view('customer/upload_proofs',$data);
        $this->load->view('customer/footer');

    }

    public function upload_proofs()
    {
            $sorder_id = $this->input->post('sorder_id'); 
            $upload_image = $_FILES['payment_proofs']['name'];

			if($upload_image)
            {
                $config['upload_path'] = 'assets/reciepts';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);//load librari upload
            

                if (!$this->upload->do_upload('payment_proofs'))
                {
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Error file extension or file larger than 2MB '.$error.' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('customer/dashboard/proof_service/'.$sorder_id);
                }
                else
                {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('payment_proof', $new_image);
                    $this->db->where('sorder_id',$sorder_id);
                    $this->db->update('services_order');
                }
            
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Your payment proof has been uploaded! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('customer/dashboard/my_serviceo');
        
    }



}
