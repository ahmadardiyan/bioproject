<?php

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('email');
        //get all users
        $this->data['users'] = $this->Auth_model->getAllUsers();
    }
    public function index()
    {
        $this->load->view('auth/register', $this->data);
    }

    public function login()
    {
        $this->load->view('auth/login');
    }

    public function register()
    {
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/register', $this->data);
        } else {
            //get user inputs
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            //generate simple random code
            $set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = substr(str_shuffle($set), 0, 12);

            //insert user to users table and get id
            $user['first_name'] = $first_name;
            $user['last_name'] = $last_name;
            $user['email'] = $email;
            $user['password'] = $password;
            $user['code'] = $code;
            $user['active'] = false;
            $id = $this->Auth_model->insert($user);

            //set up email
            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.gmail.com',
                'smtp_port' => 465,
                'smtp_user' => 'eriztaalifad@gmail.com', // change it to yours
                'smtp_pass' => '$%sembilan900$%', // change it to yours
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'wordwrap' => true,
            );

            $message = "
								<html>
								<head>
									<title>Verification Code</title>
								</head>
								<body>
									<h2>Thank you for Registering.</h2>
									<p>Your Account:</p>
									<p>Email: " . $email . "</p>
									<p>Password: " . $password . "</p>
									<p>Please click the link below to activate your account.</p>
									<h4><a href='" . base_url() . "user/activate/" . $id . "/" . $code . "'>Activate My Account</a></h4>
								</body>
								</html>
								";

            $this->email->initialize($config);
            $this->email->set_newline("\r\n");
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject('Please Verify Your Email');
            $this->email->message($message);

            //sending email
            if ($this->email->send()) {
                $this->session->set_flashdata('message', 'Activation code sent to email');
            } else {
                $this->session->set_flashdata('message', $this->email->print_debugger());

            }

            redirect('auth/register'); //habis ini di redirect ke login coy!
        }

    }

    public function activate()
    {
        $id = $this->uri->segment(3);
        $code = $this->uri->segment(4);

        //fetch user details
        $user = $this->Auth_model->getUser($id);

        //if code matches
        if ($user['code'] == $code) {
            //update user active status
            $data['active'] = true;
            $query = $this->Auth_model->activate($data, $id);

            if ($query) {
                $this->session->set_flashdata('message', 'User activated successfully');
            } else {
                $this->session->set_flashdata('message', 'Something went wrong in activating account');
            }
        } else {
            $this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
        }
        redirect('auth/login');

    }

    public function checkLogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[15]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login');
        } else {
            $res = $this->Auth_model->checkUser($email, $password);
            if (!empty($res)) {
                if ($res[0]['active'] == '1') {
                    $user['users'] = $res[0]['first_name'];
                    $this->setSession($res[0]['id'], $res[0]['first_name']);
                    $this->load->view('auth/profile', $user);
                } else {
                    $this->session->set_flashdata('message', 'Verify your email address first to login...');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', 'email/password not found');
                redirect('auth/login');
            }
        }
    }

    public function setSession($userId, $userName)
    {
        $userSession = array('userId' => $userId,
            'userName' => $userName,
            'loggedIn' => true);
        $this->session->set_userdata($userSession);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login', 'refresh');
    }
}
