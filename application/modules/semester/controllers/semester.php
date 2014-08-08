<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Semester extends MX_Controller {

    

    public function __construct() {
        parent::__construct();
        $this->load->model('m_semester');
    }

    public function index() {
        $data['semester'] = $this->m_semester->get_all();
        $data['content'] = 'semester/index';
        $this->load->view('layout/template', $data);
    }

    public function tambah() {
        if ($this->input->post('submit')) {
            $data = $this->m_semester->array_from_post(array('kd_smstr', 'nm_smstr'));
            $this->m_semester->save($data);
            redirect('semester');
        }
        $data['content'] = 'semester/add';
        $this->load->view('layout/template', $data);
    }

    public function edit($id) {
        if ($this->input->post('submit')) {
            $data = $this->m_semester->array_from_post(array('id_smstr', 'kd_smstr', 'nm_smstr'));
            $this->m_semester->save($data, $data['id_smstr']);
            redirect('semester');
        }
        $data['semester'] = $this->m_semester->get($id);
        $data['content'] = 'semester/edit';
        $this->load->view('layout/template', $data);
    }

    public function delete($id = NULL) {
        $this->m_semester->delete($id);
        redirect('semester');
    }

}

