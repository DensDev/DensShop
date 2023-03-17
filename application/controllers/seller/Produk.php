<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	//load model

	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->simple_login->cek_login();
	}

	public function index()
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 			= $this->user_model->detail($id_user);
		$produk = $this->produk_model->listing();
		$data =array('title' => 'Data Produk',
					 'produk'  => $produk,
					 'profile'  => $profile,
					 'isi'   => 'seller/produk/list'

			);
		$this->load->view('seller/layout/wrapper', $data, FALSE);
	}
	//gambar
	public function gambar($id_produk)
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 			= $this->user_model->detail($id_user);

		$produk = $this->produk_model->detail($id_produk);
		$gambar = $this->produk_model->gambar($id_produk);
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('judul_gambar','Judul Gambar','required',
				array('required' => '%s harus diisi'));

		if($valid->run()){
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';//dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
		
		$data =array('title'   	=> 'Add Gambar Produk:'.$produk->nama_produk,
					 'produk'	=>  $produk,
					 'gambar'	=>	$gambar,
					 'profile'	=>  $profile,
					 'error'   	=>  $this->upload->display_errors(),
					 'isi'     	=> 'admin/produk/gambar');

		$this->load->view('seller/layout/wrapper', $data, FALSE);
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());
		//Thumbnail
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
		$config['new_image']		= './assets/upload/image/thumbs/';
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		$config['width']         	= 250;
		$config['height']       	= 250;
		$config['thumb_marker'] 	= '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		//End Thumbnail
		$i = $this->input;

		$data = array( 'id_produk'		=> $id_produk,
						'judul_gambar'	=> $i->post('judul_gambar'),
					   'gambar' 		=> $upload_gambar['upload_data']['file_name']
						);
		$this->produk_model->add_gambar($data);
		$this->session->set_flashdata('sukses', 'Gambar Berhasil ditambahkan');
		redirect(base_url('seller/produk/gambar/'.$id_produk),'refresh');
	}
}
	$data =array(    'title'   	=> 'Add Gambar Produk:'.$produk->nama_produk,
					 'produk'	=>  $produk,
					 'profile'	=>  $profile,
					 'gambar'	=>	$gambar,
					 'isi'     	=> 'seller/produk/gambar');

		$this->load->view('seller/layout/wrapper', $data, FALSE);
	}
	//end gambar

	// add data
	public function add()
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 			= $this->user_model->detail($id_user);

		$kategori = $this->kategori_model->listing();
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_produk','Nama Produk','required',
				array('required' => '%s harus diisi'));
		$valid->set_rules('kode_produk','Kode Produk','required|is_unique[produk.kode_produk]',
		array('required' => '%s harus diisi',
			  'is_unique' => '%s sudah ada data, Buat Kode Produk Baru!'));

		if($valid->run()){
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';//dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
		
		$data =array('title'   => 'Add Produk',
					 'kategori'=>  $kategori,
					 'profile'		=>  $profile,
					 'error'   =>  $this->upload->display_errors(),
					 'isi'     => 'seller/produk/add');

		$this->load->view('seller/layout/wrapper', $data, FALSE);
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());
		//Thumbnail
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
		$config['new_image']		= './assets/upload/image/thumbs/';
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		$config['width']         	= 250;
		$config['height']       	= 250;
		$config['thumb_marker'] 	= '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		//End Thumbnail
		$i = $this->input;
		$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
		$data = array( 'id_user' 		=> $this->session->userdata('id_user'),
					   'id_kategori' 	=> $i->post('id_kategori'),
					   'kode_produk' 	=> $i->post('kode_produk'),
					   'nama_produk' 	=> $i->post('nama_produk'),
					   'slug_produk' 	=> $slug_produk,
					   'keterangan' 	=> $i->post('keterangan'),
					   'keywords' 		=> $i->post('keywords'),
					   'harga' 			=> $i->post('harga'),
					   'stok' 			=> $i->post('stok'),
					   'gambar' 		=> $upload_gambar['upload_data']['file_name'],
					   'berat' 			=> $i->post('berat'),
					   'ukuran' 		=> $i->post('ukuran'),
					   'status_produk' 	=> $i->post('status_produk'),
					   'tanggal_post' 	=> date('Y-m-d H:i:s')
						);
		$this->produk_model->add($data);
		$this->session->set_flashdata('sukses', 'Data Berhasil ditambahkan');
		redirect(base_url('seller/produk'),'refresh');
	}
}
	$data =array(    'title'   => 'Add Produk',
					 'kategori'=>  $kategori,
					 'profile'	   =>  $profile,
					 'isi'     => 'seller/produk/add');

		$this->load->view('seller/layout/wrapper', $data, FALSE);
}

	// edit data
	public function edit($id_produk)
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 			= $this->user_model->detail($id_user);
		//ambil data produk
		$produk = $this->produk_model->detail($id_produk);
		//ambil data kategori
		$kategori = $this->kategori_model->listing();
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama_produk','Nama Produk','required',
				array('required' => '%s harus diisi'));
		$valid->set_rules('kode_produk','Kode Produk','required',
		array('required' => '%s harus diisi'));

		if($valid->run()){
			// check jika gambar diganti
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';//dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
		//end validasi
		
		$data =array('title'   => 'Edit Produk: '.$produk->nama_produk,
					 'kategori'=>  $kategori,
					 'produk'  =>  $produk,
					 'profile'	   => $profile,
					 'error'   =>  $this->upload->display_errors(),
					 'isi'     => 'seller/produk/edit');

		$this->load->view('seller/layout/wrapper', $data, FALSE);
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());
		//Thumbnail
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './assets/upload/image/'.$upload_gambar['upload_data']['file_name'];
		$config['new_image']		= './assets/upload/image/thumbs/';
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		$config['width']         	= 250;
		$config['height']       	= 250;
		$config['thumb_marker'] 	= '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		//End Thumbnail
		$i = $this->input;
		$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
		$data = array( 'id_produk'		=> $id_produk,
					   'id_user' 		=> $this->session->userdata('id_user'),
					   'id_kategori' 	=> $i->post('id_kategori'),
					   'kode_produk' 	=> $i->post('kode_produk'),
					   'nama_produk' 	=> $i->post('nama_produk'),
					   'slug_produk' 	=> $slug_produk,
					   'keterangan' 	=> $i->post('keterangan'),
					   'keywords' 		=> $i->post('keywords'),
					   'harga' 			=> $i->post('harga'),
					   'stok' 			=> $i->post('stok'),
					   'gambar' 		=> $upload_gambar['upload_data']['file_name'],
					   'berat' 			=> $i->post('berat'),
					   'ukuran' 		=> $i->post('ukuran'),
					   'status_produk' 	=> $i->post('status_produk')
						);
		$this->produk_model->edit($data);
		$this->session->set_flashdata('sukses', 'Data telah diupdate');
		redirect(base_url('seller/produk'),'refresh');
	}} else { 
		//edit produk tanpa ubah gambar
		$i = $this->input;
		$slug_produk = url_title($this->input->post('nama_produk').'-'.$this->input->post('kode_produk'), 'dash', TRUE);
		$data = array( 'id_produk'		=> $id_produk,
					   'id_user' 		=> $this->session->userdata('id_user'),
					   'id_kategori' 	=> $i->post('id_kategori'),
					   'kode_produk' 	=> $i->post('kode_produk'),
					   'nama_produk' 	=> $i->post('nama_produk'),
					   'slug_produk' 	=> $slug_produk,
					   'keterangan' 	=> $i->post('keterangan'),
					   'keywords' 		=> $i->post('keywords'),
					   'harga' 			=> $i->post('harga'),
					   'stok' 			=> $i->post('stok'),
					   // 'gambar' 		=> $upload_gambar['upload_data']['file_name'],
					   'berat' 			=> $i->post('berat'),
					   'ukuran' 		=> $i->post('ukuran'),
					   'status_produk' 	=> $i->post('status_produk')
						);
		$this->produk_model->edit($data);
		$this->session->set_flashdata('sukses','Data telah diedit');
		redirect(base_url('seller/produk'),'refresh');
	}}
	//end masuk database
	$data =array(    'title'   => 'Edit Produk: '.$produk->nama_produk,
					 'kategori'=>  $kategori,
					 'produk'  =>  $produk,
					 'profile'	   =>  $profile,
					 'isi'     => 'admin/produk/edit');

		$this->load->view('seller/layout/wrapper', $data, FALSE);
	}
	//delete gambar 
	public function delete($id_produk)
	{
		//delete gambar
		$produk = $this->produk_model->detail($id_produk);
		unlink('./assets/upload/image/'.$produk->gambar);
		unlink('./assets/upload/image/thumbs/'.$produk->gambar);
		//end proses delete
		$data = array('id_produk' =>$id_produk);
		$this->produk_model->delete($data);
		$this->session->set_flashdata('sukses', 'Data telah dihapus');
		redirect(base_url('seller/produk'),'refresh');
	}
	//end proses

	public function delete_gambar($id_produk,$id_gambar)
	{
		//delete gambar
		$gambar = $this->produk_model->detail_gambar($id_gambar);
		unlink('./assets/upload/image/'.$gambar->gambar);
		unlink('./assets/upload/image/thumbs/'.$gambar->gambar);
		//end proses delete
		$data = array('id_gambar' =>$id_gambar);
		$this->produk_model->delete_gambar($data);
		$this->session->set_flashdata('sukses', 'Data Gambar telah dihapus');
		redirect(base_url('seller/produk/gambar/'.$id_produk),'refresh');
	}
}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */