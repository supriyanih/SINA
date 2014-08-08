<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_pegawai
 *
 * @author Syiewa
 */
class M_mhs extends MY_Model {

    var $sex = array(
        'P' => 'Pria',
        'W' => 'Wanita'
    );
    var $gallerypath;
    var $gallery_path_url;
    public $rules = array(
        'nim' => array(
            'field' => 'nim',
            'label' => 'Nim',
            'rules' => 'trim|required|max_length[100]|xss_clean'
        ),
        'nama' => array(
            'field' => 'nama',
            'label' => 'Nama',
            'rules' => 'required|max_length[100]|xss_clean'
        ),
        'tmpt_lahir' => array(
            'field' => 'tmpt_lahir',
            'label' => 'Tempat Lahir',
            'rules' => 'trim|required|xss_clean'
        ),
        'tgl_lahir' => array(
            'field' => 'tgl_lahir',
            'label' => 'Tanggal Lahir',
            'rules' => 'trim|required|xss_clean'
        ),
        'jenkel' => array(
            'field' => 'jenkel',
            'label' => 'Jenis Kelamin',
            'rules' => 'trim|required'
        ),
        'id_prodi' => array(
            'field' => 'id_prodi',
            'label' => 'Program Studi',
            'rules' => 'trim|required'
        ),
        'id_kelas' => array(
            'field' => 'id_kelas',
            'label' => 'Program Studi',
            'rules' => 'trim|required'
        ),
        'alamat' => array(
            'field' => 'alamat',
            'label' => 'Alamat',
            'rules' => 'trim|required|xss_clean'
        ),
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|xss_clean'
        ),
        'telpon' => array(
            'field' => 'telpon',
            'label' => 'Telpon',
            'rules' => 'trim|required|xss_clean'
        ),
    );

//put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('mhs', 'nim');
        $this->gallerypath = realpath(APPPATH . '/assets/img');
        $this->gallery_path_url = base_url() . 'assets/img';
    }

    // DROPDOWN NIP 
    public function get_dropdown() {
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['nim']] = $row['nim'] . ' - ' . $row['nama'];
        }
        return $data;
    }
     
    //mahasiswa
 public function get_by_kelas($id=NULL){
     $this->db->where('id_kelas',$id);
     return parent::get_many_by(array('id_kelas' => $id));
 
 }
 public function get_mhs(){
     $this->db->where('id_kelas',$id);
     return parent::get_many_by(array('id_kelas' => $id));
 $data = array(
     'nim'=>'nim',
     'nama'=>'nama'
 );
 }

 

    // GANTI PASSWORD
    public function get_pass($id = NULL) {
        parent::set_tabel('login', 'userid');
        return parent::get_by(array('userid' => $id));
    }

    public function cek_paswd($id = NULL, $pass = NULL) {
        parent::set_tabel('login', 'userid');
        $this->db->where('passid', $pass);
        if (parent::get_by(array('userid' => $id))) {
            return TRUE;
        }
        return FALSE;
    }

    public function cek_nim($nim = NULL) {
        if (parent::get_by(array('nim' => $nim))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function getprodi($id){
        $this->db->select('*');
        $this->db->where('nim',$id);
        $this->db->from('mhs');
        $this->db->join('prodi', 'prodi.id_prodi = mhs.id_prodi');
        $query = $this->db->get();
        return $query->result();
    }  

}

?>
