<?php 

class M_login extends MY_Model { 
  
//put your code here 
    public function __construct() { 
        parent::__construct(); 
        parent::set_tabel('login', 'id'); 
    } 
  
    public function checkLogin($username, $password) { 
        return parent::get_by(array( 
                    'userid' => $username, 
                    'passid' => $password, 
        )); 
    } 
  
}