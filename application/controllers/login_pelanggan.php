<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login_pelanggan extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_pelanggan_mdl', 'login');
		
	}
	
	
	public function index()
	{
<<<<<<< HEAD
		$this->load->view('user/v_login_pelanggan');
=======
		$this->load->view('v_login_pelanggan');
>>>>>>> 223a8922616330c41921f009f8e492ba9095b68e
		
	}

	public function loginProses()
	{
		$login = $this->login->checkDataUser();
		if ($login->num_rows()>0) {
			$dataUser = $login->row();
			$data = array(
				'id' => $dataUser->id,
				'username' => $dataUser->username,
				'name' => $dataUser->name,
				'email' => $dataUser->email,
				'alamat' => $dataUser->alamat,
				'password' => md5($dataUser->password),
				'login' => TRUE
			);

			$this->session->set_userdata($data);
			$data['status'] = 1;
			echo json_encode($data);
		} else {
			$data['status'] = 0;
			echo json_encode($data);
		}
	}


	public function simpanDataPelanggan()
	{
		$checkData = $this->login->tambahUser();
		if ($checkData) {
			$data['status'] = 1;
			$data['keterangan'] = "Sukses menambah Data Anda";
			echo json_encode($data);
		} else {
			$data['status'] = 0;
			$data['keterangan'] = "Gagal menambah Data Anda";
			echo json_encode($data);
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/login_pelanggan'), 'refresh');
	}


}

/* End of file login_pelanggan.php */
