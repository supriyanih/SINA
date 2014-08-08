<?php


class M_prodi extends MY_Model {

//put your code here
    public function __construct() {
        parent::__construct();
        parent::set_tabel('prodi', 'id_prodi');
    }

    public function get_dropdown() {
        $data = array();
        foreach (parent::get_array() as $row) {
            $data[$row['id_prodi']] = $row['nm_prodi'];
        }
        return $data;
    }

}
?>
