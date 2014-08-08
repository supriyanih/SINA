<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mdl_mahasiswa extends CI_Model {


        function __construct() {
            parent::__construct();
            $this->load->database();
        }
        
        public function  create(){
            
            return $this->db->insert('mhs',array(
                'nim'=>$this->input->post('nim',true),
                'nama'=>$this->input->post('nama',true),
                'tmp_lahir'=>$this->input->post('tmp_lahir',true),
                'tgl_lahir'=>$this->input->post('tgl_lahir',true),
                'jenkel'=>$this->input->post('jenkel',true),
                'prodi'=>$this->input->post('prodi',true),
                'alamat'=>$this->input->post('alamat',true),
                'telpon'=>$this->input->post('telpon',true),
                'email'=>$this->input->post('email',true)             
            ));
        }
        public function update($nim){
            
            $this->db->where('nim',$nim);
            return $this->db->update('mhs',array(
                'nama'=>$this->input->post('nama',true),
                'tmp_lahir'=>$this->input->post('tmp_lahir',true),
                'tgl_lahir'=>$this->input->post('tgl_lahir',true),
                'jenkel'=>$this->input->post('jenkel',true),
                'prodi'=>$this->input->post('prodi',true),
                'alamat'=>$this->input->post('alamat',true),
                'telpon'=>$this->input->post('telpon',true),
                'email'=>$this->input->post('email',true)             
            ));
        }
        
        public function delete($nim){
            return $this->db->delete('mhs',array('nim'=>$nim));
        }
        
        public function getJson()
	{
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? strval($_POST['sort']) : 'nim';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$offset = ($page-1) * $rows;
		
		$result = array();
		$result['total'] = $this->db->get('mhs')->num_rows();
		$row = array();
		
		$this->db->limit($rows,$offset);
		$this->db->order_by($sort,$order);
		$criteria = $this->db->get('mhs');
		
		foreach($criteria->result_array() as $data)
		{	
			$row[] = array(
				'nim'=>$data['nim'],
				'nama'=>$data['nama'],
                                'tmp_lahir'=>$data['tmp_lahir'],
                                'tgl_lahir'=>$data['tgl_lahir'],
				'jenkel'=>$data['jenkel'],
				'prodi'=>$data['prodi'],
                                'alamat'=>$data['alamat'],
                                'telpon'=>$data['telpon'],
                                'email'=>$data['email']
			);
		}
		$result=array_merge($result,array('rows'=>$row));
		return json_encode($result);
	}

}

