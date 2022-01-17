<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        $this->load->model('satuan_m');
    }
    
    public function index()
    {
        
    }
    
    public function save()
    {
        $id = $this->input->post('idsatuan',true);
        $data = [
            'nama'=>htmlspecialchars(strtoupper($this->input->post('nama',true)))
        ];
        if($id==''){
            $this->satuan_m->tambahBaru($data);
            $this->session->set_flashdata('success','Anda berhasil menambahkan data Satuan');
        }else{
            $this->satuan_m->editData($data,$id);
            $this->session->set_flashdata('success','Anda berhasil mengubah data Satuan');
        }
        redirect('menu/satuan');
    }

    public function view(){
        $id = $this->input->post('id',true);
        $data = $this->satuan_m->getById($id);
        echo json_encode($data);
    }

    public function hapus($id){
        $del = $this->satuan_m->hapus($id);
        if($del){
            $this->session->set_flashdata('success','Anda berhasil menghapus data Satuan');
        }else{
            $this->session->set_flashdata('error','Maaf, data gagal dihapus, data terikat dengan data lainnya !');
        }
        redirect('menu/satuan');
    }
}

/* End of file Satuan.php */