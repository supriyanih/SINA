<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Info extends MX_Controller {

    

    public function __construct() {
        parent::__construct();
        $this->load->model('m_info');
    }

    public function index() {
        if(isLogin()==false){
            redirect('login');
        }
        $data['info'] = $this->m_info->get_all();
        $data['content'] = 'info/index';
        $this->load->view('layout/template', $data);
    }

    public function tambah() {
        if ($this->input->post('submit')) {
            $data = $this->m_info->array_from_post(array('judul', 'info'));
            $this->m_info->save($data);
            redirect('info');
        }
        $data['content'] = 'info/add';
        $this->load->view('layout/template', $data);
    }

    public function edit($id) {
        if ($this->input->post('submit')) {
            $data = $this->m_info->array_from_post(array('id', 'judul', 'info'));
            $this->m_info->save($data, $data['id']);
            redirect('info');
        }
        $data['info'] = $this->m_info->get($id);
        $data['content'] = 'info/edit';
        $this->load->view('layout/template', $data);
    }

    public function delete($id = NULL) {
        $this->m_info->delete($id);
        redirect('info');
    }

}

