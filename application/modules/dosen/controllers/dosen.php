<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Dosen extends MX_Controller {

   
    var $jekel = array(
        'P' => 'Wanita',
        'L' => 'Pria'
    );

    public function __construct() {
        parent::__construct();
        $this->load->model('m_dosen');
        $this->load->model('jabatan/m_jabatan');
    }

    public function index() {
    
         if (isLogin()==false){
            redirect('login');
        }
       
        $data['staff'] = $this->m_dosen->dosen();
        foreach ($data['staff'] as $k => $v) {
            
            $jab = $this->load->model('jabatan/m_jabatan')->get($v->id_jab);
            
            if (empty($jab)) {
                $data['staff'][$k]->n_jab = 'belum ada jabatan';
            } else {
                $data['staff'][$k]->n_jab = $jab->n_jab;
            }
        }
        $data['content'] = 'dosen/index';
        $this->load->view('layout/template', $data);
    }
    public function register() {
       
       
        $this->load->model('jabatan/m_jabatan');
        if ($this->input->post('submit')) {
            $data = $this->m_dosen->array_from_post(array
                ('nip', 'nama', 'tmpt_lahir', 'tgl_lahir', 'jenkel', 'alamat', 'email', 'telpon', 'id_jab'));
            $data_user = array(
                'userid' => $data['nip'],
                'passid' => $this->input->post('passid'),
                'level_user' => '2'
            );
            if (!$this->m_dosen->cek_nip($data['nip'])) {
                if (!empty($userfile)) {
                    $konfigurasi = array(
                        'allowed_types' => 'jpg|jpeg|gif|png|bmp',
                        'upload_path' => $this->m_dosen->gallerypath
                    );
                    $this->load->library('upload', $konfigurasi);
                    $this->upload->do_upload("foto");
                    $datafile = $this->upload->data();
                    $konfigurasi = array(
                        'source_image' => $datafile['full_path'],
                        'new_image' => $this->m_dosen->gallerypath . '/thumbnails',
                        'maintain_ration' => true,
                        'width' => 160,
                        'height' => 120
                    );

                    $this->load->library('image_lib', $konfigurasi);
                    $this->image_lib->resize();
                    $data['foto'] = $userfile;
                                    $this->load->model('login/m_login')->insert($data_user);
                    $this->m_dosen->insert($data);
					redirect('login');
                } else {
				$this->load->model('login/m_login')->insert($data_user);
                    $this->m_dosen->insert($data);
                    redirect('dosen');
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
        if ($this->input->post('submit')) {
            $rules = $this->m_dosen->rules;
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == TRUE) {
                $data = $this->m_dosen->array_from_post(array
                    ('nip', 'nama', 'tmpt_lahir', 'tgl_lahir', 'jenkel', 'alamat', 'email','telpon', 'id_jab'));
                $userfile = $_FILES['foto']['name'];
                if (!empty($userfile)) {
                    $konfigurasi = array(
                        'allowed_types' => 'jpg|jpeg|gif|png|bmp',
                        'upload_path' => $this->m_dosen->gallerypath
                    );
                    $this->load->library('upload', $konfigurasi);
                    $this->upload->do_upload("foto");
                    $datafile = $this->upload->data();
                    $konfigurasi = array(
                        'source_image' => $datafile['full_path'],
                        'new_image' => $this->m_dosen->gallerypath . '/thumbnails',
                        'maintain_ration' => true,
                        'width' => 160,
                        'height' => 120
                    );

                    $this->load->library('image_lib', $konfigurasi);
                    $this->image_lib->resize();
                    $data['foto'] = $userfile;
                    $this->m_dosen->save($data, $data['nip']);
                } else {
                    $this->m_dosen->save($data, $data['nip']);
                    redirect('dosen/detail/' . $data['nip']);
                }
            }
        }
        echo Modules::run('m_jabatan');
      
       
        $data['jabatan'] = $this->m_jabatan->get_dropdown();
        $data['staff'] = $this->m_dosen->get($id);
        $data['content'] = 'dosen/edit';
        $this->load->view('layout/template', $data);
    }

    public function edit_pass($id = NULL) {
        if ($this->input->post('submit')) {
            $data = $this->m_dosen->array_from_post(array('userid', 'paswd_lama', 'passid'));
            $cek = $this->m_dosen->cek_paswd($data['userid'], $data['paswd_lama']);
            if ($cek) {
                $this->m_dosen->save(array('passid' => $data['passid']), $data['userid']);
                redirect('dosen/detail/' . $data['userid']);
            }
        }
        $data['staff'] = $this->m_dosen->get_pass($id);
        $data['content'] = 'dosen/edit_pass';
        $this->load->view('layout/template', $data);
    }

    public function detail($id) {
        if (isLogin()==false){
            redirect('login');
        }
        $param = array(
               'nip_dosen'=>$id,
               'status' =>'0'
               
            );
        $data['jadwal'] = $this->load->model('jadwal/m_jadwal')->get_many_by($param);
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
       
        
        
        $data['content'] = 'dosen/detail';
        $this->load->view('layout/template', $data);
    }

    public function delete($id) {
        //cekAdminLogin();
        if ($this->m_dosen->delete($id)) {
            redirect('dosen');
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
        $this->m_staff->del_pdk($id);
        redirect('staff/detail/' . $nip);
    }

   
    public function nilai_mhs($id){
     $data['mahasiswa']=$this->load->model('nilai/m_nilai')->jdl_mhs($id);
   // $data['jadwal'] = $this->load->model('jadwal/m_jadwal')->get($id);
     $data['content'] = 'inputnilai';
     $this->load->view('layout/template', $data);
    }
    
    public function input_nilai($id){
      if ($this->input->post('submit')) {
            $data = $this->m_dosen->array_from_post(array('id','id_jadwal', 'nim', 'nama','absen','tugas','uts','uas','grade'));
            $this->load->model('nilai/m_nilai')->save($data, $data['id']);
            redirect('dosen/nilai_mhs/'.$data['id_jadwal']);
        }
        $data['nilai'] = $this->load->model('nilai/m_nilai')->get($id);
        $data['content'] = 'updatenilai';
        $this->load->view('layout/template', $data);  
    }
}