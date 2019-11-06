<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class users_admin extends CI_Controller {


	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_mdl', 'pelanggan');
		
	}
	


	public function index()
	{
		$data['dataPelanggan'] = $this->pelanggan->getData();
		$data['konten'] = 'admin/v_pelanggan';
		$this->load->view('admin/template', $data);
		
	}

	public function getDataDetail($id)
	{
		$dataDetail = $this->pelanggan->detailData($id);
		echo json_encode($dataDetail); 
	}

	public function updatePelanggan()
	{
		$this->form_validation->set_rules('username', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('name', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('email', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('password', 'fieldlabel', 'trim|required');
		$this->form_validation->set_rules('alamat', 'fieldlabel', 'trim|required');

		
		if ($this->form_validation->run() == TRUE) {
			$prosesUpdate = $this->pelanggan->updateData();
			if ($prosesUpdate) {
				$this->session->set_flashdata('pesan', 'sukses update'); 
			}else {
				$this->session->set_flashdata('pesan', 'gagal update');  
			}
			redirect(base_url('index.php/users_admin'), 'refresh');
		} else {
			$this->session->set_flashdata('pesan', validation_errors());
			redirect(base_url('index.php/users_admin'), 'refresh');
		}
		
		
	}

	public function deletePel($id)
	{
		$prosesDelete = $this->pelanggan->deleteData($id);
		if ($prosesDelete) {
			$this->session->set_flashdata('pesan', 'Sukses Hapus Data');  
		}else {
			$this->session->set_flashdata('pesan', 'Gagal Hapus Data');
		}

		redirect(base_url('index.php/users_admin'), 'refresh');
	}

}

/* End of file users_admin.php */
