<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        $this->load->model('customer_m');
    }
    
    public function index()
    {
        
    }
    
    public function save()
    {
        $id = $this->input->post('idcustomer',true);
        $data = [
            'tujuan_id'=>htmlspecialchars($this->input->post('tujuan_id',true)),
            'nama'=>htmlspecialchars(strtoupper($this->input->post('nama',true)))
        ];
        if($id==''){
            $this->customer_m->tambahBaru($data);
            $this->session->set_flashdata('success','Anda berhasil menambahkan data Customer');
        }else{
            $this->customer_m->editData($data,$id);
            $this->session->set_flashdata('success','Anda berhasil mengubah data Customer');

        }
        redirect('menu/customer');
    }


    public function view(){
        $id = $this->input->post('id',true);
        $data = $this->customer_m->getById($id);
        echo json_encode($data);
    }

    public function hapus($id){
        $del = $this->customer_m->hapus($id);
        if($del){
            $this->session->set_flashdata('success','Anda berhasil menghapus data Customer');
        }else{
            $this->session->set_flashdata('error','Maaf, data gagal dihapus, data terikat dengan data lainnya !');
        }
        redirect('menu/customer');
    }

}

/* End of file Customer.php */