<?php


function isLogin() {
    $CI = & get_instance();
    if ($CI->session->userdata('is_login') == TRUE) {
        return TRUE;
    } else {
        return FALSE;
    }
}

function UserLogin() {
    $CI = & get_instance();
    if (isLogin() != TRUE) {
        echo "<script> alert('anda tidak mempunyai hak akses!!')</script>";
        redirect('login/login');
    }
}

function cekAdminLogin() {
    $CI = & get_instance();
    if (isLogin() == TRUE) {
        if ($CI->session->userdata('level_user') != 2) {
            $CI->session->set_flashdata('message', 'Maaf Halaman Ini Hanya Untuk Administrasi');
            redirect('login/login');
        }
    }elseif (isLogin() == TRUE) {
        if ($CI->session->userdata('level_user') != 3) {
            $CI->session->set_flashdata('message', 'Terima Kasih. Ada Staff yang Menangani Halaman ini');
            redirect('login/login');
        }
    }else {
        $CI->session->set_flashdata('message', 'Anda tidak memiliki hak akses halaman Administrator');
        redirect('login/login');
    }
}
function superAdminLogin() {
    $CI = & get_instance();
    if (isLogin() == TRUE) {
        if ($CI->session->userdata('level_user') != 1) {
            $CI->session->set_flashdata('message', 'Hak bisa Di akses Staff Yang Bertanggung Jawab Di Sistem Informasi Akademik');
            redirect('login/login');
        }
    }elseif (isLogin() == TRUE) {
        if ($CI->session->userdata('level_user') != 2) {
            $CI->session->set_flashdata('message', 'Hak bisa Di akses Staff Yang Bertanggung Jawab Di Sistem Informasi Akademik');
            redirect('login/login');
        }
    }else {
        $CI->session->set_flashdata('message', 'Anda tidak memiliki hak akses halaman Administrator');
        redirect('login/login');
    }
}

function add_meta_title($string) {
    $CI = & get_instance();
    $CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title'];
}

function btn_edit($uri) {
    return anchor($uri, '<button class="btn btn-default btn-xs btn-primary" type="button"><span class="glyphicon glyphicon-edit"></span> Edit</button>');
}

function btn_delete($uri) {
    return anchor($uri, '<button class="btn btn-default btn-xs btn-danger" type="button"><span class="glyphicon glyphicon-trash"></span> Hapus</button>', array(
        'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');"
    ));
}

function tgl_indo($tgl) {
    return date('Y-m-d', strtotime($tgl));
}

function attr($attributes = array()) {
    $data = array('class', 'id', 'name', 'data-validation', 'data-validation-length', 'data-validation-error-msg');
    $newarray = array_combine($data, $attributes);
    return $newarray;
}

?>
