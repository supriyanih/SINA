<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Datakelas extends MX_Controller {

    

    public function __construct() {
        parent::__construct();
        $this->load->model('m_prodi');
    }

    public function index() {
        $data['datakelas'] = $this->m_datakelas->get_all();
        $data['content'] = 'datakelas/index';
        $this->load->view('layout/template', $data);
    }

    public function tambah() {
        if ($this->input->post('submit')) {
            $data = $this->m_datakelas->array_from_post(array('kd_kelas', 'nim'));
            $this->m_datakelas->save($data);
            redirect('datakelas');
        }
        $data['content'] = 'datakelas/add';
        $this->load->view('layout/template', $data);
    }

    public function edit($id) {
        if ($this->input->post('submit')) {
            $data = $this->m_datakelas->array_from_post(array('id_kelas', 'kd_kelas', 'nim'));
            $this->m_datakelas->save($data, $data['id_kelas']);
            redirect('kelas');
        }
        $data['datakelas'] = $this->m_datakelas->get($id);
        $data['content'] = 'datakelas/edit';
        $this->load->view('layout/template', $data);
    }

    public function delete($id = NULL) {
        $this->m_datakelas->delete($id);
        redirect('datakelas');
    }

}

