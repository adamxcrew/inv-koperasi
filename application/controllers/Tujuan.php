<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Tujuan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        $this->load->model('tujuan_m');
    }
    
    public function index()
    {
        
    }
    
    public function save()
    {
        $id = $this->input->post('idtujuan',true);
        $data = [
            'nama'=>htmlspecialchars($this->input->post('nama',true))
        ];
        if($id==''){
            $this->tujuan_m->tambahBaru($data);
            $this->session->set_flashdata('success','Anda berhasil menambahkan data Tujuan');
        }else{
            $this->tujuan_m->editData($data,$id);
            $this->session->set_flashdata('success','Anda berhasil mengubah data Tujuan');
        }
        redirect('menu/tujuan');
    }

    public function view(){
        $id = $this->input->post('id',true);
        $data = $this->tujuan_m->getById($id);
        echo json_encode($data);
    }

    public function hapus($id){
        $del = $this->tujuan_m->hapus($id);
        if($del){
            $this->session->set_flashdata('success','Anda berhasil menghapus data Tujuan');
        }else{
            $this->session->set_flashdata('error','Maaf, data gagal dihapus, data terikat dengan data lainnya !');
        }
        redirect('menu/tujuan');
    }
}

/* End of file Tujuan.php */