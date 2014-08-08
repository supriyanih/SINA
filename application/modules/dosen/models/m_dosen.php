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
class M_dosen extends MY_Model {

    var $sex = array(
        'P' => 'Pria',
        'W' => 'Wanita'
    );
    var $gallerypath;
    var $gallery_path_url;
    public $rules = array(
        'nip' => array(
            'field' => 'nip',
            'label' => 'nip',
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
        parent::set_tabel('staff', 'nip');
        $this->gallerypath = realpath(APPPATH . '/assets/img');
        $this->gallery_path_url = base_url() . 'assets/img';
    }
     public function dosen($id=2) {
        $this->db->where('id_jab', $id);
         return parent::get_many_by(array('id_jab' => $id));
    }
    
    public function jadwal($id = NULL) {
        parent::set_tabel('jadwal', 'kd_jadwal');
        return parent::get_many_by(array('nip_dosen' => $id));
    }

    // DROPDOWN NIP 
    public function get_dropdown() {
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['nip']] = $row['nip'] . ' - ' . $row['nama'];
        }
        return $data;
    }

    public function get_dosen($id=2) {
        $this->db->where('id_jab', $id);
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['nip']] = $row['nip'] . ' - ' . $row['nama'];
        }
        return $data;
    }

        // PENDIDIKAN
    public function get_pdk($id = NULL) {
        parent::set_tabel('pendidikan', 'idp');
        return parent::get_many_by(array('pdk_nip' => $id));
    }

    public function get_pdk_pgw($id = NULL) {
        parent::set_tabel('pendidikan', 'idp');
        return parent::get_by(array('idp' => $id));
    }

    public function save_pdk($data, $id) {
        parent::set_tabel('pendidikan', 'idp');
        return parent::save($data, $id);
    }

    public function del_pdk($id) {
        parent::set_tabel('pendidikan', 'idp');
        return parent::delete($id);
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

    public function cek_nip($nip = NULL) {
        if (parent::get_by(array('nip' => $nip))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>
