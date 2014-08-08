<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Staff extends MX_Controller {

   
    var $jekel = array(
        'P' => 'Wanita',
        'L' => 'Pria'
    );

    public function __construct() {
        parent::__construct();
        $this->load->model('m_staff');
        $this->load->model('jabatan/m_jabatan');
    }

    public function index() {
     //cekAdminLogin(); 
       
       if(isLogin()==false){
            redirect('login');
        }
        $data['staff'] = $this->m_staff->get_all();
        foreach ($data['staff'] as $k => $v) {
            
            $jab = $this->load->model('jabatan/m_jabatan')->get($v->id_jab);
            
            if (empty($jab)) {
                $data['staff'][$k]->n_jab = 'belum ada jabatan';
            } else {
                $data['staff'][$k]->n_jab = $jab->n_jab;
            }
        }
        $data['content'] = 'index';
        $this->load->view('layout/template', $data);
    }
    public function register() {
        $this->load->model('m_staff');
       
        $this->load->model('jabatan/m_jabatan');
        if ($this->input->post('submit')) {
            $data = $this->m_staff->array_from_post(array
                ('nip', 'nama', 'tmpt_lahir', 'tgl_lahir', 'jenkel', 'alamat', 'email', 'telpon', 'id_jab'));
            $data_user = array(
                'userid' => $data['nip'],
                'passid' => $this->input->post('passid'),
                'level_user' => '1'
            );
            if (!$this->m_staff->cek_nip($data['nip'])) {
                if (!empty($userfile)) {
                    $konfigurasi = array(
                        'allowed_types' => 'jpg|jpeg|gif|png|bmp',
                        'upload_path' => $this->m_staff->gallerypath
                    );
                    $this->load->library('upload', $konfigurasi);
                    $this->upload->do_upload("foto");
                    $datafile = $this->upload->data();
                    $konfigurasi = array(
                        'source_image' => $datafile['full_path'],
                        'new_image' => $this->m_staff->gallerypath . '/thumbnails',
                        'maintain_ration' => true,
                        'width' => 160,
                        'height' => 120
                    );

                    $this->load->library('image_lib', $konfigurasi);
                    $this->image_lib->resize();
                    $data['foto'] = $userfile;
                                    $this->load->model('login/m_login')->insert($data_user);
                    $this->m_staff->insert($data);
					redirect('login');
                } else {
					$this->load->model('login/m_login')->insert($data_user);
                    $this->m_staff->insert($data);
                    redirect('staff');
                }
            } else {
                echo '<script> alert("NIP sudah ada bro") </script>';
            }
        }
        
        $data['jabatan'] =  $this->load->model('jabatan/m_jabatan')->get_dropdown();
        $data['content'] = 'register';
        $this->load->view('layout/template', $data);
    }
    public function edit($id = null) {
        if ($this->input->post('submit')) {
            $rules = $this->m_staff->rules;
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == TRUE) {
                $data = $this->m_staff->array_from_post(array
                    ('nip', 'nama', 'tmpt_lahir', 'tgl_lahir', 'jenkel', 'alamat', 'email','telpon', 'id_jab'));
                $userfile = $_FILES['foto']['name'];
                if (!empty($userfile)) {
                    $konfigurasi = array(
                        'allowed_types' => 'jpg|jpeg|gif|png|bmp',
                        'upload_path' => $this->m_staff->gallerypath
                    );
                    $this->load->library('upload', $konfigurasi);
                    $this->upload->do_upload("foto");
                    $datafile = $this->upload->data();
                    $konfigurasi = array(
                        'source_image' => $datafile['full_path'],
                        'new_image' => $this->m_staff->gallerypath . '/thumbnails',
                        'maintain_ration' => true,
                        'width' => 160,
                        'height' => 120
                    );

                    $this->load->library('image_lib', $konfigurasi);
                    $this->image_lib->resize();
                    $data['foto'] = $userfile;
                    $this->m_staff->save($data, $data['nip']);
                } else {
                    $this->m_staff->save($data, $data['nip']);
                    redirect('staff/detail/' . $data['nip']);
                }
            }
        }
        echo Modules::run('m_jabatan');
      
       
        $data['jabatan'] = $this->m_jabatan->get_dropdown();
        $data['staff'] = $this->m_staff->get($id);
        $data['content'] = 'staff/edit';
        $this->load->view('layout/template', $data);
    }

    public function edit_pass($id = NULL) {
        if ($this->input->post('submit')) {
            $data = $this->m_staff->array_from_post(array('userid', 'paswd_lama', 'passid'));
            $cek = $this->m_staff->cek_paswd($data['userid'], $data['paswd_lama']);
            if ($cek) {
                $this->m_staff->save(array('passid' => $data['passid']), $data['userid']);
                redirect('staff/detail/' . $data['userid']);
            }
        }
        $data['staff'] = $this->m_staff->get_pass($id);
        $data['content'] = 'staff/edit_pass';
        $this->load->view('layout/template', $data);
    }

    public function detail($id) {
        $data['pegawai'] = $this->m_staff->get($id);
        $data['pendidikan'] = $this->m_staff->get_pdk($id);
        
        $data['content'] = 'staff/detail';
        $this->load->view('layout/template', $data);
    }

    public function delete($id) {
        cekAdminLogin();
        if ($this->m_staff->delete($id)) {
            redirect('pegawai');
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


    public function cetak() {
        cekAdminLogin();
        $this->load->model('m_bagian');
        $this->load->model('m_jabatan');
        $this->data['pegawai'] = $this->m_pegawai->get_all();
        $this->data['jekel'] = $this->jekel;
        foreach ($this->data['pegawai'] as $k => $v) {
            $bag = $this->m_bagian->get($v->id_bag);
            $jab = $this->m_jabatan->get($v->id_jab);
            if (empty($bag)) {
                $this->data['pegawai'][$k]->n_bag = 'belum ada bagian';
            } else {
                $this->data['pegawai'][$k]->n_bag = $bag->n_bag;
            }
            if (empty($jab)) {
                $this->data['pegawai'][$k]->n_jab = 'belum ada jabatan';
            } else {
                $this->data['pegawai'][$k]->n_jab = $jab->n_jab;
            }
        }
        $this->data['content'] = 'pegawai/print';
        $this->load->view('print_template', $this->data);
    }

}