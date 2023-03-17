<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//Listing
	public function listing()
	{
		$query = $this->db->get('konfigurasi');
		return $query->row();

	}
	//edit
	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi', $data);
	}

	public function nav_produk()
	{
		$this->db->select('produk.id_produk,
						   produk.kode_produk,
						   produk.nama_produk,
						   produk.slug_produk,
						   produk.keterangan,
						   kategori.nama_kategori,
						   kategori.slug_kategori,
						   produk.keywords,
						   produk.harga,
						   produk.harga,
						   produk.stok,
						   produk.gambar,
						   produk.berat,
						   produk.ukuran,
						   produk.status_produk,
						   produk.
						   tanggal_post');
		$this->db->from('produk');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('kategori.urutan', 'asc');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Konfigurasi_model.php */
/* Location: ./application/models/Konfigurasi_model.php */