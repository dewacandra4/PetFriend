<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function login()
    {
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run()==false)
        {
            //fungsiny ketika masuk link localhost/mhs info langsung ke load yang ini
            //ada header ada footer tu urutan yang di load
            $data['title'] = 'Login';//set title sesuai page
            $this->load->view('home/header',$data);
            $this->load->view('auth/form_login');
            $this->load->view('home/footer');
        }
        else
        {
            //validation success
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        if($user)
        {
            //check password (pw_verify)
            if(password_verify($password, $user['password']))
            {
                //siapin data username dan role id
                $data = [
                    'username' => $user['username'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                //cek apakah dia user/admin
                if($user['role_id']==1)
                {
					// redirect('admin');
					echo "BERHASIL MASUK ADMIN";
                }
                else
                {
					redirect('customer');
                }
            }
            else
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                redirect('auth/login');
            }
        }

        else
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered !</div>');
            redirect('auth/login');
        }
    }
	
	public function registration()
	{
		$data['user'] = $this->db->get_where('user', ['id'=> $this->session->userdata('id')])->row_array();
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]',  [
            'is_unique' => 'This username has already registered !'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',  [
            'is_unique' => 'This email has already registered !'
        ]);
        $this->form_validation->set_rules('phone','Phone Number','required|numeric');

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches'=>'Password does not match!',
            'min_length'=>'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    
        if($this->form_validation->run() == false)
        {
            $data['title'] = 'Registration';
            $this->load->view('home/header',$data);
            $this->load->view('auth/form_register');
            $this->load->view('home/footer');
        }
        else
        {
			$data = [
				'name' => htmlspecialchars($this->input->post('name',true)), //htmlspecialchars prevent from sql injection or scripct/html inject
				'address' => htmlspecialchars($this->input->post('address',true)), //htmlspecialchars prevent from sql injection or scripct/html inject
				'phone' => $this->input->post('phone',true),
				'email' => htmlspecialchars($this->input->post('email',true)),
				'username' => htmlspecialchars($this->input->post('username',true)),
				'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),// password hash encrypst
				'image' =>'default.jpg',
                'role_id' => 2,
                'date_created' => time()
          	];
			$query = $this->db->query("SELECT * FROM user;");
			$this->db->insert('user', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your account has been created. Please Login</div>');
			redirect('auth/login');
        }
	}
}