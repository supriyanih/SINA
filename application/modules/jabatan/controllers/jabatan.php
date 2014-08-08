<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Jabatan extends MX_Controller {

    

    public function __construct() {
        parent::__construct();
        $this->load->model('m_jabatan');
    }

    public function index() {
        $data['jabatan'] = $this->m_jabatan->get_all();
        $data['content'] = 'jabatan/index';
        $this->load->view('layout/template', $data);
    }

    public function tambah() {
        if ($this->input->post('submit')) {
            $data = $this->m_jabatan->array_from_post(array('kd_jab', 'n_jab'));
            $this->m_jabatan->save($data);
            redirect('jabatan');
        }
        $data['content'] = 'jabatan/add';
        $this->load->view('layout/template', $data);
    }

    public function edit($id) {
        if ($this->input->post('submit')) {
            $data = $this->m_jabatan->array_from_post(array('id_jab', 'kd_jab', 'n_jab'));
            $this->m_jabatan->save($data, $data['id_jab']);
            redirect('jabatan');
        }
        $data['jabatan'] = $this->m_jabatan->get($id);
        $data['content'] = 'jabatan/edit';
        $this->load->view('layout/template', $data);
    }

    public function delete($id = NULL) {
        $this->m_jabatan->delete($id);
        redirect('jabatan');
    }

}

