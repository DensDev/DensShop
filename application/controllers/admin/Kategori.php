<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

	//load model

	public function __construct()
	{
		parent::__construct();
		$this->load->model('kategori_model');

		$this->simple_login->cek_login();
	}

	public function index()
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 		= $this->user_model->detail($id_user);
		$kategori = $this->kategori_model->listing();
		$data =array('title' 		=> 'Data Kategori',
					 'kategori'  	=> $kategori,
					 'profile'  		=> $profile,
					 'isi'   		=> 'admin/kategori/list'

			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// add data
	public function add()
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 		= $this->user_model->detail($id_user);
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_kategori','Nama Kategori','required|is_unique[kategori.nama_kategori]',
				array('required' => '%s harus diisi',
					   'is_unique' => '%s Sudah ada. Buat Kategori Baru!'
					));

		

		if($valid->run()===FALSE)
		{


		$data =array('title' => 'Add Kategori',
					 'profile'  		=> $profile,
					 'isi'   => 'admin/kategori/add'

			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}else{
		$i = $this->input;
		$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);

		$data = array( 'slug_kategori'  => $slug_kategori,
					   'nama_kategori'  => $i->post('nama_kategori'),
					   'urutan' 	    => $i->post('urutan')
						);
		$this->kategori_model->add($data);
		$this->session->set_flashdata('sukses', 'Data telah ditambah');
		redirect(base_url('admin/kategori'),'refresh');
	}
}

	// edit data
	public function edit($id_kategori)
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 		= $this->user_model->detail($id_user);
		$kategori       = $this->kategori_model->detail($id_kategori);
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_kategori','Nama Kategori','required',
				array('required' => '%s harus diisi'));

		if($valid->run()===FALSE)
		{


		$data =array('title' => 'Edit Kategori',
					 'kategori'  =>  $kategori,
					 'profile'  =>  $profile,
					 'isi'   => 'admin/kategori/edit'

			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}else{
		$i = $this->input;
		$slug_kategori = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
		$data = array( 
					   'id_kategori'    => $id_kategori,
					   'slug_kategori'  => $slug_kategori,
					   'nama_kategori'  => $i->post('nama_kategori'),
					   'urutan' 	    => $i->post('urutan')
						);
		$this->kategori_model->edit($data);
		$this->session->set_flashdata('sukses', 'Kategori Berhasil diupdate');
		redirect(base_url('admin/kategori'),'refresh');
	}

}
	public function delete($id_kategori)
	{
		$data = array('id_kategori' =>$id_kategori);
		$this->kategori_model->delete($data);
		$this->session->set_flashdata('sukses', 'Kategori Berhasil dihapus');
		redirect(base_url('admin/kategori'),'refresh');
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */