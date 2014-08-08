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
class M_jabatan extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('jabatan', 'id_jab');
    }

    public function get_dropdown() {
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['id_jab']] = $row['n_jab'];
        }
        return $data;
    }

}
?>
