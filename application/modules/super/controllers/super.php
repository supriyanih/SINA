<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Super extends MX_Controller {

   
    var $jekel = array(
        'P' => 'Wanita',
        'L' => 'Pria'
    );

    public function __construct() {
        parent::__construct();
        $this->load->model('m_super');
        $this->load->model('jabatan/m_jabatan');
    }

    public function index() {
        if(isLogin()==false ) {
            redirect('login');
        }elseif ( $this->session->userdata('level_user') == 2) {
            redirect('login');
        }elseif ( $this->session->userdata('level_user') == 1) {
            redirect('login');
        }
        $data['staff'] = $this->m_super->super();
        foreach ($data['staff'] as $k => $v) {
            
            $jab = $this->load->model('jabatan/m_jabatan')->get($v->id_jab);
            
            if (empty($jab)) {
                $data['staff'][$k]->n_jab = 'belum ada jabatan';
            } else {
                $data['staff'][$k]->n_jab = $jab->n_jab;
            }
        }
        $data['content'] = 'super/index';
        $this->load->view('layout/template', $data);
    }
    public function register() {
       if(isLogin()==false){
            redirect('login');
        }
     
        $this->load->model('jabatan/m_jabatan');
        if ($this->input->post('submit')) {
            $data = $this->m_super->array_from_post(array
                ('nip', 'nama', 'tmpt_lahir', 'tgl_lahir', 'jenkel', 'alamat', 'email', 'telpon', 'id_jab'));
            $data_user = array(
                'userid' => $data['nip'],
                'passid' => $this->input->post('passid'),
                'level_user' => '3'
            );
            if (!$this->m_super->cek_nip($data['nip'])) {
                if (!empty($userfile)) {
                    $konfigurasi = array(
                        'allowed_types' => 'jpg|jpeg|gif|png|bmp',
                        'upload_path' => $this->m_super->gallerypath
                    );
                    $this->load->library('upload', $konfigurasi);
                    $this->upload->do_upload("foto");
                    $datafile = $this->upload->data();
                    $konfigurasi = array(
                        'source_image' => $datafile['full_path'],
                        'new_image' => $this->m_super->gallerypath . '/thumbnails',
                        'maintain_ration' => true,
                        'width' => 160,
                        'height' => 120
                    );

                    $this->load->library('image_lib', $konfigurasi);
                    $this->image_lib->resize();
                    $data['foto'] = $userfile;
                                    $this->load->model('login/m_login')->insert($data_user);
                    $this->m_super->insert($data);
					redirect('login');
                } else {
				$this->load->model('login/m_login')->insert($data_user);
                    $this->m_super->insert($data);
                    redirect('super');
                }
            } else {
                echo '<script> alert("NIP Sudah Ada silakan cek Ulang") </script>';
            }
        }
        
        $data['jabatan'] =  $this->load->model('jabatan/m_jabatan')->get_dropdown();
        $data['content'] = 'register';
        $this->load->view('layout/template', $data);
    }
    public function edit($id = null) {
        if(isLogin()==false){
            redirect('login');
        }
        if ($this->input->post('submit')) {
            $rules = $this->m_super->rules;
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == TRUE) {
                $data = $this->m_super->array_from_post(array
                    ('nip', 'nama', 'tmpt_lahir', 'tgl_lahir', 'jenkel', 'alamat', 'email','telpon', 'id_jab'));
                $userfile = $_FILES['foto']['name'];
                if (!empty($userfile)) {
                    $konfigurasi = array(
                        'allowed_types' => 'jpg|jpeg|gif|png|bmp',
                        'upload_path' => $this->m_super->gallerypath
                    );
                    $this->load->library('upload', $konfigurasi);
                    $this->upload->do_upload("foto");
                    $datafile = $this->upload->data();
                    $konfigurasi = array(
                        'source_image' => $datafile['full_path'],
                        'new_image' => $this->m_super->gallerypath . '/thumbnails',
                        'maintain_ration' => true,
                        'width' => 160,
                        'height' => 120
                    );

                    $this->load->library('image_lib', $konfigurasi);
                    $this->image_lib->resize();
                    $data['foto'] = $userfile;
                    $this->m_super->save($data, $data['nip']);
                } else {
                    $this->m_super->save($data, $data['nip']);
                    redirect('super/detail/' . $data['nip']);
                }
            }
        }
        echo Modules::run('m_jabatan');
      
       
        $data['jabatan'] = $this->m_jabatan->get_dropdown();
        $data['staff'] = $this->m_super->get($id);
        $data['content'] = 'super/edit';
        $this->load->view('layout/template', $data);
    }

    public function edit_pass($id = NULL) {
       if(isLogin()==false){
            redirect('login');
        }
        if ($this->input->post('submit')) {
            $data = $this->m_super->array_from_post(array('userid', 'paswd_lama', 'passid'));
            $cek = $this->m_super->cek_paswd($data['userid'], $data['paswd_lama']);
            if ($cek) {
                $this->m_super->save(array('passid' => $data['passid']), $data['userid']);
                redirect('super/detail/' . $data['userid']);
            }
        }
        $data['staff'] = $this->m_super->get_pass($id);
        $data['content'] = 'super/edit_pass';
        $this->load->view('layout/template', $data);
    }

    public function detail($id) {
       if(isLogin()==false){
            redirect('login');
        }
        $data['pegawai'] = $this->m_super->get($id);
        $data['jadwal'] = $this->m_super->jadwal($id);
        foreach ($data['jadwal'] as $k => $v) {
            
            
            $kls = $this->load->model('kelas/m_kelas')->get($v->id_kelas);
            
            if (empty($kls)) {
                $data['jadwal'][$k]->kd_kelas = 'belum ada kelas';
            } else {
                $data['jadwal'][$k]->kd_kelas = $kls->kd_kelas;
            }
            
            
            $mkl = $this->load->model('matkul/m_matkul')->get($v->id_matkul); 
            if (empty($mkl)) {
                $data['jadwal'][$k]->nm_matkul = 'harus di isi';
            } else {
                $data['jadwal'][$k]->nm_matkul = $mkl->nm_matkul;
            }
            
            
            
            $sms = $this->load->model('semester/m_semester')->get($v->id_smtr);
            
            if (empty($sms)) {
                $data['jadwal'][$k]->kd_smstr = 'kosong';
            } else {
                $data['jadwal'][$k]->kd_smstr = $sms->kd_smstr;
            }
        }
        $data['content'] = 'super/detail';
        $this->load->view('layout/template', $data);
    }

    public function delete($id) {
        if(isLogin()==false){
            redirect('login');
        }
        if ($this->m_super->delete($id)) {
            redirect('super');
        } else {
            echo 'gagal';
        }
    }

    public function tmbh_pdk($id) {
        if ($this->input->post('submit')) {
            $data = $this->m_staff->array_from_post(array('t_pdk', 'pdk_nip', 'd_pdk'));
            $this->m_staff->save_pdk($data);
            redirect('pegawai/detail/' . $data['pdk_nip']);
        }
        $data['pendidikan'] = $this->m_staff->get($id);
        $data['content'] = 'pendidikan/add';
        $this->load->view('layout/template', $data);
    }

    public function edit_pdk($id) {
        if ($this->input->post('submit')) {
            $data = $this->m_pegawai->array_from_post(array('idp', 't_pdk', 'pdk_nip', 'd_pdk'));
            $this->m_pegawai->save_pdk($data, $data['idp']);
            redirect('pegawai/detail/' . $data['pdk_nip']);
        }
        $this->data['pendidikan'] = $this->m_pegawai->get_pdk_pgw($id);
        $this->data['content'] = 'pendidikan/edit';
        $this->load->view($this->template, $this->data);
    }

    public function del_pdk($id = NULL, $nip = NULL) {
        $this->m_pegawai->del_pdk($id);
        redirect('pegawai/detail/' . $nip);
    }

    
}