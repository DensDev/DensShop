<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kontak_model');
	}

	public function index()
	{
		$valid = $this->form_validation;
		$valid->set_rules('inbox_nama','Nama Lengkap','required',
				array('required' => '%s harus diisi'));

		$valid->set_rules('inbox_email','Email','required|valid_email',
				array('required' => '%s harus diisi',
					  'valid_email' => '%s tidak valid'));

		$valid->set_rules('inbox_kontak','kontak','required',
			array('required' => '%s harus diisi'));

		$valid->set_rules('inbox_subject','subjek','required',
			array('required' => '%s harus diisi'));

		if($valid->run()===FALSE)
		{

		$data = array('title' => 'Contact Us',
					  'isi'   => 'kontak/list'

			);
		$this->load->view('layout/wrapper', $data, FALSE);
	//masuk database
	}else{
		$i = $this->input;
		$data = array( 'inbox_nama'			=> $i->post('inbox_nama'),
					   'inbox_email' 		=> $i->post('inbox_email'),
					   'inbox_kontak' 		=> $i->post('inbox_kontak'),
					   'inbox_subject' 		=> $i->post('inbox_subject'),
					   'inbox_pesan' 		=> $i->post('inbox_pesan'),
						);
		$this->kontak_model->kirim_pesan($data);
		$this->session->set_flashdata('sukses', 'Terima kasih telah menghubungi kami');
		redirect(base_url('kontak'),'refresh');
	}
	//end masuk database


		$data = array( 'title' => 'Contact Us',
						'isi' => 'kontak/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Kontak.php */
/* Location: ./application/controllers/Kontak.php */