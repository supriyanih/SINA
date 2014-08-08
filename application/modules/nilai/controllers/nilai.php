<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Nilai extends MX_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('m_nilai');
        $this->load->model('kelas/m_kelas');
        $this->load->model('mahasiswa/m_mhs');
        $this->load->model('staff/m_staff');
        $this->load->model('matkul/m_matkul');
        $this->load->model('jadwal/m_jadwal');
    }
    
    public function index(){
        if(isLogin()==false){
            redirect('login');
        }
     $this->load->model('m_nilai');  
    $data['nilai']=  $this->m_nilai->getAll();
     foreach ($data['nilai'] as $k => $v) {
            
            
            $mat = $this->load->model('matkul/m_matkul')->get($v->id_matkul);
            
            if (empty($mat)) {
                $data['nilai'][$k]->kd_matkul = 'belum ada kelas';
            } else {
                $data['nilai'][$k]->kd_matkul = $mat->kd_matkul;
            }
            
            $ma = $this->load->model('matkul/m_matkul')->get($v->id_matkul);
            
            if (empty($ma)) {
                $data['nilai'][$k]->nm_matkul = 'belum ada kelas';
            } else {
                $data['nilai'][$k]->nm_matkul = $ma->nm_matkul;
            }
            
            
            $m = $this->load->model('matkul/m_matkul')->get($v->id_matkul);
            
            if (empty($m)) {
                $data['nilai'][$k]->sks = 'belum ada kelas';
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
           $nilai1=(int)$v->bobot;
           $nilai2=(int)$v->sks;
           $hasil= $nilai1*$nilai2;
            $data['nilai'][$k]->ttl =$hasil;
     }
   $data['content'] = 'nilai/transkrip';
   $this->load->view('layout/template',$data);
    
    }
    public function tambah($id=NULL) {
        if ($this->input->post('submit')) {
            $data = $this->m_nilai->array_from_post(array
            ('id_jadwal', 'nim','nama','absen','tugas',
            'uts','uas','grade'));
           
            $this->m_nilai->save($data);
            redirect('jadwal/index');
        }
        $data['mahasiswa']=  $this->load->model('mahasiswa/m_mhs')->get_by_kelas($id);
        $data['jadwal']= $this->load->model('jadwal/m_jadwal')->get_dropdown();
        $data['content'] = 'nilai/input';
        $this->load->view('layout/template', $data);
    }

    public function edit($id=null) {
        if ($this->input->post('submit')) {
            $data = $this->m_jadwal->array_from_post(array
            ('id_jadwal','kd_jadwal', 'id_kelas','id_matkul','id_smtr','nip_dosen',
            'thn_akademik','status')        
                    );
            
            $this->m_jadwal->save($data, $data['id_jadwal']);
            redirect('jadwal');
        }
        $data['kelas']= $this->load->model('kelas/m_kelas')->get_dropdown();
        $data['matkul']=  $this->load->model('matkul/m_matkul')->get_dropdown();
        $data['smstr']=  $this->load->model('semester/m_semester')->get_dropdown();
        $data['dosen']= $this->load->model('staff/m_staff')->get_dosen();
        $data['jadwal'] = $this->m_jadwal->get($id);
        $data['content'] = 'jadwal/edit';
        $this->load->view('layout/template', $data);
    }

    public function delete($id = NULL) {
        $this->m_jawal->delete($id);
        redirect('jadwal');
    }
    
    public function inputnilai($id,$kd){
     if($_POST==NULL){   
    $this->db->select('*');
    $this->db->where('id_kelas',$id);
    $query = $this->db->get('mhs');
    $num = $query->num_rows();  
    $data['jumlah']= $num;
    $data['mahasiswa']=  $this->load->model('mahasiswa/m_mhs')->get_by_kelas($id);
   $data['ket'] = $this->m_jadwal->get($kd);
    $data['jadwal']= $kd;
     $data['content'] = 'tambah';
     $this->load->view('layout/template', $data);
     
     }else{
         foreach($_POST['data'] as $d){
        $this->m_nilai->save($d);
     }   
     redirect('jadwal/index');
    }   
    }
    public function getdata($id=NULL){
        $data['jadwal'] = $this->load->model('jadwal/m_jadwal')->get_id($id);
         foreach ($data['jadwal'] as $k => $v) {
          $data['mahasiswa']=$this->load->model('mahasiswa/m_mhs')->get_by_kelas($id=$v->id_kelas);
           
         }
        
         $data['content'] = 'nilai/index';
        $this->load->view('layout/template',$data,$data['mahasiswa']);
    }
    
    public function cari_nilai(){
        if ($this->input->post('submit')) {
            $data = $this->m_nilai->array_from_post(array
            ('nim'));
            $id=$data['nim'];
            
            redirect('nilai/transkrip'.'/'.$id);
           
        }
        $data['content']='cr_nilai';
        $this->load->view('layout/template',$data);
    }
    
    public function transkrip($id=NULL){
        $data['nilai']= $this->m_nilai->nilai_mhs($id);
        foreach ($data['nilai'] as $k => $v) {
            
            
            $mat = $this->load->model('matkul/m_matkul')->get($v->id_matkul);
            
            if (empty($mat)) {
                $data['nilai'][$k]->kd_matkul = 'belum ada kelas';
            } else {
                $data['nilai'][$k]->kd_matkul = $mat->kd_matkul;
            }
            
            $ma = $this->load->model('matkul/m_matkul')->get($v->id_matkul);
            
            if (empty($ma)) {
                $data['nilai'][$k]->nm_matkul = 'belum ada kelas';
            } else {
                $data['nilai'][$k]->nm_matkul = $ma->nm_matkul;
            }
            
            
            $m = $this->load->model('matkul/m_matkul')->get($v->id_matkul);
            
            if (empty($m)) {
                $data['nilai'][$k]->sks = 'belum ada kelas';
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
           $nilai1=(int)$v->bobot;
           $nilai2=(int)$v->sks;
           $hasil= $nilai1*$nilai2;
            $data['nilai'][$k]->ttl =$hasil;
     }
   $data['mahasiswa']= $this->load->model('mahasiswa/m_mhs')->get($id); 
   $data['prodi']=$this->load->model('prodi/m_prodi')->get_dropdown();
   $data['siswa']= $this->load->model('mahasiswa/m_mhs')->getprodi($id); 
             
   $data['content'] = 'nilai/transkrip';
   $this->load->view('layout/template',$data);
   
    }
    
    
    public function  cari_khs($id=NULL){
        if ($this->input->post('submit')) {
            $data = $this->m_nilai->array_from_post(array
            ('nim','smtr'));
           $id=$data['nim'];
           
           
           $data['nilai']= $this->m_nilai->nilai_mhs($id);
           foreach ($data['nilai'] as $k => $v) {
            
            
            $mat = $this->load->model('matkul/m_matkul')->get($v->id_matkul);
            
            if (empty($mat)) {
                $data['nilai'][$k]->kd_matkul = 'belum ada kelas';
            } else {
                $data['nilai'][$k]->kd_matkul = $mat->kd_matkul;
            }
            
            $ma = $this->load->model('matkul/m_matkul')->get($v->id_matkul);
            
            if (empty($ma)) {
                $data['nilai'][$k]->nm_matkul = 'belum ada kelas';
            } else {
                $data['nilai'][$k]->nm_matkul = $ma->nm_matkul;
            }
            
            
            $m = $this->load->model('matkul/m_matkul')->get($v->id_matkul);
            
            if (empty($m)) {
                $data['nilai'][$k]->sks = 'belum ada kelas';
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
            $nilai1=(int)$v->bobot;
           $nilai2=(int)$v->sks;
           $hasil= $nilai1*$nilai2;
            $data['nilai'][$k]->ttl =$hasil;
           }
           $data['semester']=$data['smtr'];
           $data['mahasiswa']= $this->load->model('mahasiswa/m_mhs')->get($id); 
            $data['content'] = 'nilai/khs';
            $this->load->view('layout/template',$data);
           
        }else {
         $data['semester']=  $this->load->model('semester/m_semester')->get_dropdown();
        $data['content']='cr_khs';
        $this->load->view('layout/template',$data);  
        }
       
    }
    
    public function nilai_krs(){
        
    }
   
}

