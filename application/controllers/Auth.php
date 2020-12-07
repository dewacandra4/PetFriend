<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
	public function login()
    {
        $this->form_validation->set_rules('username','Username','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');
        if ($this->session->userdata('username')) {
            redirect('home');
        } 
        else
        {    
            if($this->form_validation->run()==false)
            {
                $data['title'] = 'Login';
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
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        
        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        if($user)
        {
            if($user['is_active'] == 1)
            {
                //check password (pw_verify)
                if(password_verify($password, $user['password']))
                {
                    $data = [
                        'username' => $user['username'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    //Check role customer or admin
                    if($user['role_id']==1)
                    {
                        redirect('admin/dashboard');
                    }
                    else if($user['role_id'] ==2)
                    {
                        redirect('customer/dashboard');
                    }
                    else if($user['role_id'] == 3)
                    {
                        redirect('doctor/dashboard');
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
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center alert-dismissible fade show" 
                role="alert">This account has not been activated! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
               </button></div>');
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
		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('address', 'Address', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]',  [
            'is_unique' => 'This username has already registered !'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',  [
            'is_unique' => 'This email has already registered !'
        ]);
        $this->form_validation->set_rules('phone','Phone Number','required|numeric');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[10]|matches[password2]', [
            'matches'=>'Password does not match!',
            'min_length'=>'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->session->userdata('username')) {
            redirect('home');
        } 
        else
        {    
            if($this->form_validation->run() == false)
            {
                $data['title'] = 'Registration';
                $this->load->view('home/header',$data);
                $this->load->view('auth/form_register');
                $this->load->view('home/footer');
            }
            else
            {
                $email = $this->input->post('email', true);
                $data = [
                    'name' => htmlspecialchars($this->input->post('name',true)), //htmlspecialchars prevent from malicious html code inject
                    'address' => htmlspecialchars($this->input->post('address',true)), 
                    'phone' => htmlspecialchars($this->input->post('phone',true)),
                    'email' => htmlspecialchars($email),
                    'username' => htmlspecialchars($this->input->post('username',true)),
                    'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),// password hash encrypst
                    'image' =>'default.jpg',
                    'role_id' => 2,
                    'is_active' => 0,
                    'date_created' => time()
                ];
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user', $data);
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'verify');//send an email to the customer for account activation
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation! your account has been created. Please check your email to activate your account</div>');
                redirect('auth/login');
            }
        }
    }
    
    private function _sendEmail($token, $type)
    {
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
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Please click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') .
             '&token=' . urlencode($token) . '">Activate</a><br> Ignore this email if you have never registered an account on the PetFriend website');
        } 

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) //if user not activated their account after 24hour
                {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' has been activated! Please login.</div>');
                    redirect('auth/login');
                } 
                else 
                {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth/login');
                }
            } 
            else 
            {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth/login');
            }
        } 
        else 
        {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
            redirect('auth/login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');
        $this->cart->destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success text-center alert-dismissible fade show" role="alert">You have been logged out! <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button></div>');
        redirect('auth/login');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }

}