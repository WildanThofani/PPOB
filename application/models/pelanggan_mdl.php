<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class pelanggan_mdl extends CI_Model {

	public function getData()
	{
		$dataPelanggan = $this->db->get('users')->result();
		return $dataPelanggan;
	}

	public function updateData()
	{
		$data = array(
			'username' => $this->input->post('username'),
			'name' => $this->input->post('name'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'alamat' => $this->input->post('alamat')
		);

		$update = $this->db->where('id', $this->input->post('id'))->update('users', $data);
		return $update;
	}

	public function deleteData($id)
	{
		$delete = $this->db->where('id' , $id)->delete('users');
		return $delete;
	}

	public function detailData($id)
	{
		$detail = $this->db->where('id', $id)->get('users')->row();
		return $detail;
	}

}

/* End of file pelanggan_mdl.php */
