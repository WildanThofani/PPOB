<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class login_admin_mdl extends CI_Model {

	public function loginAdmin()
	{
		$dataAdmin = $this->db->join('level', 'level.id_level = admin.id_level')
							  ->where('username', $this->input->post('username'))
							  ->where('password', $this->input->post('password'))
							  ->get('admin');

		return $dataAdmin;
	}

}

/* End of file login_admin_mdl.php */
