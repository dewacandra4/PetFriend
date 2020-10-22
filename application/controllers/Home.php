<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data['products'] = $this->model_products->show_data()->result();
		$data['title']= 'PetFriend';
		$this->load->view('home/header',$data);
		$this->load->view('home/home',$data);
		$this->load->view('home/footer');
	}
	public function products()
	{
		$data['title'] = 'Products';

		$data['start'] = $this->uri->segment(4);
        //load library
        
        $this->load->library('pagination');
        //config
        $config['base_url'] = 'http://localhost/PetFriend/home/products/index';
        $config['total_rows'] = $this->model_products->countAllProducts();
        $config['per_page'] = 10;
        
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
        
        
        $data['products'] = $this->model_products->getProducts($config['per_page'],$data['start']);
        $this->load->view('home/header',$data);
        $this->load->view('home/products',$data);
        $this->load->view('home/footer');
    }

    public function add_to_cart($id)
    {
        $q1 = $this->db->query("SELECT`name`FROM `products` WHERE `id` = $id")->row()->name;
        $q2 = $this->db->query("SELECT`price`FROM `products` WHERE `id` = $id")->row()->price;
        $q3 = $this->db->query("SELECT`img`FROM `products` WHERE `id` = $id")->row()->img;
        $q4 = $this->db->query("SELECT`category`FROM `products` WHERE `id` = $id")->row()->category;
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

    //to remove an item from cart
    public function Remove_cart($rowid)
    {
        $this->cart->remove($rowid); 
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Item 
        Removed<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('Home/cart');

    }

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

    public function check_out()
    {
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
            redirect('home/payment');
        }
    }
//viewing the checkout form for products
    public function payment()
    {
        $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
        $lol = $this->session->userdata('username');
        $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
        $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
        $row = $query->row_array();
        $data['customer']= $row;
        $data['title'] = 'Payment';
        $this->load->view('home/header',$data);
        $this->load->view('customer/payment',$data);
        $this->load->view('home/footer');
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
                'delivery_note' => $this->input->post ('delivery_note')
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
        redirect('customer/dashboard/my_producto');

    }


	public function detail_product($id)
	{
		$data['products'] = $this->model_products->detail_product($id);
		$data['dog'] = $this->model_category->data_dog()->result();
		$data['cat'] = $this->model_category->data_cat()->result();
		$data['birds'] = $this->model_category->data_birds()->result();
		$data['smallp'] = $this->model_category->data_smallpet()->result();
		$data['title'] = 'Products';
        $this->load->view('home/header',$data);
        $this->load->view('home/detail_product',$data);
        $this->load->view('home/footer');
	}
	public function services()
	{
		$data['services'] = $this->model_services->show_data()->result();
		$data['title'] = 'Services';
        $this->load->view('home/header',$data);
        $this->load->view('home/services',$data);
        $this->load->view('home/footer');
    }
    public function diagnosis()
    {
        if(!$this->session->userdata('username')){ 
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
                if($j==3){
                    $combineCFmb=$value2->mb;
                    $combineCFmd=$value2->md;}
                else
                {
                $combineCFmb =$combineCFmb + ($value2->mb * (1 - $combineCFmb));
                $combineCFmd =$combineCFmd + ($value2->md * (1 - $combineCFmd));
                }

                $combinehasil = $combineCFmb-$combineCFmd; 
            }
            if($combinehasil)
            {
                $disease[$total]=array('code'=>$value->code,
                                    'name'=>$value->name,
                                    'credibility'=>$combinehasil*100,
                                    'information'=>$value->information);
                                    // 'user_id' =>$user_login);
                // $this->db->insert('diagnosis_result', $disease[$total]);
                $total++;
            }
            
        }
        //record to history
        var_export($combinehasil, true);
        $insert_data = array();
        foreach ($this->input->post("symptom") as $g) {
            $insert_data[] = array(
                            'user_id' => $user_id,
                            'symptom_id' => $g
                        );
        }
        $this->db->insert_batch('history', $insert_data);
        
        //diagnosis_result
        function cmp($a, $b)
        {
            return ($a["credibility"] > $b["credibility"]) ? -1 : 1;
        }
        usort($disease, "cmp");
        $data["listDiseases"] = $disease;
        $disease = $disease + array(null);
        $data_hasil = array(
            'code' =>$disease[0]['code'],
            'name' =>$disease[0]['name'],
            'credibility' =>$disease[0]['credibility'],
            'information' =>$disease[0]['information'],
            'user_id' =>$user_id,
        );
        $this->db->insert('diagnosis_result', $data_hasil);
        $this->load->view('home/header',$data);
        $this->load->view('cf/result',$data);
        $this->load->view('home/footer');
    }
    public function list_sympt($type)
    {
        if($type == "dog")
        {
            if (!$this->input->post('symptom')) {
                $data['title'] = 'Diagnosis';
                $data['listS'] = $this->model_group->get_list_data('Dog');
                $this->load->view('home/header',$data);
                $this->load->view('cf/list_sympt',$data);
                $this->load->view('home/footer');
            }
            else
            {
                $this->calculate_cf();
            }
        }
        elseif($type == "cat")
        {
            
        }
    }

    public function detail_services($id)
    {
        if($id == 1)
        {
            $data['user'] = $this->db->get_where('user', ['username'=> $this->session->userdata('username')])->row_array();
            $lol = $this->session->userdata('username');
            $result= $this->db->query("SELECT `id` FROM `user` WHERE `username` = '$lol'")->row()->id;
            $query = $this->db->query("SELECT * FROM `user` WHERE `id` = $result");
            $row = $query->row_array();
            $data['customer']= $row;
            $data['title'] = 'Pet Hotel';
            $data['services'] = $this->model_services->detail_service($id);
            $this->load->view('home/header',$data);
            $this->load->view('Home/pethotelo',$data);
            $this->load->view('home/footer');
        }

    }
}