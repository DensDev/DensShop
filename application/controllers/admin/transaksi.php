<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		$this->load->model('rekening_model');
		$this->load->model('konfigurasi_model');
	}

	public function index()
	{
		$id_user 			= $this->session->userdata('id_user');
		$profile 			= $this->user_model->detail($id_user);
		$header_transaksi 	= $this->header_transaksi_model->listing();
		$data = array( 'title'   			=> 'Data Transaksi',
					   'header_transaksi'	=>	$header_transaksi,
					   'profile'			=>	$profile,
					   'isi'				=>  'admin/transaksi/list'
						 );
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//detail
	public function detail($kode_transaksi)
	{
		$id_user 			= $this->session->userdata('id_user');
		$profile 			= $this->user_model->detail($id_user);
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);

		$data = array('title' 				=> 'Riwayat Belanja',
					   'header_transaksi' 	=> $header_transaksi,
					   'transaksi' 			=> $transaksi,
					   'profile'			=>	$profile,
					   'isi'   				=> 'admin/transaksi/detail'

			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//cetak
	public function cetak($kode_transaksi)
	{
		$id_user 			= $this->session->userdata('id_user');
		$profile 			= $this->user_model->detail($id_user);
		$header_transaksi 	= $this->header_transaksi_model->kode_transaksi($kode_transaksi);
		$transaksi 			= $this->transaksi_model->kode_transaksi($kode_transaksi);
		$site 				= $this->konfigurasi_model->listing();


		$data = array('title' 				=> 'Riwayat Belanja',
					   'header_transaksi' 	=> $header_transaksi,
					   'transaksi' 			=> $transaksi,
					   'profile'			=> $profile,
					   'site'				=> $site,

			);
		$this->load->view('admin/transaksi/cetak', $data, FALSE);
	}

}

/* End of file transaksi.php */
/* Location: ./application/controllers/admin/transaksi.php */