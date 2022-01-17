<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice_m extends CI_Model {

    private $table = 'invoice';

    private $id = 'idinvoice';

    public function getAll(){ 
        return $this->db->select('x.*,x1.nama as nama_customer')
                        ->join('customer x1','x.customer_id=x1.idcustomer')
                        ->get($this->table.' x')->result_array();
    }

    // public function getById($id){
    //     return $this->db->get_where($this->table,[$this->id=>$id])->row_array();
    // }

    public function tambahBaru($data){
        $this->db->insert($this->table,$data);
        $insert_id = $this->db->insert_id();
        return $insert_id;
    }

    public function tambahBarang($data){
        $this->db->insert('invoice_detail',$data);
    }

    public function editData($data,$id){
        $this->db->update($this->table,$data,[$this->id=>$id]);
    }

    public function hapus($id){
        return $this->db->delete($this->table,[$this->id=>$id]);
    }

    public function hapusInv($id){
        return $this->db->delete('invoice_detail',['idinvoice_detail'=>$id]);
    }

}

/* End of file Invoice_m.php */