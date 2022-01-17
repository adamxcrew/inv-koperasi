<?php 
function delMask( $str ) {
    return (int)implode('',explode('.',$str));
}

function uang( $str ) {
    return number_format($str,0,'','.');
}

function _session($param){
    
    $ci =& get_instance();
    return $ci->session->userdata($param);
}

function _app($param){
    
    $ci =& get_instance();
    $data = $ci->db->get_where('setting',['idsetting'=>1])->row_array();
    return $data[$param];
}

function inv($param,$id){
    
    $ci =& get_instance();
    // $data = $ci->db->get_where('invoice',['idinvoice'=>$id])->row_array();
    $data = $ci->db->select('x.*,x1.nama as nama_customer,x2.nama as tujuan')
                    ->join('customer x1','x.customer_id=x1.idcustomer')
                    ->join('tujuan x2','x1.tujuan_id=x2.idtujuan')
                    ->where('idinvoice',$id)
                    ->get('invoice x')->row_array();
    return $data[$param];
}

function t_inv($param,$id){
    
    $ci =& get_instance();
    $data = $ci->db->select('SUM(sub_total) as total,SUM(volume) as t_volume')
                    ->where('invoice_id',$id)
                    ->get('invoice_detail')->row_array();
    return $data[$param];
}

function t_satuan($id){
    
    $ci =& get_instance();
    $data = $ci->db->select('SUM(volume) as t_volume,x2.nama as satuan')
                    ->join('barang x1','x.barang_id=x1.idbarang')
                    ->join('satuan x2','x1.satuan_id=x2.idsatuan')
                    ->where('invoice_id',$id)
                    ->group_by('x2.nama')
                    ->get('invoice_detail x')->result_array();
    return $data;
}

function list_satuan(){
    
    $ci =& get_instance();
    $data = $ci->db->order_by('nama','ASC')
                ->get('satuan')->result_array();
    $opt = "";
    foreach ($data as $row) {
        $opt .= "<option value=\"".$row['idsatuan']."\">".$row['nama']."</option>";
    }
    return $opt;
}

function list_tujuan(){
    
    $ci =& get_instance();
    $data = $ci->db->order_by('nama','ASC')
                ->get('tujuan')->result_array();
    $opt = "";
    foreach ($data as $row) {
        $opt .= "<option value=\"".$row['idtujuan']."\">".$row['nama']."</option>";
    }
    return $opt;
}

function detail_inv($inv_id){
    
    $ci =& get_instance();
    $data = $ci->db->select('x.*,x2.nama as nama_barang,x3.nama as satuan')
                    ->join('invoice x1','x.invoice_id=x1.idinvoice')
                    ->join('barang x2','x.barang_id=x2.idbarang')
                    ->join('satuan x3','x2.satuan_id=x3.idsatuan')
                    ->where('invoice_id',$inv_id)
                    ->get('invoice_detail x')->result_array();
    return $data;
}

function list_barang(){
    
    $ci =& get_instance();
    $data = $ci->db->select('x.idbarang,x.satuan_id,x.nama as nama_barang,x1.nama as satuan')
                    ->join('satuan x1','x.satuan_id=x1.idsatuan')
                    ->get('barang x')->result_array();
    $opt = "";
    foreach ($data as $row) {
        $opt .= "<option value=\"".$row['idbarang']."\">".$row['nama_barang']."-".$row['satuan']."</option>";
    }
    return $opt;
}

function list_customer($selected=''){
    
    $ci =& get_instance();
    $data = $ci->db->select('x.idcustomer,x.tujuan_id,x.nama as nama_customer,x1.nama as tujuan')
                    ->join('tujuan x1','x.tujuan_id=x1.idtujuan')
                    ->get('customer x')->result_array();
    $opt = "";
    foreach ($data as $row) {
        $isSelected = "";
        if($selected==$row['idcustomer']){
            $isSelected = "selected";
        }
        $opt .= "<option value=\"".$row['idcustomer']."\"".$isSelected.">".$row['nama_customer']."-".$row['tujuan']."</option>";
    }
    return $opt;
}

function romawi_bln($bln){
    $bulan = [
        '01' =>   'I',
        '02' =>   'II',
        '03' =>   'III',
        '04' =>   'IV',
        '05' =>   'V',
        '06' =>   'VI',
        '07' =>   'VII',
        '08' =>   'VIII',
        '09' =>   'IX',
        '10' =>   'X',
        '11' =>   'XI',
        '12' =>   'XII'
    ];

    return $bulan[$bln];
}

function count_table($table){
    
    $ci =& get_instance();
    return $ci->db->get($table)->num_rows();
    
}

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
    }     
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }     		
    return $hasil.' Rupiah';
}