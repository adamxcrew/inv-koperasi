<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_m extends CI_Model {

    private $table_pns = 'pegawai';

    private $id_pns = 'id_pegawai';

    private $table_honor = 'honor';

    private $id_honor = 'id_honor';

    public function getAllPNS(){ 
        return $this->db->order_by($this->id_pns,'DESC')
                        ->get($this->table_pns)->result_array();
    }

    public function getAllHonor(){ 
        return $this->db->order_by($this->id_honor,'DESC')
                        ->get($this->table_honor)->result_array();
    }

    public function getByIdPNS($id){
        return $this->db->get_where($this->table_pns,[$this->id_pns=>$id])->row_array();
    }

    public function getByIdHonor($id){
        return $this->db->get_where($this->table_honor,[$this->id_honor=>$id])->row_array();
    }

    public function addPNS($data)
    {
        $this->db->insert($this->table_pns, $data);
    }

    public function updatePNS($data,$id){
        $this->db->update($this->table_pns,$data,[$this->id_pns=>$id]);
    }

    public function hapusPNS($id){
        return $this->db->delete($this->table_pns,[$this->id_pns=>$id]);
    }
    
    public function addHonor($data)
    {
        $this->db->insert($this->table_honor, $data);
    }
    
    public function updateHonor($data,$id){
        $this->db->update($this->table_honor,$data,[$this->id_honor=>$id]);
    }

    public function hapusHonor($id){
        return $this->db->delete($this->table_honor,[$this->id_honor=>$id]);
    }
    
    public function uploadBerkas($data)
    {
        $this->db->insert('berkas', $data);
    }
    
    public function getBerkas($id)
    {
        return $this->db->get_where('berkas', ['id_pegawai'=>$id])->result_array();
    }
    
    public function getByIdBerkas($id)
    {
        return $this->db->get_where('berkas', ['id_berkas'=>$id])->row_array();
    }

    public function hapusBerkas($id){
        return $this->db->delete('berkas',['id_berkas'=>$id]);
    }

    public function getKenaikanPangkat($year=null,$jenis_jabatan=null)
    {
        if($jenis_jabatan=='fungsional'){
            $tahun = 2;
        }else if($jenis_jabatan=='struktural'){
            $tahun = 4;
        }else{
            $tahun = 0;
        }
        return $this->db->select('id_pegawai,nip,nama,tmtpns,year(tmtpns) as tahun_tmt,year(tmtpns)+'.$tahun.' as tahun_naik, jenis_jabatan')
                        ->where('year(tmtpns)+'.$tahun,$year)
                        ->where('jenis_jabatan',$jenis_jabatan)
                        ->get($this->table_pns)->result_array();
    }

    public function getKenaikanGajiBerkala($year=null)
    {
        $tahun=2; 
        return $this->db->select('id_pegawai,nip,nama,tmtpns,year(tmtpns) as tahun_tmt,year(tmtpns)+'.$tahun.' as tahun_naik')
                        ->where('year(tmtpns)+'.$tahun,$year)
                        ->get('pegawai')->result_array();
    }

}

/* End of file Pegawai_m.php */