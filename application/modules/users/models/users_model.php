<?php
/*******************************************************************************
 *                       				users_model.php
 *******************************************************************************
 *      Author:     Topidesta <m.desta.fadilah@hotmail.com>
 *      Website:    http://www.twitter.com/emang_dasar
 *
 *      File:       users_model.php
 *      Created:   15 Des 2012201204.39.17
 *      Copyright:  (c) 2012 2010 - shabiki
 *                  You are free to use, distribute, and modify this software
 *                  under the terms of the GNU General Public License.  See the
 *                  included license.txt file.
 *
 *******************************************************************************/
class Users_model extends CI_Model
{
	var $tabel_name = 'users';
	
	function __construct() {
		parent::__construct();
	}
	
	function cek_user_login($username,$password) 
	{
        $this->db->select('*');
        $this->db->where('username', $username);
        $this->db->where('password', md5($password));

        $query = $this->db->get($this->tabel_name, 1);

        if ($query->num_rows() == 1) {
            return $query->row_array();
        }
    }
}