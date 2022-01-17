<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_m extends CI_Model {

    private $table = 'customer';

    private $id = 'idcustomer';

    public function getAll(){ 
        return $this->db->select('x.idcustomer,x.tujuan_id,x.nama as nama_customer,x1.nama as tujuan')
                        ->join('tujuan x1','x.tujuan_id=x1.idtujuan')
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

/* End of file Customer_m.php */