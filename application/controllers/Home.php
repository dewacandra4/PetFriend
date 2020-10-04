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
    public function add_to_cart()
    {
        $data = array(
            'id' => $this->input->post('id'), 
            'name' => $this->input->post('name'), 
            'price' => $this->input->post('price'), 
            'qty' => $this->input->post('quantity'), 
            'img' => $this->input->post('image'), 
            'category' => $this->input->post('cat'),
            'stocks' => $this->input->post('stocks'),

        );

        $this->cart->insert($data);   
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Added to cart<button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button></div>');
        redirect('Home/cart');
    }

    //to remove an item from cart
    public function Remove_cart($rowid)
    {
        $this->cart->remove($rowid); 
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">Item Removed<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button></div>');
            redirect('Home/cart');

    }

    public function update_cart($rowid)
    {
        $data = array(
            'rowid' => $rowid,
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
    public function detail_services($id)
	{
		$data['services'] = $this->model_services->detail_service($id);
		$data['title'] = 'Services';
        $this->load->view('home/header',$data);
        $this->load->view('home/detail_services',$data);
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
                $data['title'] = 'Result';
                $symptom = implode(",", $this->input->post("symptom"));
                $data["listSymptom"] = $this->model_symptom->get_list_by_id($symptom);
                
                //hitung
                $listDiseases = $this->model_cf->get_by_symptom($symptom);
                $disease = array();
                $total=0;
                foreach($listDiseases->result() as $value){
                    $listSymptom = $this->model_cf->get_symptom_by_disease($value->disease_id,$symptom);
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

                var_export($combinehasil, true);
                $insert_data = array();
                foreach ($this->input->post("symptom") as $g) {
                    $insert_data[] = array(
                                    // 'user_id' => $user_login,
                                    'symptom_id' => $g
                                );
                }
                $this->db->insert_batch('history', $insert_data);

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
                    // 'user_id' =>$disease[0]['user_id'],
                );
                $this->db->insert('diagnosis_result', $data_hasil);
                $this->load->view('home/header',$data);
                $this->load->view('cf/result',$data);
                $this->load->view('home/footer');
            }
        }
        elseif($type == "cat")
        {
            
        }
    }
}