<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Jayapura");
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        $this->load->model('user_m');
        $this->load->model('satuan_m');
        $this->load->model('tujuan_m');
        $this->load->model('barang_m');
        $this->load->model('customer_m');
        $this->load->model('invoice_m');
    }
    
    public function index()
    {
        $data['mDashboard'] = true;
        $data['content'] = 'dashboard';
        $this->load->view('index',$data);
    }

    public function profil()
    {
        $data['mMaster'] = $data['mProfil'] = true;
        $data['content'] = 'v_profil';
        $this->load->view('index',$data);
    }

    public function satuan()
    {
        $data['mMaster'] = $data['mSatuan'] = true;
        $data['all_satuan'] = $this->satuan_m->getAll();
        $data['content'] = 'v_satuan';
        $this->load->view('index',$data);
    }

    public function tujuan()
    {
        $data['mMaster'] = $data['mTujuan'] = true;
        $data['all_tujuan'] = $this->tujuan_m->getAll();
        $data['content'] = 'v_tujuan';
        $this->load->view('index',$data);
    }
    
    public function barang()
    {
        $data['mMaster'] = $data['mBarang'] = true;
        $data['all_barang'] = $this->barang_m->getAll();
        $data['content'] = 'v_barang';
        $this->load->view('index',$data);
    }

    public function customer()
    {
        $data['mMaster'] = $data['mCustomer'] = true;
        $data['all_customer'] = $this->customer_m->getAll();
        $data['content'] = 'v_customer';
        $this->load->view('index',$data);
    }
    
    public function create_inv()
    {
        $data['mCreateInv'] = true;
        $data['content'] = 'form_inv.php';
        $this->load->view('index',$data);
    }

    public function invoice()
    {
        $data['mInvoice'] = true;
        $data['all_inv'] = $this->invoice_m->getAll();
        $data['content'] = 'v_invoice.php';
        $this->load->view('index',$data);
    }

    public function kenaikan_pangkat()
    {
        $data['mKenaikanPangkat'] = true;
        $select_year = $this->input->get('tahun_kenaikan');
        $jenis_jabatan = $this->input->get('jenis_jabatan');
        $data['list_pns']=$this->pegawai_m->getKenaikanPangkat($select_year,$jenis_jabatan);
        $data['content']='v_kenaikan_pangkat';
        $this->load->view('index',$data);
    }

    public function kenaikan_gajiberkala()
    {
        $data['mKenaikanGajiBerkala'] = true;
        $select_year = $this->input->get('tahun_kenaikan');
        $data['list_pns']=$this->pegawai_m->getKenaikanGajiBerkala($select_year);
        $data['content']='v_kenaikan_gajiberkala';
        $this->load->view('index',$data);
    }

    public function pengguna()
    {
        $data['mPengguna'] = true;
        $data['pengguna'] = $this->user_m->getAll();
        $data['content'] = 'v_pengguna';
        $this->load->view('index',$data);
    }

    public function pegawai($id)
    {
        $data['mUploadBerkas'] = true;
        $data['all_berkas'] = $this->pegawai_m->getBerkas($id);
        $data['row'] = $this->pegawai_m->getByIdPNS($id);
        $data['content'] = 'berkas';
        $this->load->view('index',$data);
    }

    public function ubah_password(){
        if($this->session->userdata('level')=='pegawai'){
            $table = 'pegawai';
            $id = 'id_pegawai';
        }else{
            $table = 'pengguna';
            $id = 'idpengguna';
        }
        $data = [ 
            'password'=>password_hash($this->input->post('password',true),PASSWORD_DEFAULT)
        ];
        $this->db->update($table,$data,[$id=>$this->input->post('id',true)]);
        $this->session->set_flashdata('success','Anda berhasil mengubah password');
        echo '<script>javascript:history.back()</script>';
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('welcome');
    }

}

/* End of file Menu.php */