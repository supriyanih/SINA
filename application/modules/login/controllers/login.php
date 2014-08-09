<?php

Class Login extends MX_Controller {

    

    public function __construct() {
        parent::__construct();
        $this->load->model('m_login');
         
    }

    
    public function index() {
         
        if ($this->session->userdata('level_user') == 2) {
            redirect('dosen/detail'.'/'. $this->session->userdata('userid'));
        } elseif ($this->session->userdata('level_user') == 1) {
            redirect('admin/detail'.'/'. $this->session->userdata('userid'));
        }elseif($this->session->userdata('level_user')==3){
            redirect('super/detail'.'/'. $this->session->userdata('userid'));
    }
        if ($this->input->post('submit')) {
            $userid = $this->input->post('userid');
            $passid = $this->input->post('passid');
            
           

            $user = $this->m_login->checkLogin($userid, $passid);
            if (!empty($user)) {
                $sessionData['id'] = $user->id;
                $sessionData['userid'] = $user->userid;
                $sessionData['level_user'] = $user->level_user;
                $sessionData['is_login'] = TRUE;
                

                $this->session->set_userdata($sessionData);
               
                if ($this->session->userdata('level_user') == 2) {
                    redirect('dosen/detail'.'/'. $this->session->userdata('userid'));
                } elseif($this->session->userdata('level_user') == 1) {
                    redirect('admin/detail'.'/'. $this->session->userdata('userid'));
                }elseif($this->session->userdata('level_user') == 3){
                    redirect('staff/detail' .'/'. $this->session->userdata('userid'));
                }
                elseif($this->session->userdata('level_user') == 4){
                    redirect('mahasiswa/mobile' .'/'. $this->session->userdata('userid'));
                }else{
                    redirect('login');
                }
            }
        }
        $data['content'] = 'login';
        $this->load->view('layout/template_1', $data);
        //$this->load->view('mobile_login');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('login/index');
    }

}

?>