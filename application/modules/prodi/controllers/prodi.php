<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Prodi extends MX_Controller {

    

    public function __construct() {
        parent::__construct();
        $this->load->model('m_prodi');
    }

    public function index() {
        if(isLogin()==false){
            redirect('login');
        }
        $data['prodi'] = $this->m_prodi->get_all();
        $data['content'] = 'prodi/index';
        $this->load->view('layout/template', $data);
    }

    public function tambah() {
        if ($this->input->post('submit')) {
            $data = $this->m_prodi->array_from_post(array('kd_prodi', 'nm_prodi'));
            $this->m_prodi->save($data);
            redirect('prodi');
        }
        $data['content'] = 'prodi/add';
        $this->load->view('layout/template', $data);
    }

    public function edit($id) {
        if ($this->input->post('submit')) {
            $data = $this->m_prodi->array_from_post(array('id_prodi', 'kd_prodi', 'nm_prodi'));
            $this->m_prodi->save($data, $data['id_prodi']);
            redirect('prodi');
        }
        $data['prodi'] = $this->m_prodi->get($id);
        $data['content'] = 'prodi/edit';
        $this->load->view('layout/template', $data);
    }

    public function delete($id = NULL) {
        $this->m_prodi->delete($id);
        redirect('prodi');
    }

}

