<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class login_admin extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_admin_mdl', 'admin');
		
	}
	


	public function index()
	{
		$this->load->view('admin/v_login_admin');
		
	}


	public function loginAdmin()
	{
		$login = $this->admin->loginAdmin();
		if ($login->num_rows()>0) {
			$dataAdmin = $login->row();
			$data = array(
				'id_admin' => $dataAdmin->id_admin,
				'username' => $dataAdmin->username,
				'password' => $dataAdmin->password,
				'nama_admin' => $dataAdmin->nama_admin,
				'id_level' => $dataAdmin->id_level,
				'login' => TRUE
			);
			$this->session->set_userdata($data);
			$data['status'] = 1;
			echo json_encode($data);
			
		}else {
			$data['status'] = 0;
			echo json_encode($data);
		}

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('index.php/login_admin'), 'refresh');
	}


}

/* End of file login_admin.php */
