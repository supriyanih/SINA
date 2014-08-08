<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Mahasiswa extends MX_Controller {

   
    var $jekel = array(
        'P' => 'Wanita',
        'L' => 'Pria'
    );

    public function __construct() {
        parent::__construct();
        $this->load->model('m_mhs');
        $this->load->model('prodi/m_prodi');
         $this->load->model('kelas/m_kelas');
    }

    public function index() {
    
         if (isLogin()==false){
            redirect('login');
        }
       
        $data['mhs'] = $this->m_mhs->get_all();
        foreach ($data['mhs'] as $k => $v) {
            
            $pro = $this->load->model('prodi/m_prodi')->get($v->id_prodi);
            
            if (empty($pro)) {
                $data['mhs'][$k]->nm_prodi = 'belum ada jurusan';
            } else {
                $data['mhs'][$k]->nm_prodi = $pro->nm_prodi;
            }
            
            $kls = $this->load->model('kelas/m_kelas')->get($v->id_kelas);
            
            if (empty($kls)) {
                $data['mhs'][$k]->kd_kelas = 'belum ada kelas';
            } else {
                $data['mhs'][$k]->kd_kelas = $kls->kd_kelas;
            }
        }
        $data['content'] = 'index';
        $this->load->view('layout/template', $data);
    }
    public function register() {
      
       
        $this->load->model('prodi/m_prodi');
        if ($this->input->post('submit')) {
            $data = $this->m_mhs->array_from_post(array
                ('nim', 'nama', 'tmpt_lahir', 'tgl_lahir', 'jenkel', 'id_prodi', 
                'id_kelas','alamat', 'email', 'telpon')
                    );
            $data_user = array(
                'userid' => $data['nim'],
                'passid' => $this->input->post('passid'),
                'level_user' => '4'
            );
            if (!$this->m_mhs->cek_nim($data['nim'])) {
                if (!empty($userfile)) {
                    $konfigurasi = array(
                        'allowed_types' => 'jpg|jpeg|gif|PNG|bmp',
                        'upload_path' => $this->m_mhs->gallerypath
                    );
                    $this->load->library('upload', $konfigurasi);
                    $this->upload->do_upload("foto");
                    $datafile = $this->upload->data();
                    $konfigurasi = array(
                        'source_image' => $datafile['full_path'],
                        'new_image' => $this->m_mhs->gallerypath . '/thumbnails',
                        'maintain_ration' => true,
                        'width' => 160,
                        'height' => 120
                    );

                    $this->load->library('image_lib', $konfigurasi);
                    $this->image_lib->resize();
                    $data['foto'] = $userfile;
                    $this->load->model('login/m_login')->insert($data_user);
                    $this->m_mhs->insert($data);
                    redirect('login');
                }else {
				$this->load->model('login/m_login')->insert($data_user);
                    $this->m_mhs->insert($data);
                    redirect('mahasiswa');
                }
            } else {
                echo '<script> alert("NIM sudah terdaftar") </script>';
            }
        }
        
        $data['prodi'] =  $this->load->model('prodi/m_prodi')->get_dropdown();
         $data['kelas'] =  $this->load->model('kelas/m_kelas')->get_dropdown();
        $data['content'] = 'register';
        $this->load->view('layout/template', $data);
    }
    public function edit($id = null) {
        if ($this->input->post('submit')) {
            $rules = $this->m_mhs->rules;
            $this->form_validation->set_rules($rules);
            if ($this->form_validation->run() == TRUE) {
                $data = $this->m_mhs->array_from_post(array
                    ('nim', 'nama', 'tmpt_lahir', 'tgl_lahir', 'jenkel', 'id_prodi','id_kelas', 'alamat', 'email','telpon'));
                $userfile = $_FILES['foto']['name'];
                if (!empty($userfile)) {
                    $konfigurasi = array(
                        'allowed_types' => 'jpg|jpeg|gif|png|bmp',
                        'upload_path' => $this->m_mhs->gallerypath
                    );
                    $this->load->library('upload', $konfigurasi);
                    $this->upload->do_upload("foto");
                    $datafile = $this->upload->data();
                    $konfigurasi = array(
                        'source_image' => $datafile['full_path'],
                        'new_image' => $this->m_mhs->gallerypath . '/thumbnails',
                        'maintain_ration' => true,
                        'width' => 160,
                        'height' => 120
                    );

                    $this->load->library('image_lib', $konfigurasi);
                    $this->image_lib->resize();
                    $data['foto'] = $userfile;
                    $this->m_mhs->save($data, $data['nim']);
                } else {
                    $this->m_mhs->save($data, $data['nim']);
                    redirect('mahasiswa');
                }
            }
        }
        echo Modules::run('m_prodi');
        echo Modules::run('m_kelas');
      
       
        $data['prodi'] = $this->m_prodi->get_dropdown();
        $data['kelas'] = $this->m_kelas->get_dropdown();
        $data['mhs'] = $this->m_mhs->get($id);
        $data['content'] = 'mahasiswa/edit';
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
        $data['mhs'] = $this->m_mhs->get($id);
    
        $data['content'] = 'mahasiswa/detail';
        $this->load->view('layout/template', $data);
    }

    public function delete($id) {
       // cekAdminLogin();
        if ($this->m_mhs->delete($id)) {
            redirect('mahasiswa');
        } else {
            echo 'gagal';
        }
    }

    public function mobile($id){
        if (isLogin()==false){
            redirect('login');
        }
     $data['mhs'] = $this->m_mhs->get($id);
        
      $this->load->view('mobile',$data);
    }
    
    public function mobile_jadwal($id){
        if (isLogin()==false){
            redirect('login');
        }
         $data['jadwal']= $this->load->model('jadwal/m_jadwal')->get_mhs_nim($id);
         foreach ($data['jadwal'] as $k => $v) {
         
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
            
            
            
            $dsn = $this->load->model('staff/m_staff')->get($v->nip_dosen);
            
            if (empty($dsn)) {
                $data['jadwal'][$k]->nama = 'kosong';
            } else {
                $data['jadwal'][$k]->nama = $dsn->nama;
            }
            
            
            
        }
         $this->load->view('mobile_jadwal',$data);
    }
    public function mobile_nilai($id){
        
        if(isLogin()==false){
            redirect('login');
        }
    
            $data['nilai']=  $this->load->model('nilai/m_nilai')->nilai_mhs($id);
                foreach ($data['nilai'] as $k => $v) {
            
            
                        $mat = $this->load->model('matkul/m_matkul')->get($v->id_matkul);

                        if (empty($mat)) {
                            $data['nilai'][$k]->kd_matkul = 'belum ada';
                        } else {
                            $data['nilai'][$k]->kd_matkul = $mat->kd_matkul;
                        }

                        $ma = $this->load->model('matkul/m_matkul')->get($v->id_matkul);

                        if (empty($ma)) {
                            $data['nilai'][$k]->nm_matkul = 'belum ada ';
                        } else {
                            $data['nilai'][$k]->nm_matkul = $ma->nm_matkul;
                        }


                        $m = $this->load->model('matkul/m_matkul')->get($v->id_matkul);

                        if (empty($m)) {
                            $data['nilai'][$k]->sks = 'belum ada ';
                        } else {
                            $data['nilai'][$k]->sks = $m->sks;
                        }


                        $sms = $this->load->model('semester/m_semester')->get($v->id_smtr);

                        if (empty($sms)) {
                            $data['nilai'][$k]->kd_smstr = 'kosong';
                        } else {
                            $data['nilai'][$k]->kd_smstr = $sms->kd_smstr;
                        }


                         $bbt = $this->load->model('bobot/m_bobot')->get($v->grade);

                        if (empty($bbt)) {
                            $data['nilai'][$k]->bobot = 'kosong';
                        } else {
                            $data['nilai'][$k]->bobot = $bbt->bobot;
                        }

                    }

                  $this->load->view('mobile_nilai',$data);

   }
   
   public function mobile_info(){
        if (isLogin()==false){
            redirect('login');
        }
       
       $data['info']=$this->load->model('info/m_info')->get_All();
       $this->load->view('mobile_info',$data);
   }

}