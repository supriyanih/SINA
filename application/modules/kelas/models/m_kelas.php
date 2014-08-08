<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of m_jabatan
 *
 * @author Syiewa
 */
class M_kelas extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('kelas', 'id_kelas');
    }

    public function get_dropdown() {
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['id_kelas']] = $row['kd_kelas'];
        }
        return $data;
    }

}
?>
