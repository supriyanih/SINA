<?php


class M_semester extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('semester', 'id_smstr');
    }

    public function get_dropdown() {
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['id_smstr']] = $row['kd_smstr'];
        }
        return $data;
    }

}
?>
