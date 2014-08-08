<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Kelas extends MX_Controller {

    

    public function __construct() {
        parent::__construct();
        $this->load->model('m_kelas');
    }

    public function index() {
        $data['kelas'] = $this->m_kelas->get_all();
        $data['content'] = 'kelas/index';
        $this->load->view('layout/template', $data);
    }

    public function tambah() {
        if ($this->input->post('submit')) {
            $data = $this->m_kelas->array_from_post(array('kd_kelas', 'nm_kelas','thn_masuk'));
            $this->m_kelas->save($data);
            redirect('kelas');
        }
        $data['content'] = 'kelas/add';
        $this->load->view('layout/template', $data);
    }

    public function edit($id) {
        if ($this->input->post('submit')) {
            $data = $this->m_kelas->array_from_post(array('id_kelas', 'kd_kelas', 'nm_kelas','thn_masuk'));
            $this->m_kelas->save($data, $data['id_kelas']);
            redirect('kelas');
        }
        $data['kelas'] = $this->m_kelas->get($id);
        $data['content'] = 'kelas/edit';
        $this->load->view('layout/template', $data);
    }

    public function delete($id = NULL) {
        $this->m_kelas->delete($id);
        redirect('kelas');
    }

}

