<?php


class M_info extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('info', 'id');
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
