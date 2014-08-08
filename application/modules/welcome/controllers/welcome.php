<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {


	function index()
	{
 		$this->load->view('welcome/welcome_message');
	}


	function home(){
		$this->load->view('welcome/welcome_message');	
	}
}
