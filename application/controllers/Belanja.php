<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller 
{

	// load model 
	public function __construct()
	{
		parent::__construct();
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		//load helper random string
		$this->load->helper('string');
	}

	public function index()
	{
		$keranjang = $this->cart->contents();

		$data = array('title' 		=> 'Keranjang Belanja',
					  'keranjang' 	=> $keranjang,
					  'isi' 		=> 'belanja/list'
					  );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	//belanja sukses
	public function sukses()
	{
		$data = array('title' 		=> 'Sukses Belanja',
					  'isi' 		=> 'belanja/sukses'
					  );
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function add()
	{
		$id 			= $this->input->post('id');
		$qty 			= $this->input->post('qty');
		$price 			= $this->input->post('price');
		$name 			= $this->input->post('name');
		$redirect_page 	= $this->input->post('redirect_page');

		$data = array(
        'id'      		=> $id,
        'qty'     		=> $qty,
        'price'   		=> $price,
        'name'    		=> $name,
        );
		$this->cart->insert($data);
		//redirect
		redirect($redirect_page,'refresh');

	}
	//hapus semua cart
	public function hapus($rowid='')
	{	if($rowid)
		{
			$this->cart->remove($rowid);
			$this->session->set_flashdata('sukses', 'Data Shopping Cart telah dihapus');
			redirect(base_url('belanja'),'refresh'); 
		}else{
			$this->cart->destroy();
			$this->session->set_flashdata('sukses', 'Data Shopping Cart telah dihapus');
			redirect(base_url('belanja'),'refresh'); 
		}
		
	}
	//update cart
	public function update_cart($rowid)
	{
		if($rowid)
		{
			$data = array('rowid' 	=> $rowid,
						  'qty' 	=> $this->input->post('qty')
						);
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Data Shopping Cart telah diupdate');
			redirect(base_url('belanja'),'refresh'); 
		}else{
			redirect(base_url('belanja'),'refresh');
		}
	}

	//checkout
	public function checkout()
	{
		//check pelanggan sudah login atau belum
		//kondisi sudah login
		if($this->session->userdata('email'))
		{
			$email 			= $this->session->userdata('email');
			$nama_pelanggan = $this->session->userdata('nama_pelanggan');  
			$pelanggan 		= $this->pelanggan_model->sudah_login($email,$nama_pelanggan);

			$keranjang = $this->cart->contents();

			//validasi
			$valid = $this->form_validation;
			$valid->set_rules('nama_pelanggan','Nama Lengkap','required',
					array('required' => '%s harus diisi'));

			$valid->set_rules('telepon','Nomor Telepon','required',
					array('required' => '%s harus diisi'));

			$valid->set_rules('alamat','Alamat','required',
					array('required' => '%s harus diisi'));

			$valid->set_rules('email','Email','required|valid_email',
					array('required' => '%s harus diisi',
						  'valid_email' => '%s tidak valid'));

			if($valid->run()===FALSE)
		{

			$data = array('title' 		=> 'Checkout',
						  'keranjang' 	=>  $keranjang,
						  'pelanggan'   => 	$pelanggan,
						  'isi' 		=> 'belanja/checkout'
						  );
		$this->load->view('layout/wrapper', $data, FALSE);
		//masuk database
		}else{
		$i = $this->input;
		$data = array( 'id_pelanggan'       =>$pelanggan->id_pelanggan,  
					   'nama_pelanggan' 	=> $i->post('nama_pelanggan'),
					   'email' 				=> $i->post('email'),
					   'telepon' 			=> $i->post('telepon'),
					   'alamat' 			=> $i->post('alamat'),
					   'kode_transaksi' 	=> $i->post('kode_transaksi'),
					   'tanggal_transaksi' 	=> $i->post('tanggal_transaksi'),
					   'jumlah_transaksi' 	=> $i->post('jumlah_transaksi'),
					   'status_bayar' 		=> 'Belum',
					   'jumlah_bayar' 		=> $i->post('jumlah_bayar'),
					   'tanggal_post' 		=> date('Y-m-d H:i:s')
						);
		//proses masuk ke header transaksi
		$this->header_transaksi_model->add($data);
		//proses masuk ke table transaksi
		foreach($keranjang as $keranjang) {
			$sub_total = $keranjang['qty'] * $keranjang['price'];

			$data =array('id_pelanggan' 	=> 	$pelanggan->id_pelanggan,
						 'kode_transaksi' 	=> 	$i->post('kode_transaksi'),
						 'id_produk'		=>	$keranjang['id'],
						 'harga'			=>	$keranjang['price'],
						 'jumlah'			=>	$keranjang['qty'],
						 'total_harga'		=>  $sub_total,
						 'tanggal_transaksi'=> $i->post('tanggal_transaksi')
				);
		$this->transaksi_model->add($data);
	}
		//end proses masuk ke table transaksi
		// setelah masuk ke tabel transaksi maka cart kita kosongkan lagi
		$this->cart->destroy();	
		$this->session->set_flashdata('sukses', 'Checkout Berhasil');
		redirect(base_url('belanja/sukses'),'refresh');
		}
		//end masuk database
		}else{
		//kalo belum login, maka harus registrasi
		$this->session->set_flashdata('sukses', 'Silahkan Login atau Registrasi terlebih dahulu');
		redirect(base_url('registrasi'),'refresh'); 
		}
	}

}

/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */