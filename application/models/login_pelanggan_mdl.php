<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class login_pelanggan_mdl extends CI_Model {

	public function checkDataUser()
	{
		$dataUser = $this->db->where('username', $this->input->post('username'))
							 ->where('password', md5($this->input->post('password')))
							 ->get('users');

		return $dataUser;
	}

	public function tambahUser()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'alamat' => $this->input->post('alamat')
		);

		$insert = $this->db->insert('users', $data);

		return $insert;
	}

}

/* End of file login_pelanggan_mdl.php */
