<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan_m extends CI_Model {
    
    private $table = 'satuan';

    private $id = 'idsatuan';

    public function getAll(){ 
        return $this->db->order_by($this->id,'DESC')
                        ->get($this->table)->result_array();
    }

    public function getById($id){
        return $this->db->get_where($this->table,[$this->id=>$id])->row_array();
    }

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

/* End of file Satuan_m.php */