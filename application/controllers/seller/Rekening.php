<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {

	//load model

	public function __construct()
	{
		parent::__construct();
		$this->load->model('rekening_model');

		$this->simple_login->cek_login();
	}

	public function index()
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 			= $this->user_model->detail($id_user);

		$rekening = $this->rekening_model->listing();
		$data =array('title' 	=> 'Data Rekening',
					 'rekening' => $rekening,
					 'profile'		=> $profile,
					 'isi'   	=> 'seller/rekening/list'

			);
		$this->load->view('seller/layout/wrapper', $data, FALSE);
	}

	// add data
	public function add()
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 			= $this->user_model->detail($id_user);
		//validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama_bank','Nama Bank','required',
				array('required' => '%s harus diisi'));

		$valid->set_rules('nomor_rekening','Nomor Rekening','required|is_unique[rekening.nomor_rekening]',
				array('required' => '%s harus diisi',
					   'is_unique' => '%s Nomor Rekening Sudah ada. Buat Nomor Rekening Baru!'
					));
		$valid->set_rules('nama_pemilik','Nama Pemilik Rekening','required',
				array('required' => '%s harus diisi'));
		

		if($valid->run()===FALSE)
		{


		$data =array('title' => 'Add Rekening',
					 'profile'  => $profile,
					 'isi'   => 'seller/rekening/add'

			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}else{
		$i = $this->input;

		$data = array( 'nama_bank'      	=>$i->post('nama_bank'),
					   'nomor_rekening'  	=> $i->post('nomor_rekening'),
					   'nama_pemilik' 	    => $i->post('nama_pemilik')
						);
		$this->rekening_model->add($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		redirect(base_url('seller/rekening'),'refresh');
	}
}

	// edit data
	public function edit($id_rekening)
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 			= $this->user_model->detail($id_user);

		$rekening = $this->rekening_model->detail($id_rekening);
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_bank','Nama Bank','required',
				array('required' => '%s harus diisi'));

		$valid->set_rules('nama_pemilik','Nama Pemilik Rekening','required',
				array('required' => '%s harus diisi'));

		if($valid->run()===FALSE)
		{


		$data =array('title' 	=> 'Edit Rekening',
					 'rekening' =>  $rekening,
					 'profile' 	=>	$profile,
					 'isi'   	=> 'seller/rekening/edit'

			);
		$this->load->view('seller/layout/wrapper', $data, FALSE);
	}else{
		$i = $this->input;
		$data = array( 
					   'id_rekening'    	=>$id_rekening,
					   'nama_bank'      	=>$i->post('nama_bank'),
					   'nomor_rekening'  	=> $i->post('nomor_rekening'),
					   'nama_pemilik' 	    => $i->post('nama_pemilik')
						);
		$this->rekening_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('seller/rekening'),'refresh');
	}

}
	public function delete($id_rekening)
	{
		$data = array('id_rekening' =>$id_rekening);
		$this->rekening_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('seller/rekening'),'refresh');
	}
}

/* End of file Rekening.php */
/* Location: ./application/controllers/seller/Rekening.php */