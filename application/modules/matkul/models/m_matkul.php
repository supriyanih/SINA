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
class M_matkul extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('matkul', 'id_matkul');
    }

    public function get_dropdown() {
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['id_matkul']] = $row['nm_matkul'];
        }
        return $data;
    }

}
?>
