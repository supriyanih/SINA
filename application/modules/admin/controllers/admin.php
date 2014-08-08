<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Admin extends MX_Controller {

   
    var $jekel = array(
        'P' => 'Wanita',
        'L' => 'Pria'
    );

    public function __construct() {
        parent::__construct();
        $this->load->model('m_admin');
        $this->load->model('jabatan/m_jabatan');
        $this->load->helper('staff_helper');
    }

    public function index() {
         if (isLogin()==false){
            redirect('login');
        }
        if ($this->session->userdata('level_user') == 2) {
            redirect('dosen/detail'.'/'. $this->session->userdata('userid'));
        } elseif ($this->session->userdata('level_user') == 1) {
            redirect('admin/detail'.'/'. $this->session->userdata('userid'));
        }else{
       
        $data['staff'] = $this->m_admin->admin();
        foreach ($data['staff'] as $k => $v) {
            
            $jab = $this->load->model('jabatan/m_jabatan')->get($v->id_jab);
            
            if (empty($jab)) {
                $data['staff'][$k]->n_jab = 'belum ada jabatan';
            } else {
                $data['staff'][$k]->n_jab = $jab->n_jab;
            }
        }
        $data['content'] = 'admin/index';
        $this->load->view('layout/template', $data);
        }
    }
    public function register() {
       if ($this->session->userdata('level_user') == 2) {
            redirect('dosen/detail'.'/'. $this->session->userdata('userid'));
        } elseif ($this->session->userdata('level_user') == 1) {
            redirect('admin/detail'.'/'. $this->session->userdata('userid'));
        }else{
   
        $this->load->model('jabatan/m_jabatan');
        if ($this->input->post('submit')) {
            $data = $this->m_admin->array_from_post(array
                ('nip', 'nama', 'tmpt_lahir', 'tgl_lahir', 'jenkel', 'alamat', 'email', 'telpon', 'id_jab'));
            $data_user = array(
                'userid' => $data['nip'],
                'passid' => $this->input->post('passid'),
                'level_user' => '1'
            );
            if (!$this->m_admin->cek_nip($data['nip'])) {
                if (!empty($userfile)) {
                    $konfigurasi = array(
                        'allowed_types' => 'jpg|jpeg|gif|png|bmp',
                        'upload_path' => $this->m_admin->gallerypath
                    );
                    $this->load->library('upload', $konfigurasi);
                    $this->upload->do_upload("foto");
                    $datafile = $this->upload->data();
                    $konfigurasi = array(
                        'source_image' => $datafile['full_path'],
                        'new_image' => $this->m_admin->gallerypath . '/thumbnails',
                        'maintain_ration' => true,
                        'width' => 160,
                        'height' => 120
                    );

                    $this->load->library('image_lib', $konfigurasi);
                    $this->image_lib->resize();
                    $data['foto'] = $userfile;
                                 $this->load->model('login/m_login')->insert($data_user);
                    $this->m_admin->insert($data);
					redirect('login');
                } else {
				$this->load->model('login/m_login')->insert($data_user);
                    $this->m_admin->insert($data);
                    redirect('admin');
                }
            } else {
                echo '<script> alert("NIP Sudah Ada silakan cek Ulang") </script>';
            }
        }
        
        $data['jabatan'] =  $this->load->model('jabatan/m_jabatan')->get_dropdown();
        $data['content'] = 'register';
        $this->load->view('layout/template', $data);
    }
    }
    public function edit($id = null) {
      
        
      
        if ($this->input->post('submit')) {
            $rules = $this->m_admin->rules;
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == TRUE) {
                $data = $this->m_admin->array_from_post(array
                    ('nip', 'nama', 'tmpt_lahir', 'tgl_lahir', 'jenkel', 'alamat', 'email','telpon', 'id_jab'));
                $userfile = $_FILES['foto']['name'];
                if (!empty($userfile)) {
                    $konfigurasi = array(
                        'allowed_types' => 'jpg|jpeg|gif|png|bmp',
                        'upload_path' => $this->m_admin->gallerypath
                    );
                    $this->load->library('upload', $konfigurasi);
                    $this->upload->do_upload("foto");
                    $datafile = $this->upload->data();
                    $konfigurasi = array(
                        'source_image' => $datafile['full_path'],
                        'new_image' => $this->m_admin->gallerypath . '/thumbnails',
                        'maintain_ration' => true,
                        'width' => 160,
                        'height' => 120
                    );

                    $this->load->library('image_lib', $konfigurasi);
                    $this->image_lib->resize();
                    $data['foto'] = $userfile;
                    $this->m_admin->save($data, $data['nip']);
                } else {
                    $this->m_admin->save($data, $data['nip']);
                    redirect('admin/detail/' . $data['nip']);
                }
            }
        }
        echo Modules::run('m_jabatan');
      
       
        $data['jabatan'] = $this->m_jabatan->get_dropdown();
        $data['staff'] = $this->m_admin->get($id);
        $data['content'] = 'admin/edit';
        $this->load->view('layout/template', $data);
    }
    
    public function edit_pass($id = NULL) {
       if ($this->session->userdata('level_user') == 2) {
            redirect('dosen/detail'.'/'. $this->session->userdata('userid'));
        } elseif ($this->session->userdata('level_user') == 1) {
            redirect('admin/detail'.'/'. $this->session->userdata('userid'));
        }else{
        
        
        if ($this->input->post('submit')) {
            $data = $this->m_admin->array_from_post(array('userid', 'paswd_lama', 'passid'));
            $cek = $this->m_admin->cek_paswd($data['userid'], $data['paswd_lama']);
            if ($cek) {
                $this->m_admin->save(array('passid' => $data['passid']), $data['userid']);
                redirect('admin/detail/' . $data['userid']);
            }
        }
        $data['staff'] = $this->m_admin->get_pass($id);
        $data['content'] = 'admin/edit_pass';
        $this->load->view('layout/template', $data);
    }
    }
    public function detail($id) {
        
        
        $data['pegawai'] = $this->m_admin->get($id);
        $data['jadwal'] = $this->m_admin->jadwal($id);
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
        $data['content'] = 'admin/detail';
        $this->load->view('layout/template', $data);
    }
    
    public function delete($id) {
      if ($this->session->userdata('level_user') == 2) {
            redirect('dosen/detail'.'/'. $this->session->userdata('userid'));
        } elseif ($this->session->userdata('level_user') == 1) {
            redirect('admin/detail'.'/'. $this->session->userdata('userid'));
        }else{ 
        
   if ($this->session->userdata('level_user') == 2) {
            redirect('dosen/detail'.'/'. $this->session->userdata('userid'));
        } elseif ($this->session->userdata('level_user') == 1) {
            redirect('admin/detail'.'/'. $this->session->userdata('userid'));
        }else{
        
        if ($this->m_admin->delete($id)) {
            redirect('admin');
        } else {
            echo 'gagal';
        }
    }
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