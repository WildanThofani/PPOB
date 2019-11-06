<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard_admin extends CI_Controller {

	public function index()
	{
		$data['konten'] = 'admin/v_admin';
		$this->load->view('admin/template', $data);
		
	}

}

/* End of file dashboard_admin.php */
