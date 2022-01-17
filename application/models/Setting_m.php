<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_m extends CI_Model {

    private $table = 'setting';

    private $id = 'idsetting';

    public function getAll(){ 
        return $this->db->order_by($this->id,'ASC')
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

    // public function hapus($id){
    //     return $this->db->delete($this->table,[$this->id=>$id]);
    // }

}

/* End of file Setting_m.php */