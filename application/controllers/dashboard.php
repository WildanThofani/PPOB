<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	public function index()
	{
<<<<<<< HEAD
		 $data['konten'] = 'user/v_dashboard';
		 $this->load->view('user/template', $data);
=======
		 $data['konten'] = 'v_dashboard';
		 $this->load->view('template', $data);
>>>>>>> 223a8922616330c41921f009f8e492ba9095b68e
	}

}

/* End of file dashboard.php */
