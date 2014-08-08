<?php

class Users extends MX_Controller
{
   
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('users_model');		
	}
	
	function login()
	{
		$this->form_validation->set_rules('username','username','required|xss_clean');
		$this->form_validation->set_rules('password','password','required|xss_clean');
		
		$this->form_validation->set_error_delimiters('','<br />');
				
		// Lakukan aksi dan cek user
		if ($this->form_validation->run() == TRUE)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			
			// cek login_data dari model
			$login_data = $this->users_model->cek_user_login($username, $password);
			
			if ($login_data)
			{
				$session_data = array(
								'id'	=> $login_data['id'],
								'username'	=> $login_data['username'],
								'type'		=> $login_data['type'],
								'is_login'	=> TRUE
						);
				// simpan session_data
				$this->session->set_userdata($session_data);
				
				// Cek Tipe user
				if ($this->session->userdata('type')== 'admin')
				{
					redirect('admin/');
					
				}elseif ($this->session->userdata('type') == 'konsumen')
				{
					redirect('konsumen/');
				
				}elseif ($this->session->userdata('type') == 'perawat')
				{
					redirect('perawat/');
				}
			}else{
				// arahkan jika username/password salah
				$this->session->set_flashdata('message', 'Login Gagal, Kombinasi username dan password salah!');
				redirect ('users/login');
			}
		}
		// load view untuk login function
                $this->load->view('layout/head');
		$this->load->view('users/login');
                $this->load->view('layout/footer');
	}
	
	function logout()
	{
		$data = array(
				'user_id' => 0,
				'username' => 0,
				'type' => 0,
				'is_login' => FALSE
		);
		$this->session->sess_destroy();
		$this->session->unset_userdata($data);
		//$this->index();
		redirect('users/login');
	}
	
	function check_logged_in()
	{
		if ($this->session->set_userdata() != TRUE)
		{
			redirect ('users/login','refresh');
			exit();
		}
	}
	
	function is_logged_in()
	{
		if ($this->session->userdata('logged_in') == TRUE)
		{
			return TRUE;
		}else{
			return FALSE;
		}
	}
}