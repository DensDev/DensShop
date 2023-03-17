<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inbox extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kontak_model');
	}

	public function index()
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 		= $this->user_model->detail($id_user);
		$this->kontak_model->update_status_kontak();
		$inbox 			= $this->kontak_model->get_all_inbox();
		$data =array('title' 		=> 'Data Kategori',
					 'profile'  	=> $profile,
					 'inbox'  		=> $inbox,
					 'isi'   		=> 'admin/inbox/list'

			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// public function reply()
	// {
	// 	$id_user 		= $this->session->userdata('id_user');
	// 	$profile 		= $this->user_model->detail($id_user);
	// 	$inbox 			= $this->kontak_model->get_all_inbox();
	// 	$send 			= $this->kontak_model->send_email($inbox_id);

	// 	//validasi
	// 	$valid = $this->form_validation;
	// 	$valid->set_rules('inbox_email','Email','required',
	// 			array('required' => '%s harus diisi'));

	// 	if($valid->run()===FALSE)
	// 	{

	// 	$data = array('title' 		=> 'Mailbox',
	// 				 'profile'  	=>  $profile,
	// 				 'inbox'  		=>  $inbox,
	// 				 'send'			=>	$send,
	// 				 'isi'   		=>  'admin/inbox/email'
	// 		);
	// 	$this->load->view('admin/layout/wrapper', $data, FALSE);
	// } else {
	// 	$i = $this->input;
	// 	$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
	// 	$data = array( 
	// 				   'inbox_id'    => $inbox_id,
	// 				   'slug_kategori'  => $slug_kategori,
	// 				   'nama_kategori'  => $i->post('nama_kategori'),
	// 				   'urutan' 	    => $i->post('urutan')
	// 					);
	// 	$this->kontak_model->edit($data);
	// 	$this->session->set_flashdata('sukses', 'Kategori Berhasil diupdate');
	// 	redirect(base_url('admin/kategori'),'refresh');
	// }


}

/* End of file Inbox.php */
/* Location: ./application/controllers/admin/Inbox.php */