<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        $this->load->model('barang_m');
    }
    
    public function index()
    {
        
    }
    
    public function save()
    {
        $id = $this->input->post('idbarang',true);
        $data = [
            'satuan_id'=>htmlspecialchars($this->input->post('satuan_id',true)),
            'nama'=>htmlspecialchars(strtoupper($this->input->post('nama',true)))
        ];
        if($id==''){
            $this->barang_m->tambahBaru($data);
            $this->session->set_flashdata('success','Anda berhasil menambahkan data Barang');
        }else{
            $this->barang_m->editData($data,$id);
            $this->session->set_flashdata('success','Anda berhasil mengubah data Barang');

        }
        redirect('menu/barang');
    }


    public function view(){
        $id = $this->input->post('id',true);
        $data = $this->barang_m->getById($id);
        echo json_encode($data);
    }

    public function hapus($id){
        $del = $this->barang_m->hapus($id);
        if($del){
            $this->session->set_flashdata('success','Anda berhasil menghapus data Barang');
        }else{
            $this->session->set_flashdata('error','Maaf, data gagal dihapus, data terikat dengan data lainnya !');
        }
        redirect('menu/barang');
    }

}

/* End of file Barang.php */