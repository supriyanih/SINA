<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Jadwal extends MX_Controller {

  

    public function __construct() {
        parent::__construct();
        $this->load->model('m_jadwal');
        
    }
    public function index() {
        
        if (isLogin()==false){
            redirect('login');
        }
        $param = array(
               'status' =>'0'
               
            );
        $data['jadwal'] = $this->m_jadwal->get_many_by($param);
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
            
            
            
            $dsn = $this->load->model('staff/m_staff')->get($v->nip_dosen);
            
            if (empty($dsn)) {
                $data['jadwal'][$k]->nama = 'kosong';
            } else {
                $data['jadwal'][$k]->nama = $dsn->nama;
            }
            
            
            
        }
        $data['content'] = 'jadwal/index';
        $this->load->view('layout/template', $data);
    }

    public function tambah() {
        if ($this->input->post('submit')) {
             
            $data = $this->m_jadwal->array_from_post(array
            ('kd_jadwal', 'id_kelas','id_matkul','id_smtr','nip_dosen','hari','mulai','selesai',
            'ruang','thn_akademik','smtr_tmp','status'));
           
         
            $this->m_jadwal->save($data);
            redirect('jadwal');
        }
        $data['kelas']= $this->load->model('kelas/m_kelas')->get_dropdown();
        $data['matkul']=  $this->load->model('matkul/m_matkul')->get_dropdown();
        $data['smstr']=  $this->load->model('semester/m_semester')->get_dropdown();
        $data['dosen']= $this->load->model('staff/m_staff')->get_dosen();
        $data['hari']=  $this->m_jadwal->hari_dropdown();
        $data['content'] = 'jadwal/tambah';
        $this->load->view('layout/template', $data);
    }

    public function edit($id) {
        if ($this->input->post('submit')) {
             
            $data = $this->m_jadwal->array_from_post(array
            ('kd_jadwal', 'id_kelas','id_matkul','id_smtr','nip_dosen','hari','mulai','selesai',
            'ruang','thn_akademik','smtr_tmp'));
           
         
            $this->m_jadwal->save($data,$data['kd_jadwal']);
            redirect('jadwal');
        }
        $data['jadwal']= $this->m_jadwal->get($id);
        $data['kelas']= $this->load->model('kelas/m_kelas')->get_dropdown();
        $data['matkul']=  $this->load->model('matkul/m_matkul')->get_dropdown();
        $data['smstr']=  $this->load->model('semester/m_semester')->get_dropdown();
        $data['dosen']= $this->load->model('staff/m_staff')->get_dosen();
        $data['hari']=  $this->m_jadwal->hari_dropdown();
        
        $data['content'] = 'edit';
        $this->load->view('layout/template', $data);
    }

    public function delete($id = NULL) {
        $this->m_jawal->delete($id);
        redirect('jadwal');
    }
   public function getmahasiswa($id){
      
    $data['jadwal'] = $this->load->model('jadwal/m_jadwal')->get($id);
            
   
   $data['mahasiswa']=$this->load->model('nilai/m_nilai')->jdl_mhs($id);
   
     $data['content'] = 'mahasiswa';
     $this->load->view('layout/template', $data);
   
     
    }
 
    public function jadwal_selesai($id){
        $this->m_jadwal->update_selesai($id);
        redirect('jadwal');
    }
    
    
    public function selesai(){
       if (isLogin()==false){
            redirect('login');
        }
        $param = array(
               'status' =>'1'
               
            );
        $data['jadwal'] = $this->m_jadwal->get_many_by($param);
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
            
            
            
            $dsn = $this->load->model('staff/m_staff')->get($v->nip_dosen);
            
            if (empty($dsn)) {
                $data['jadwal'][$k]->nama = 'kosong';
            } else {
                $data['jadwal'][$k]->nama = $dsn->nama;
            }
            
            
            
        }
        $data['content'] = 'jadwal/jadwal_selesai';
        $this->load->view('layout/template', $data);  
        
    }
    
    public function jadwal_aktif($id){
        $this->m_jadwal->update_aktif($id);
        redirect('jadwal/selesai');
    }
    
    public function cetak($id){
        $data['mahasiswa']=$this->load->model('nilai/m_nilai')->jdl_mhs($id);
    }
 
}


