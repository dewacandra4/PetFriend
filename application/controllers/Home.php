<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['products'] = $this->model_products->show_bestProduct()->result();
		$data['title']= 'PetFriend';
		$this->load->view('home/header',$data);
		$this->load->view('home/home',$data);
		$this->load->view('home/footer');
	}
	public function products()
	{
		$data['title'] = 'Products';
		$data['start'] = $this->uri->segment(4);
        
        //config
        $config['base_url'] = 'http://localhost/PetFriend/home/products/index';
        $config['total_rows'] = $this->model_products->countAllProductsAvail();
        $config['per_page'] = 10;

        //start styling pagination
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
        //end styling pagination

        //initialize
        $this->pagination->initialize($config);
        
        $data['products'] = $this->model_products->getProductsPagination($config['per_page'],$data['start']);
        $this->load->view('home/header',$data);
        $this->load->view('home/products',$data);
        $this->load->view('home/footer');
    }

    public function add_to_cart($id)
    {
        $q1 = $this->db->query("SELECT`name`FROM `products` WHERE `id` = $id")->row()->name;
        $q2 = $this->db->query("SELECT`price`FROM `products` WHERE `id` = $id")->row()->price;
        $q3 = $this->db->query("SELECT`img`FROM `products` WHERE `id` = $id")->row()->img;
        $q41 = $this->db->query("SELECT`category_id`FROM `products` WHERE `id` = $id")->row()->category_id;
        $q4 = $this->db->query("SELECT`category`FROM `category` WHERE `cid` = $q41")->row()->category;
        $q5 = $this->db->query("SELECT`stock`FROM `products` WHERE `id` = $id")->row()->stock;
        $data = array(
            'id' => $id, 
            'name' =>  $q1,
            'price' =>  $q2,
            'qty' => 1,
            'img' =>  $q3,
            'category' => $q4,
            'stocks' =>  $q5,
        );

        $this->cart->insert($data);   
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Added 
        to cart<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('Home/cart');
    }

    //to remove a product from cart
    public function Remove_cart($rowid)
    {
        $this->cart->remove($rowid); 
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Item 
        Removed<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('Home/cart');

    }
    //to update qty of product order in cart
    public function update_cart()
    {
        $data = array(
            'rowid' => $this->input->post('rowid'),
            'qty'   => $this->input->post('quantity'),
         );
    
        $this->cart->update($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Qty Updated<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('Home/cart');

    }

    public function cart()
    {
        if(!$this->session->userdata('username')==null)
        {
            $lol = $this->session->userdata('username');
            $result= $this->db->query("SELECT `role_id` FROM `user` WHERE `username` = '$lol'")->row()->role_id;
            if($result == 1 || $result == 3)
            {
                redirect('Home');
            }
            if($result == 2)
            {
                $data['title'] = 'Shopping Cart';
                $this->load->view('home/header',$data);
                $this->load->view('customer/cart');
                $this->load->view('home/footer');
            }
        }
        $data['title'] = 'Shopping Cart';
        $this->load->view('home/header',$data);
        $this->load->view('customer/cart');
        $this->load->view('home/footer');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['searchr'] = $this->model_products->search($keyword);
        $data['title'] = 'Search Result';
        $data['key'] = $keyword;
        $this->load->view('home/header',$data);
        $this->load->view('home/search',$data);
        $this->load->view('home/footer');

    }
//normal order
    public function searchN($key)
    {
        $keyword = $key;
        $data['searchr'] = $this->model_products->search($keyword);
        $data['title'] = 'Search Result';
        $data['key'] = $keyword;
        $this->load->view('home/header',$data);
        $this->load->view('home/search',$data);
        $this->load->view('home/footer');

    }
//ascending order
    public function searchA($key)
    {
        $keyword = $key;
        $data['searchr'] = $this->model_products->Asearch($keyword);
        $data['title'] = 'Search Result';
        $data['key'] = $keyword;
        $this->load->view('home/header',$data);
        $this->load->view('home/searchA',$data);
        $this->load->view('home/footer');
    }
//descending order
    public function searchD($key)
    {
        $keyword = $key;
        $data['searchr'] = $this->model_products->Dsearch($keyword);
        $data['title'] = 'Search Result';
        $data['key'] = $keyword;
        $this->load->view('home/header',$data);
        $this->load->view('home/searchD',$data);
        $this->load->view('home/footer');
    }

    public function searchP()
    {
        $key=$this->input->post('key');
        $max=$this->input->post('max');
        $min=$this->input->post('min');
        $keyword = $key;
        $data['searchr'] = $this->model_products->Psearch($keyword,$max,$min);
        $data['title'] = 'Search Result';
        $data['key'] = $keyword;
        $data['ma'] = $max;
        $data['mi'] = $min;
        $this->load->view('home/header',$data);
        $this->load->view('home/searchP',$data);
        $this->load->view('home/footer');
    }

//checkout Product
    public function check_out()
    {//customer must login before check out from cart
        if($this->cart->total_items() == 0)
        {
            redirect('customer/dashboard/my_producto');
        }
        $lol = $this->session->userdata('username');
        if ($lol==null) 
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">You have to logged in 
            before continue the Payment<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('auth/login');
        } 
        else
        {
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $lol = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['customer']= $row;
            $data['title'] = 'Payment Product';
            $this->load->view('home/header',$data);
            $this->load->view('customer/payment',$data);
            $this->load->view('home/footer');
        }
    }
//checkout hotel
    public function check_out_hotel()
    {    //customer must login before book a pet hotel
        date_default_timezone_set('Asia/Singapore');
        $lol = $this->session->userdata('username');
        if ($lol==null) 
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">You have to logged in 
            before Book a room <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('auth/login');
        } 
        else
        {
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $lol = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['customer']= $row;
            $data['title'] = 'Payment Hotel';
            $d= $this->input->post ('check-in');
            $strd=strtotime($d);
            $p= $this->input->post ('base_price');
            if($this->input->post ('roomtype') == "Royale")
            {
                $p = ( $p + 20);
            }
            if($this->input->post ('roomtype') == "Deluxe")
            {
                $p = ( $p + 10);
            }
            //determine repeater guset
            $this->db->where('user_id',$result);
            $this->db->where('order_status', "Order Complete");
            $this->db->where('service_id', 1);
            $rep = $this->db->get('services_order');
            $comcount = $rep->num_rows();

            $book = [
                'check_in' => $strd,
                'days' => $this->input->post ('days'),
                'pet_kind' => $this->input->post ('petkind'),
                'service_id' => $this->input->post ('service_id'),
                'price' => $p,
                'rep' =>  $comcount,
                'room_type' => $this->input->post ('roomtype')
                
            ];
            $data['book']= $book;
            $this->load->view('home/header',$data);
            $this->load->view('customer/payment_hotel',$data);
            $this->load->view('home/footer');
        }

    }
 //checkout salon
    public function check_out_salon()
    {//customer must login before Order Salon Service
        date_default_timezone_set('Asia/Singapore');
        $lol = $this->session->userdata('username');
        if ($lol==null) 
        {
            $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">You have to logged in 
            before Order Salon Service <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('auth/login');
        } 
        else
        {
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $lol = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['customer']= $row;
            $data['title'] = 'Payment Salon';
            $p= $this->input->post ('base_price');
            if($this->input->post ('service_type') == "All in One")
            {
                $p = ( $p + 5);
            }
            $book = [
                'pet_kind' => $this->input->post ('petkind'),
                'service_id' => $this->input->post ('service_id'),
                'price' => $p,
                'service_type' => $this->input->post ('service_type')
                
            ];
            $data['book']= $book;
            $this->load->view('home/header',$data);
            $this->load->view('customer/payment_salon',$data);
            $this->load->view('home/footer');
        }

    }

//ordering the products
    public function order_products()
    {
        date_default_timezone_set('Asia/Singapore');
        $user_id = $this->input->post ('user_id');
        $method_pay = $this->input->post ('payment_method');
        if($method_pay == "COD")
        {
            $data = [
                'user_id' => $user_id,
                'order_status' => $this->input->post ('order_status1'),
                'order_date' => time(),
                'total_price' => $this->input->post ('total_price'),
                'total_items' => $this->input->post ('total_items'),
                'payment_method' => $this->input->post ('payment_method'),
                'delivery_address' => $this->input->post ('delivery_address'),
                'delivery_note' => $this->input->post ('delivery_note'),
                'delivery_date' => time()
            ];
        }
        else
        {
            $data = [
                'user_id' => $user_id,
                'order_status' => $this->input->post ('order_status2'),
                'order_date' => time(),
                'total_price' => $this->input->post ('total_price'),
                'total_items' => $this->input->post ('total_items'),
                'payment_method' => $this->input->post ('payment_method'),
                'delivery_address' => $this->input->post ('delivery_address'),
                'delivery_note' => $this->input->post ('delivery_note')
            ];
        }

        $this->db->insert('products_order', $data);

        $ordert = $this->db->query("SELECT `order_id` FROM `products_order` WHERE `user_id` = '$user_id'
        ORDER BY `order_id` DESC LIMIT 1")->row()->order_id;

        foreach ($this->cart->contents() as $items)
        {
            $data1 = [
                'order_id' => $ordert,
                'product_id' => $items['id'],
                'order_qty' => $items['qty'],
                'product_name' => $items['name'],
                'total_price' => $this->cart->format_number($items['subtotal']),
                'img' => $items['img'],
            ];
    
            $this->db->insert('products_order_detail', $data1);

        }
        $this->cart->destroy();

        if($this->input->post ('payment_method') == "COD")
        {
            redirect('customer/dashboard/view_reciept/'.$ordert);
        }
        else
        {
            redirect('customer/dashboard/proof_product/'.$ordert);
        }

    }

    //ordering Pet Hotel
    public function order_pethotel()
    {
        date_default_timezone_set('Asia/Singapore');
        $user_id = $this->input->post ('user_id');

        $data = [
            'service_id' => $this->input->post ('service_id'),
            'user_id' => $user_id,
            'order_status' => "Awaiting Payment",
            'order_date' => time(),
            'total_price' => $this->input->post ('total_price'),
            'payment_method' => $this->input->post ('payment_method'),
            'customer_address' => $this->input->post ('customer_address')
        ];

        $this->db->insert('services_order', $data);

        $sordert = $this->db->query("SELECT `sorder_id` FROM `services_order` WHERE `user_id` = '$user_id'
        ORDER BY `sorder_id` DESC LIMIT 1")->row()->sorder_id;

            $data1 = [
                'sorder_id' => $sordert,
                'check_in'  => $this->input->post ('check_in'),
                'check_out' => $this->input->post ('check_out'),
                'pet_kind'  => $this->input->post ('pet_kind'),
                'room_type'  => $this->input->post ('room_type')
            ];
    
            $this->db->insert('pethotel_order', $data1);

            if($this->input->post ('payment_method') == "COD")
            {
                redirect('customer/dashboard/view_reciept_service/'.$sordert);
            }
            else
            {
                redirect('customer/dashboard/proof_service/'.$sordert);
            }

    }

    //ordering Pet Salon
    public function order_petsalon()
    {
        date_default_timezone_set('Asia/Singapore');
        $user_id = $this->input->post ('user_id');
        $method_pay = $this->input->post ('payment_method');
        if($method_pay == "COD")
        {
            $data = [
                'service_id' => $this->input->post ('service_id'),
                'user_id' => $user_id,
                'order_status' => "On Process",
                'order_date' => time(),
                'total_price' => $this->input->post ('total_price'),
                'payment_method' => $this->input->post ('payment_method'),
                'customer_address' => $this->input->post ('customer_address')
            ];
        }
        else
        {
            $data = [
                'service_id' => $this->input->post ('service_id'),
                'user_id' => $user_id,
                'order_status' => "Awaiting Payment",
                'order_date' => time(),
                'total_price' => $this->input->post ('total_price'),
                'payment_method' => $this->input->post ('payment_method'),
                'customer_address' => $this->input->post ('customer_address')
            ];
        }

        $this->db->insert('services_order', $data);

        $sordert = $this->db->query("SELECT `sorder_id` FROM `services_order` WHERE `user_id` = '$user_id'
        ORDER BY `sorder_id` DESC LIMIT 1")->row()->sorder_id;

            $data1 = [
                'sorder_id' => $sordert,
                'pet_kind'  => $this->input->post ('pet_kind'),
                'service_type'  => $this->input->post ('service_type')
            ];
    
            $this->db->insert('petsalon_order', $data1);

            if($this->input->post ('payment_method') == "COD")
            {
                redirect('customer/dashboard/view_reciept_service/'.$sordert);
            }
            else
            {
                redirect('customer/dashboard/proof_service/'.$sordert);
            }
            
    }

    private function _sendEmail($type,$name,$email)
    {
        $data = array(
            'name'=>$name,
        );
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'finalprojectdua@gmail.com',
            'smtp_pass' => ' 2yShDYTAyc2hw5j',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('finalprojectdua@gmail.com', 'PetFriend Admin');
        $this->email->to($email);

        if ($type == 'doc') {
            $body = $this->load->view('message/doc.php',$data,TRUE);
            $this->email->subject('Pet Health Order');
            $this->email->message($body);
        } 

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    //ordering Pet Health
    public function order_pethealth()
    {
            $file="";
            $user_id = $this->input->post ('user_id');
            $petkind = $this->input->post ('pet_kind');
            $petc = $this->input->post ('pet_complaint');
            $doc = $this->input->post ('doc_id');
            $upload_file = $_FILES['diagnosis_file']['name'];
            $name_doc = $this->db->query("SELECT `name` FROM `user` WHERE `id` = '$doc'")->row()->name;
            $email_doc = $this->db->query("SELECT `email` FROM `user` WHERE `id` = '$doc'")->row()->email;

			if($upload_file)
            {
                $config['upload_path'] = './assets/diagnosis/';
                $config['max_size']     = '2048';
                $config['allowed_types'] = 'pdf';

                $this->load->library('upload', $config);//load librari upload
            

                if (!$this->upload->do_upload('diagnosis_file'))
                {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Error file extension or file larger than 2MB <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('home/detail_services/2#order');
                }
                else
                {
                    $file = $this->upload->data('file_name');
                }
            
            }
            

            date_default_timezone_set('Asia/Singapore');
            $data = [
                'service_id' => $this->input->post ('service_id'),
                'user_id' => $user_id,
                'order_status' => "On Process",
                'order_date' => time(),
                'total_price' => $this->input->post ('base_price'),
                'payment_method' => "COD",
                'customer_address' => $this->input->post ('customer_address')
            ];

            $this->db->insert('services_order', $data);

            $sordert = $this->db->query("SELECT `sorder_id` FROM `services_order` WHERE `user_id` = '$user_id'
            ORDER BY `sorder_id` DESC LIMIT 1")->row()->sorder_id;
            
                
                $this->db->set('sorder_id', $sordert);
                $this->db->set('pet_kind', $petkind);
                $this->db->set('pet_complaint', $petc);
                $this->db->set('diagnosis_file', $file);
                $this->db->set('doc_id', $doc);
                $this->db->insert('pethealth_order');
            
            $this->_sendEmail('doc',$name_doc,$email_doc);
            redirect('customer/dashboard/view_reciept_service/'.$sordert);
    }


	public function detail_product($id)
	{
        $lol = $this->session->userdata('username');
        if($lol != null)
        {
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['customer']= $row;
            $data['review_check'] = $this->model_products->check_review($id,$result);
            $data['order_check'] = $this->model_products->check_order($id,$result);
            $data['cusid'] = $result;
            
            if($this->model_products->check_review($id,$result) != null)
            {
                $data['review_id'] = $this->db->query("SELECT `id` FROM `review` WHERE `user_id` = '$result' AND `product_id` = '$id' ")->row()->id;
            }
        }
		$data['products'] = $this->db->select('*')
        ->from('products')
        ->join('category', 'category.cid = products.category_id')
        ->where('products.id',$id)->get()->result();
		$data['dog'] = $this->model_category->show_dog()->result();
		$data['cat'] = $this->model_category->show_cat()->result();
		$data['birds'] = $this->model_category->show_birds()->result();
        $data['smallp'] = $this->model_category->show_smallpet()->result();
        $data['review'] = $this->model_products->get_review($id)->result();
        $data['review_count'] = $this->model_products->get_count_review($id);
        $data['check_1'] = $this->model_products->check_1($id);
        $data['check_2'] = $this->model_products->check_2($id);
        $data['check_3'] = $this->model_products->check_3($id);
        $data['check_4'] = $this->model_products->check_4($id);
        $data['check_5'] = $this->model_products->check_5($id);
        $data['proid'] = $id;
        $data['avg_rating'] = $this->model_products->average_rating($id);
		$data['title'] = 'Products';
        $this->load->view('home/header',$data);
        $this->load->view('home/detail_product',$data);
        $this->load->view('home/footer');
	}
	public function services()
	{
		$data['services'] = $this->model_services->show_data()->result();
        $data['title'] = 'Services';
        $user = $this->session->userdata('username');
        if($user)
        {
            $role_id = $this->db->query("SELECT `role_id` FROM `user` WHERE `username` = '$user'")->row()->role_id;
        }
        if(empty ($role_id))
        {
            $role = "2";
        }
        else
        {
            $role = $role_id;
        }
        $data['role_id'] =  $role;
        $this->load->view('home/header',$data);
        $this->load->view('home/services',$data);
        $this->load->view('home/footer');
    }
    public function diagnosis()
    {
        if(!$this->session->userdata('username')){ 
            $this->session->set_flashdata('message', '<div class="alert alert-warning text-center alert-dismissible fade show" role="alert">You need to login first!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('auth/login');
        }
        else
        {
            $data['title'] = 'Diagnosis';
            $this->load->view('home/header',$data);
            $this->load->view('cf/diagnosis',$data);
            $this->load->view('home/footer');
        }
    }
    
    public function calculate_cf()
    {
        $data['title'] = 'Result';
        $symptom = implode(",", $this->input->post("symptom"));//get list all selected symptom
        $data["listSymptom"] = $this->model_symptom->get_list_by_id($symptom);
        $username = $this->session->userdata('username');
        $data["username"] = $username;
        $user_id = $this->db->get_where('user', ['username'=> $username])->row()->id;
        //calculate cf value
        $listDiseases = $this->model_cf->get_by_symptom($symptom); //get disease data
        $disease = array();
        $total=0;
        foreach($listDiseases->result() as $value){
            $listSymptom = $this->model_cf->get_symptom_by_disease($value->disease_id,$symptom); //get the cf value with the matched disease
            $combineCFmb=0;
            $combineCFmd=0;
            $CFBefore=0;
            $j=0;
            foreach($listSymptom->result() as $value2){
                $j++;
                // if($j==3){
                //     $combineCFmb=$value2->mb;
                //     $combineCFmd=$value2->md;}
                // else
                // {
                $combineCFmb =$combineCFmb + ($value2->mb * (1 - $combineCFmb));
                $combineCFmd =$combineCFmd + ($value2->md * (1 - $combineCFmd));
                // }

                $combinehasil = $combineCFmb-$combineCFmd; 
                // var_dump($j);
            }
            if($combinehasil)
            {
                $disease[$total]=array('code'=>$value->code,
                                    'name'=>$value->name,
                                    'cf_value'=>$combinehasil*100,
                                    'information'=>$value->information,
                                    'user_id' =>$user_id,
                                    'created_at'=>time());
                $this->db->insert('diagnosis_result', $disease[$total]);
                $total++;
            }
            
        }
        //record to history
        var_export($combinehasil, true);
        $insert_data = array();
        foreach ($this->input->post("symptom") as $g) {
            $insert_data[] = array(
                            'code'=>$value->code,
                            'user_id' => $user_id,
                            'symptom_id' => $g,
                            'name'=>$value->name,
                            'created_at'=>time()
                        );
        }
        $this->db->insert_batch('history', $insert_data);
        
        //diagnosis_result sorting cf_value -1 b turun
        function cmp($a, $b)
        {
            return ($a["cf_value"] > $b["cf_value"]) ? -1 : 1;
        }
        usort($disease, "cmp");
        $data["listDiseases"] = $disease;
        $disease = $disease + array(null);
        // $data_hasil = array(
        //     'code' =>$disease[0]['code'],
        //     'name' =>$disease[0]['name'],
        //     'cf_value' =>$disease[0]['cf_value'],
        //     'information' =>$disease[0]['information'],
        //     'user_id' =>$user_id,
        //     'created_at'=>time()
        // );
        // $this->db->insert('diagnosis_result', $data_hasil);
        $this->load->view('home/header',$data);
        $this->load->view('cf/result',$data);
        $this->load->view('home/footer');
    }

    public function list_sympt($type)
    {
        if($type == "dog")
        {
            if(!$this->input->post('symptom')){
                $data['title'] = 'Diagnosis';
                $data['listS'] = $this->model_group->get_list_data('Dog');
                $this->load->view('home/header',$data);
                $this->load->view('cf/list_sympt',$data);
                $this->load->view('home/footer');
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Please select a symptom before pressing the "Process" button! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            }
            else
            {
                $this->calculate_cf();
            }
        }
        elseif($type == "cat")
        {
            if (!$this->input->post('symptom')) {
                $data['title'] = 'Diagnosis';
                $data['listS'] = $this->model_group->get_list_data('Cat');
                $this->load->view('home/header',$data);
                $this->load->view('cf/list_sympt',$data);
                $this->load->view('home/footer');
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" role="alert">Please select a symptom before pressing the "Process" button! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
            }
            else
            {
                $this->calculate_cf();
            }
        }
    }

    public function detail_services($id)
    {
        if($id == 1)
        {
            $data['title'] = 'Pet Hotel';
            $data['services'] = $this->model_services->detail_service($id);
            $this->load->view('home/header',$data);
            $this->load->view('Home/pethotelo',$data);
            $this->load->view('home/footer');
        }
        if($id == 3)
        {
            $data['title'] = 'Pet Salon';
            $data['services'] = $this->model_services->detail_service($id);
            $this->load->view('home/header',$data);
            $this->load->view('Home/petsalono',$data);
            $this->load->view('home/footer');
        }
        if($id == 2)
        {
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $lol = $this->session->userdata('username');
            if ($lol==null)
            {
                $data['veterinarian'] = $this->model_services->get_vet(3)->result();
                $data['services'] = $this->model_services->detail_service($id);
                $this->load->view('home/header',$data);
                $this->load->view('Home/pethealtho',$data);
                $this->load->view('home/footer');
            }
            else
            {
                $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
                $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
                $row = $query->row_array();
                $data['customer']= $row;
                $data['title'] = 'Pet Health';
                $data['veterinarian'] = $this->model_services->get_vet(3)->result();
                $data['services'] = $this->model_services->detail_service($id);
                $this->load->view('home/header',$data);
                $this->load->view('Home/pethealtho',$data);
                $this->load->view('home/footer');

            }
            
        }

    }
}