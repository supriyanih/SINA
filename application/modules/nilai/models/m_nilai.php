<?php


class M_nilai extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('nilai', 'id');
    }

    public function get_dropdown() {
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['id_nilai']] = $row['kd_jadwal'];
        }
        return $data;
    }

    public function get_nilai($id){
        $this->db->select('*');
    $this->db->where('id_kelas','$id');
    $query = $this->db->get('mhs');
    $data = $query->num_rows();  
    
    }
    
     public function getAll(){
      $this->db->select('*');
    $this->db->from('jadwal');
     $this->db->join('nilai', 'jadwal.kd_jadwal = nilai.id_jadwal');
       $query = $this->db->get();
        return $query->result();
    }  
    
    public function jdl_mhs($id){
        $this->db->where('id_jadwal',$id);
     return parent::get_many_by(array('id_jadwal' => $id));
 
    }
    
    public function nilai_mhs($id){
        $this->db->select('*');
        $this->db->where('nim',$id);
        $this->db->from('nilai');
        $this->db->join('jadwal','nilai.id_jadwal = jadwal.kd_jadwal');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getkhs($npm=NULL,$smt=NULL){
         $this->db->where('nim',$npm);
          $this->db->where('',$smt);
     return parent::get_many_by(array('nim' => $npm));
    }

}
?>
