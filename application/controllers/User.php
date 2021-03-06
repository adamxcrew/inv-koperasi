<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_m');
        
    }

    public function index()
    {
        
    }

    public function save()
    {
        $id = $this->input->post('idpengguna',true);
        if($id==''){
            $username = $this->input->post('username',true);
            $cek = $this->user_m->cekUsername($username);
            if($cek==0){
                $data = [
                    'nama_lengkap'=>$this->input->post('nama_lengkap',true),
                    'username'=>$username,
                    'password'=>password_hash($this->input->post('password',true),PASSWORD_DEFAULT),
                    'level'=>$this->input->post('level',true)
                ];
                $this->user_m->tambahBaru($data);
                $this->session->set_flashdata('success','Anda berhasil menambahkan data Pengguna');
            }else{
                $this->session->set_flashdata('error','Maaf username telah digunakan');
            }
        }else{
            $password = $this->input->post('password',true);
            if($password==''){
                $data = [
                    'nama_lengkap'=>$this->input->post('nama_lengkap',true),
                    'username'=>$this->input->post('username',true),
                    'level'=>$this->input->post('level',true)
                ];
            }else{
                $data = [
                    'nama_lengkap'=>$this->input->post('nama_lengkap',true),
                    'username'=>$this->input->post('username',true),
                    'password'=>password_hash($this->input->post('password',true),PASSWORD_DEFAULT),
                    'level'=>$this->input->post('level',true)
                ];
            }
            $this->user_m->editData($data,$id);
            $this->session->set_flashdata('success','Anda berhasil mengubah data Pengguna');

        }
        redirect('menu/pengguna');
    }

    public function view(){
        $id = $this->input->post('id',true);
        $data = $this->user_m->getById($id);
        echo json_encode($data);
    }

    public function hapus($id){
        $this->user_m->hapus($id);
        $this->session->set_flashdata('success','Anda berhasil menghapus data Pengguna');
        redirect('menu/pengguna');
    }

}

/* End of file User.php */