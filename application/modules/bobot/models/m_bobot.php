<?php

class M_bobot extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('bobot', 'nilai');
    }

    public function get_dropdown() {
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['nilai']] = $row['bobot'];
        }
        return $data;
    }

}
?>
