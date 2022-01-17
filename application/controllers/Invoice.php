<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        $this->load->model('invoice_m');
    }
    
    public function add_inv()
    {
        $data = [
            'customer_id'=>htmlspecialchars($this->input->post('customer_id',true)),
            'tanggal'=>htmlspecialchars($this->input->post('tanggal',true)),
            'no_surat'=>htmlspecialchars($this->input->post('no_surat',true)),
            'no_po'=>htmlspecialchars($this->input->post('no_po',true)),
            'create_at'=>time(),
            'create_by'=>_session('iduser')
        ];
        $invoice_id = $this->invoice_m->tambahBaru($data);
        $this->session->set_flashdata('success','Anda berhasil mengunci Invoice');
        redirect('menu/create_inv?inv_id='.enc_url($invoice_id));
    }

    public function add_brg()
    {
        $invoice_id = $this->input->post('invoice_id',true);
        $data = [
            'invoice_id'=>htmlspecialchars($invoice_id),
            'barang_id'=>htmlspecialchars($this->input->post('barang_id',true)),
            'volume'=>htmlspecialchars($this->input->post('volume',true)),
            'harga_satuan'=>htmlspecialchars(delMask($this->input->post('harga_satuan',true))),
            'sub_total'=>htmlspecialchars($this->input->post('volume',true))*htmlspecialchars(delMask($this->input->post('harga_satuan',true)))
        ];
        // var_dump($data);die;
        $this->invoice_m->tambahBarang($data);
        $this->session->set_flashdata('success','Anda berhasil menambahkan daftar barang pada Invoice');
        redirect('menu/create_inv?inv_id='.enc_url($invoice_id));
    }
    
    public function detail($id)
    {
        $data['mInvoice'] = true;
        $data['id'] = dec_url($id);
        $data['content'] = 'v_detail_inv';
        $this->load->view('index',$data);
    }

    public function cetak_all($id)
    {
        $data['id'] = dec_url($id);
        $this->load->view('cetak_all',$data);
    }

    public function cetak_inv($id)
    {
        $data['id'] = dec_url($id);
        $this->load->view('cetak_inv',$data);
    }

    public function cetak_surat_jalan($id)
    {
        $data['id'] = dec_url($id);
        $this->load->view('cetak_surat_jalan',$data);
    }
    // public function save()
    // {
    //     $id = $this->input->post('idcustomer',true);
    //     $data = [
    //         'tujuan_id'=>htmlspecialchars($this->input->post('tujuan_id',true)),
    //         'nama'=>htmlspecialchars(strtoupper($this->input->post('nama',true)))
    //     ];
    //     if($id==''){
    //         $this->invoice_m->tambahBaru($data);
    //         $this->session->set_flashdata('success','Anda berhasil menambahkan data Customer');
    //     }else{
    //         $this->invoice_m->editData($data,$id);
    //         $this->session->set_flashdata('success','Anda berhasil mengubah data Customer');

    //     }
    //     redirect('menu/invoice');
    // }


    public function view(){
        $id = $this->input->post('id',true);
        $data = $this->invoice_m->getById($id);
        echo json_encode($data);
    }

    public function hapus($id){
        $del = $this->invoice_m->hapus($id);
        if($del){
            $this->session->set_flashdata('success','Anda berhasil menghapus data Invoice');
        }else{
            $this->session->set_flashdata('error','Maaf, data gagal dihapus, data terikat dengan data lainnya !');
        }
        redirect('menu/invoice');
    }

    public function hapus_inv($id,$inv_id){
        $del = $this->invoice_m->hapusInv($id);
        if($del){
            $this->session->set_flashdata('success','Anda berhasil menghapus data baranga pada Invoice ini');
        }else{
            $this->session->set_flashdata('error','Maaf, data gagal dihapus, data terikat dengan data lainnya !');
        }
        redirect('menu/create_inv?inv_id='.$inv_id);
    }

}

/* End of file Invoice.php */