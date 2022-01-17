<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('username')){
            redirect('menu');
        }
        $this->load->model('user_m');
    }
    
    public function index()
    {
        $this->load->view('v_login');
    }

    public function cek_login(){
        $username = $this->input->post('username', true);
        $password = $this->input->post('password', true);
        $data_login=$this->user_m->check_username($username);
        if($data_login){
            if(password_verify($password, $data_login['password'])){
                $data_session=[
                    "iduser"    =>$data_login['idpengguna'],
                    "fullname"  =>$data_login['nama_lengkap'],
                    "username"  =>$data_login['username'],
                    "level"     =>$data_login['level']
                ];
                $this->session->set_userdata($data_session);
                redirect(base_url('menu'));
            }
            else{
                $this->session->set_flashdata('error', 'Password Anda Salah !');
            }
        }else{
            $this->session->set_flashdata('error', 'Username tidak terdaftar !');
        }
        redirect('login');
    }
}

/* End of file Login.php */