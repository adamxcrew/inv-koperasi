<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('username')){
            redirect('login');
        }
        $this->load->model('setting_m');
    }
    
    public function index()
    {
        
    }
    
    public function save()
    {
        $id = $this->input->post('idsetting',true);
        
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'jpeg|jpg|png|pdf';
        $config['max_size']             = 2048;
        $config['encrypt_name']         = true;
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('logo'))
        {
            // $this->session->set_flashdata('error',$this->upload->display_errors());
            $data = [
                'name'=>htmlspecialchars($this->input->post('name',true)),
                'email'=>htmlspecialchars($this->input->post('email',true)),
                'no_hp'=>htmlspecialchars($this->input->post('no_hp',true)),
                'admin'=>htmlspecialchars(strtoupper($this->input->post('admin',true))),
                'address'=>htmlspecialchars($this->input->post('address',true))
            ];
            $this->setting_m->editData($data,$id);
            $this->session->set_flashdata('success','Anda berhasil mengubah Data Profil');
        }
        else
        {
            $file = $this->upload->data();
            $data = [
                'name'=>htmlspecialchars($this->input->post('name',true)),
                'email'=>htmlspecialchars($this->input->post('email',true)),
                'no_hp'=>htmlspecialchars($this->input->post('no_hp',true)),
                'admin'=>htmlspecialchars(strtoupper($this->input->post('admin',true))),
                'address'=>htmlspecialchars($this->input->post('address',true)),
                "logo"=>$file['file_name']
            ];
            $logo_lama = _app('logo');
            if(!empty($logo_lama)){
                unlink('uploads/'.$logo_lama);
            }
            $this->setting_m->editData($data,$id);
            $this->session->set_flashdata('success','Anda berhasil mengubah Data Profil dan Logo');
        }
        redirect('menu/profil');
    }


    // public function view(){
    //     $id = $this->input->post('id',true);
    //     $data = $this->setting_m->getById($id);
    //     echo json_encode($data);
    // }

    // public function hapus($id){
    //     $del = $this->setting_m->hapus($id);
    //     if($del){
    //         $this->session->set_flashdata('success','Anda berhasil menghapus data Setting');
    //     }else{
    //         $this->session->set_flashdata('error','Maaf, data gagal dihapus, data terikat dengan data lainnya !');
    //     }
    //     redirect('menu/setting');
    // }
}

/* End of file Setting.php */