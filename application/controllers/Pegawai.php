<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        $this->load->model('pegawai_m');
    }
    
    public function add_pns()
    {
        $data['mDataPegawai'] = $data['mPNS'] = true;
        $data['content'] = 'form_pns';
        $this->load->view('index',$data);
    }

    public function proses_add_pns(){
        $this->form_validation->set_rules('nip', 'NIP', 'required|is_unique[pegawai.nip]');
        if ($this->form_validation->run() == FALSE)
        {
            $this->session->set_flashdata('error',validation_errors());
            redirect(base_url('pegawai/add_pns'));
        }
        else
        {
            $data = [
                "id_jabatan"    =>$this->input->post('id_jabatan', true),
                "nip"           =>$this->input->post('nip', true),
                "nama"          =>$this->input->post('nama', true),
                "tempat_lahir"  =>$this->input->post('tempat_lahir', true),
                "tgl_lahir"     =>$this->input->post('tgl_lahir', true),
                "agama"         =>$this->input->post('agama', true),
                "karpeg"        =>$this->input->post('karpeg', true),
                "tmtcpns"       =>$this->input->post('tmtcpns', true),
                "noskcp"        =>$this->input->post('noskcp', true),
                "tgl_skcp"      =>$this->input->post('tgl_skcp', true),
                "tmtpns"        =>$this->input->post('tmtpns', true),
                "noskpn"        =>$this->input->post('noskpn', true),
                "tgl_pns"       =>$this->input->post('tgl_pns', true),
                "profesi"       =>$this->input->post('profesi', true),
                "unit_kerja"    =>$this->input->post('unit_kerja', true),
                "tgl_jabatan"   =>$this->input->post('tgl_jabatan', true),
                "status"        =>$this->input->post('status', true),
                "password"      =>password_hash($this->input->post('nip', true),PASSWORD_DEFAULT)

            ];

            $this->pegawai_m->addPNS($data);
            $this->session->set_flashdata('success','Berhasil menambahkan data PNS');
            redirect(base_url('menu/pns'));
        }
    }

    public function edit_pns($id)
    {
        $data['mDataPegawai'] = $data['mPNS'] = true;
        $data['edit'] = true;
        $data['row'] = $this->pegawai_m->getByIdPNS($id);
        $data['content'] = 'form_pns';
        $this->load->view('index',$data);
    }
    
    public function proses_edit_pns(){
        $data = [
            "id_jabatan"    =>$this->input->post('id_jabatan', true),
            "nip"           =>$this->input->post('nip', true),
            "nama"          =>$this->input->post('nama', true),
            "tempat_lahir"  =>$this->input->post('tempat_lahir', true),
            "tgl_lahir"     =>$this->input->post('tgl_lahir', true),
            "agama"         =>$this->input->post('agama', true),
            "karpeg"        =>$this->input->post('karpeg', true),
            "tmtcpns"       =>$this->input->post('tmtcpns', true),
            "noskcp"        =>$this->input->post('noskcp', true),
            "tgl_skcp"      =>$this->input->post('tgl_skcp', true),
            "tmtpns"        =>$this->input->post('tmtpns', true),
            "noskpn"        =>$this->input->post('noskpn', true),
            "tgl_pns"       =>$this->input->post('tgl_pns', true),
            "profesi"       =>$this->input->post('profesi', true),
            "unit_kerja"    =>$this->input->post('unit_kerja', true),
            "tgl_jabatan"   =>$this->input->post('tgl_jabatan', true),
            "status"        =>$this->input->post('status', true)
        ];
        
        $this->pegawai_m->updatePNS($data,$this->input->post('id_pegawai', true));
        $this->session->set_flashdata('success','Berhasil mengubah data PNS');
        redirect(base_url('menu/pns'));
    }
    
    
    public function add_honor()
    {
        $data['mDataPegawai'] = $data['mHonor'] = true;
        $data['content'] = 'form_honor';
        $this->load->view('index',$data);
    }
    
    public function proses_add_honor()
    {
        $data = [
            "nama"          =>$this->input->post('nama', true),
            "tempat_lahir"  =>$this->input->post('tempat_lahir', true),
            "tgl_lahir"     =>$this->input->post('tgl_lahir', true),
            "agama"         =>$this->input->post('agama', true),
            "unit_kerja"    =>$this->input->post('unit_kerja', true),
            "sk"            =>$this->input->post('sk', true),
            "status"        =>$this->input->post('status', true)
            
        ];
        $this->pegawai_m->addHonor($data);
        $this->session->set_flashdata('success','Berhasil menambahkan data Honor');
        redirect(base_url('menu/honor'));
    }
    
    public function edit_honor($id)
    {
        $data['mDataPegawai'] = $data['mHonor'] = true;
        $data['edit'] = true;
        $data['row'] = $this->pegawai_m->getByIdHonor($id);
        $data['content'] = 'form_honor';
        $this->load->view('index',$data);
    }
    
    public function proses_edit_honor()
    {
        $data = [
            "id_honor"      =>$this->input->post('id_honor', true),
            "nama"          =>$this->input->post('nama', true),
            "tempat_lahir"  =>$this->input->post('tempat_lahir', true),
            "tgl_lahir"     =>$this->input->post('tgl_lahir', true),
            "agama"         =>$this->input->post('agama', true),
            "unit_kerja"    =>$this->input->post('unit_kerja', true),
            "sk"            =>$this->input->post('sk', true),
            "status"        =>$this->input->post('status', true)
        ];
        
        $this->pegawai_m->updateHonor($data,$this->input->post('id_honor', true));
        $this->session->set_flashdata('success','Berhasil mengubah data Honor');
        redirect(base_url('menu/honor'));
    }
    
    public function hapus_pns($id){
        $del = $this->pegawai_m->hapusPNS($id);
        if($del){
            $this->session->set_flashdata('success','Anda berhasil menghapus data Pegawai');
        }else{
            $this->session->set_flashdata('error','Maaf, data gagal dihapus, data terikat dengan data lainnya !');
        }
        redirect('menu/pns');
    }
    
    public function hapus_honor($id){
        $del = $this->pegawai_m->hapusHonor($id);
        if($del){
            $this->session->set_flashdata('success','Anda berhasil menghapus data Honor');
        }else{
            $this->session->set_flashdata('error','Maaf, data gagal dihapus, data terikat dengan data lainnya !');
        }
        redirect('menu/honor');
    }
    
    public function berkas($id)
    {
        $data['mDataPegawai'] = $data['mPNS'] = true;
        $data['all_berkas'] = $this->pegawai_m->getBerkas($id);
        $data['row'] = $this->pegawai_m->getByIdPNS($id);
        $data['content'] = 'berkas';
        $this->load->view('index',$data);
    }
    
    public function upload_berkas()
    {
        $id_pegawai = $this->input->post('id_pegawai',true);
        
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png|pdf';
        $config['max_size']             = 2048;
        $config['encrypt_name']         = true;
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('berkas'))
        {
            
            $this->session->set_flashdata('error',$this->upload->display_errors());
        }
        else
        {
            $file = $this->upload->data();
            $data = [
                "id_pegawai"=>$id_pegawai,
                "keterangan"=>$this->input->post('keterangan',true),
                "nama_berkas"=>$file['file_name']
            ];
            $this->pegawai_m->uploadBerkas($data);
            $this->session->set_flashdata('success','File berkas berhasil di upload');
        }
        
        redirect(base_url('pegawai/berkas/').$id_pegawai);
    }

    public function hapus_berkas($id){
        $data = $this->pegawai_m->getByIdBerkas($id);
        if($data['nama_berkas']!=""){
            unlink("./uploads/".$data['nama_berkas']);
        }
        $del = $this->pegawai_m->hapusBerkas($id);
        if($del){
            $this->session->set_flashdata('success','Anda berhasil menghapus data Berkas');
        }else{
            $this->session->set_flashdata('error','Maaf, data gagal dihapus, data terikat dengan data lainnya !');
        }
        redirect('pegawai/berkas/'.$data['id_pegawai']);
    }

    public function cetak_pns()
    {
        $data['list_pns']=$this->pegawai_m->getAllPNS();
        $this->load->view('export_pns',$data);
    }

    public function cetak_honor()
    {
        $data['list_honor']=$this->pegawai_m->getAllHonor();
        $this->load->view('export_honor',$data);
    }
}

/* End of file Pegawai.php */