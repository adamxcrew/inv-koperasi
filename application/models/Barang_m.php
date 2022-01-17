<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_m extends CI_Model {

    private $table = 'barang';

    private $id = 'idbarang';

    public function getAll(){ 
        return $this->db->select('x.idbarang,x.satuan_id,x.nama as nama_barang,x1.nama as satuan')
                        ->join('satuan x1','x.satuan_id=x1.idsatuan')
                        ->get($this->table.' x')->result_array();
    }

    // public function getById($id){
    //     return $this->db->get_where($this->table,[$this->id=>$id])->row_array();
    // }

    public function tambahBaru($data){
        $this->db->insert($this->table,$data);
    }

    public function editData($data,$id){
        $this->db->update($this->table,$data,[$this->id=>$id]);
    }

    public function hapus($id){
        return $this->db->delete($this->table,[$this->id=>$id]);
    }

}

/* End of file Barang_m.php */