<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Matkul extends MX_Controller {

    

    public function __construct() {
        parent::__construct();
        $this->load->model('m_matkul');
    }

    public function index() {
        if(isLogin()==false){
            redirect('login');
        }
        $data['matkul'] = $this->m_matkul->get_all();
        $data['content'] = 'matkul/index';
        $this->load->view('layout/template', $data);
    }

    public function tambah() {
        if ($this->input->post('submit')) {
            $data = $this->m_matkul->array_from_post(array('kd_matkul', 'nm_matkul','sks'));
            $this->m_matkul->save($data);
            redirect('matkul');
        }
        $data['content'] = 'matkul/add';
        $this->load->view('layout/template', $data);
    }

    public function edit($id) {
        if ($this->input->post('submit')) {
            $data = $this->m_matkul->array_from_post(array('id_matkul', 'kd_matkul', 'nm_matkul','sks'));
            $this->m_matkul->save($data, $data['id_matkul']);
            redirect('matkul');
        }
        $data['matkul'] = $this->m_matkul->get($id);
        $data['content'] = 'matkul/edit';
        $this->load->view('layout/template', $data);
    }

    public function delete($id = NULL) {
        $this->m_matkul->delete($id);
        redirect('matkul');
    }

}

