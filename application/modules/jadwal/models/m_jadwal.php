<?php


class M_jadwal extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('jadwal', 'kd_jadwal');
    }

    public function get_dropdown() {
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['kd_jadwal']] = $row['kd_jadwal'];
        }
        return $data;
    }
 public function get_input($id){
     $this->db->select('*');
    $this->db->from('jadwal');
    $this->db->join('mhs', 'mhs.id_kelas = jadwal.id_kelas');

    $query = $this->db->where($id);
 }
 public function get_mhs($id = NULL) {
        parent::set_tabel('mhs', 'nim');
        return parent::get_many_by(array('id_kelas' => $id));
    }
    
    
     public function get_jadwal($id) {
        $this->db->where('id_kelas', $id);
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['kd_jadwal']] = $row['kd_jadwal'];
        }
        return $data;
    }
    public function  get_id($id){
        parent::set_tabel('jadwal', 'kd_jadwal');
        return parent::get_many_by(array('kd_jadwal' => $id));
    }
    
    
    public function lihat_jadwal($kd){
       parent::set_tabel('jadwal', 'kd_jadwal');
        return parent::get_many_by(array('kd_jadwal' => $kd));
    }
    public function get_mhs_nim($id){
        $this->db->where('id_kelas',$id);
        $this->db->where('status','0');
        return parent::get_many_by(array('id_kelas' => $id));
    }
    
    public function hari_dropdown() {
        parent::set_tabel('hari', 'nm_hari');
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['nm_hari']] = $row['nm_hari'];
        }
        return $data;
    }
    
    public function jadwal_aktif($id){
        $this->db->where('status','0');
        return parent::get_many_by(array('kd_jadwal'=>$id));
        
    }
    
    public function update_selesai($id){
        $data = array(
               'status' =>'1'
               
            );
        $this->db->where('kd_jadwal', $id);
        $this->db->update('jadwal', $data);

    }
    
    public function update_aktif($id){
        $data = array(
               'status' =>'0'
               
            );
        $this->db->where('kd_jadwal', $id);
        $this->db->update('jadwal', $data);

    }
}
?>
