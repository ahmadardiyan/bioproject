<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');    
    }

    public function login()
    {
        if ($this->Auth_model->is_login()) {
            if ($_SESSION['level'] == 'member') {
                redirect('member', 'refresh');
            } else {
                redirect('company', 'refresh');
            }  
        }        
        $this->form_validation->set_rules('email', 'Email', 'required|callback_checkEmail|callback_checkRole');
        $this->form_validation->set_rules('password', 'Password', 'required|callback_checkPassword');
        $data['title'] = "Login BioProject";

        if ($this->form_validation->run() === false) {
            $this->load->view('partials/user/header', $data);
            $this->load->view('auth/login');
            $this->load->view('partials/user/footer');
        } else {
            $user = $this->Auth_model->get_user('email', $this->input->post('email'));

            $_SESSION['id_user'] = $user['id_user'];
            $_SESSION['level'] = $user['level'];
            $_SESSION['login'] = true;
           
            if ($_SESSION['level'] == 'member') {
                redirect('member', 'refresh');
            } else {
                redirect('company', 'refresh');
            }  

        }
        // }
    }

    public function checkEmail($email)
    {
        if (!$this->Auth_model->get_user('email', $email)) {
            $this->form_validation->set_message('checkEmail', 'email belum terdaftar!');
            return false;
        }
        return true;
    }

    public function checkPassword($password)
    {
        $user = $this->Auth_model->get_user('email', $this->input->post('email'));

        if (!$this->Auth_model->checkPassword($user['email'], $password)) {
            $this->form_validation->set_message('checkPassword', 'Password yang dimasukkan salah!');
            return false;
        }
        return true;
    }

    public function checkRole($email)
    {
        $user = $this->Auth_model->get_user('email', $this->input->post('email'));

        if ($user['role'] != 1) {
            $this->form_validation->set_message('checkRole', 'Email belum diverifikasi!');
            return false;
        }
        return true;
    }

    public function logout()
    {
        // var_dump('hahaha');
        // die();
        unset($_SESSION['id_user'], $_SESSION['login'], $_SESSION['level']);
        redirect('login', 'refresh');
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confrimpassword', 'Konfirmasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('checkbox', 'Checkbox', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');

        $data['title'] = "Registrasi BioProject";

        if ($this->form_validation->run() === false) {
            $this->load->view('partials/user/header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('partials/user/footer');
        } else {
            $this->Auth_model->insert_data(); //menyimpan data
            $this->send_email_verification($this->input->post('email'), $_SESSION['token']); //verifikasi email
            redirect('login');
        }
    }

    public function send_email_verification($email, $token)
    {
        $this->load->library('email'); //mengaktifkan library email
        $this->email->from('bioprojecttif@gmail.com', 'BioProject');
        $this->email->to($email);
        $this->email->subject('Verifikasi Akun');
        $this->email->message("
			Klik untuk verifikasi Akun <a href='http://localhost/bioproject/verify_register/$email/$token'>Verifikasi Email</a>");
        $this->email->set_mailtype('html');
        $this->email->send();
    }

    public function verify_register($email, $token)
    {
        $user = $this->Auth_model->get_user('email', $email);

        if (!$user) {
            die("Email tidak ditemukan");
        } //cek email

        if ($user['token'] !== $token) {
            die("Token tidak sesuai");
        } //cek token

        $this->Auth_model->update_role($user['id_user'], 1); //update role bedasarkan id
        
        $_SESSION['id_user'] = $user['id_user']; //set session
        $_SESSION['level'] = $user['level'];
        $_SESSION['login'] = true;
        
        if ($_SESSION['level'] == 'member') {
            $data = [
                'id_user' => $user['id_user'],
                'id_prov' => 0,
                'id_kab' => 0,
                'id_kec' => 0,
                'foto' => 'member.png'
            ];
            $this->Auth_model->createID('member', $data);
            redirect('update-profile', 'refresh');
        } else {
            $data = [
                'id_user' => $user['id_user'],
                'id_prov' => 0,
                'id_kab' => 0,
                'id_kec' => 0,
                'logo_perusahaan' => 'company.png'
            ];
            $this->Auth_model->createID('perusahaan', $data);
            redirect('update-profile-company', 'refresh');
        }  

    }

    public function forgotPassword()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|callback_checkEmail');

        if ($this->form_validation->run() === false) {
            $data['judul'] = 'Lupa Password';

            $this->load->view('partials/user/header', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('partials/user/footer');
        } else {
            $user = $this->Auth_model->get_user('email', $this->input->post('email'));

            $this->sendEmailNewPassword($user['email'], $user['token']);
            redirect('login');
        }
    }

    public function sendEmailNewPassword($email, $token)
    {
        $this->load->library('email');
        $this->email->from('bioprojecttif@gmail.com', 'BioProject');
        $this->email->subject('Pembaruan Password');
        $this->email->to($email);
        $this->email->message("
			Klik untuk pembaruan password <a href='http://localhost/bioproject/newPassword/$email/$token'>Perbarui Password</a>
			");
        $this->email->set_mailtype('html');
        $this->email->send();
    }

    public function newPassword($email, $token)
    {
        $user = $this->Auth_model->get_user('email', $email);

        if (!$user) {
            die("Email tidak ditemukan");
        } //cek email

        if ($user['token'] !== $token) {
            die("Token tidak sesuai");
        } //cek token

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confrimpassword', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() === false) {
            $data['judul'] = 'Perbarui Password';
            $this->load->view('partials/user/header', $data);
            $this->load->view('auth/input_new_password');
            $this->load->view('partials/user/footer');
        } else {
            // var_dump($user);
            // die();
            $this->Auth_model->updatePassword($user['id_user']); //update password

            redirect('member'); //redirect member
        }
    }
}