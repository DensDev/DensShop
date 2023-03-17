<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('produk.id_produk,produk.kode_produk,produk.nama_produk,produk.slug_produk,produk.keterangan,kategori.nama_kategori,produk.keywords,produk.harga,produk.harga,produk.stok,produk.gambar,produk.berat,produk.ukuran,produk.status_produk,produk.tanggal_post, tbl_user.id_user, count(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		$this->db->join('tbl_user', 'tbl_user.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 	'gambar.id_produk = produk.id_produk', 'left');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function home()
	{
		$this->db->select('produk.id_produk,produk.kode_produk,produk.nama_produk,produk.slug_produk,produk.keterangan,kategori.nama_kategori,produk.keywords,produk.harga,produk.harga,produk.stok,produk.gambar,produk.berat,produk.ukuran,produk.status_produk,produk.tanggal_post, tbl_user.id_user, count(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		$this->db->join('tbl_user', 'tbl_user.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 	'gambar.id_produk = produk.id_produk', 'left');
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit(12);
		$query = $this->db->get();
		return $query->result();
	}
	//read produk
	public function read($slug_produk)
	{
		$this->db->select('produk.id_produk,
						   produk.kode_produk,
						   produk.nama_produk,
						   produk.slug_produk,
						   produk.keterangan,
						   kategori.nama_kategori,
						   produk.keywords,
						   produk.harga,
						   produk.harga,
						   produk.stok,
						   produk.gambar,
						   produk.berat,
						   produk.ukuran,
						   produk.status_produk,
						   produk.tanggal_post, 
						   tbl_user.id_user, 
						   count(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		$this->db->join('tbl_user', 'tbl_user.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 	'gambar.id_produk = produk.id_produk', 'left');
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.slug_produk', $slug_produk);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	//produk
	public function produk($limit , $start)
	{
		$this->db->select('produk.id_produk,
						   produk.kode_produk,
						   produk.nama_produk,
						   produk.slug_produk,
						   produk.keterangan,
						   kategori.nama_kategori,
						   produk.keywords,
						   produk.harga,
						   produk.harga,
						   produk.stok,
						   produk.gambar,
						   produk.berat,
						   produk.ukuran,
						   produk.status_produk,
						   produk.tanggal_post, 
						   tbl_user.id_user, 
						   count(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		$this->db->join('tbl_user', 'tbl_user.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 	'gambar.id_produk = produk.id_produk', 'left');
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit , $start);
		$query = $this->db->get();
		return $query->result();
	}
	//total produk
	public function total_produk()
	{
		$this->db->select('count(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$query = $this->db->get();
		return $query->row();
	}

	//kategori
	public function kategori($id_kategori,$limit,$start)
	{
		$this->db->select('produk.id_produk,
						   produk.kode_produk,
						   produk.nama_produk,
						   produk.slug_produk,
						   produk.keterangan,
						   kategori.nama_kategori,
						   produk.keywords,
						   produk.harga,
						   produk.harga,
						   produk.stok,
						   produk.gambar,
						   produk.berat,
						   produk.ukuran,
						   produk.status_produk,
						   produk.tanggal_post, 
						   tbl_user.id_user, 
						   count(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		$this->db->join('tbl_user', 'tbl_user.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 	'gambar.id_produk = produk.id_produk', 'left');
		$this->db->where('produk.status_produk', 'Publish');
		$this->db->where('produk.id_kategori', $id_kategori);
		$this->db->group_by('produk.id_produk');
		$this->db->order_by('id_produk', 'desc');
		$this->db->limit($limit , $start);
		$query = $this->db->get();
		return $query->result();
	}
	//total kategori
	public function total_kategori($id_kategori)
	{
		$this->db->select('count(*) AS total');
		$this->db->from('produk');
		$this->db->where('status_produk', 'Publish');
		$this->db->where('id_kategori', $id_kategori);
		$query = $this->db->get();
		return $query->row();
	}




	//listing kategori
	public function listing_kategori()
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
						   produk.tanggal_post,
						   tbl_user.id_user, 
						   count(gambar.id_gambar) AS total_gambar');
		$this->db->from('produk');
		$this->db->join('tbl_user', 'tbl_user.id_user = produk.id_user', 'left');
		$this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
		$this->db->join('gambar', 	'gambar.id_produk = produk.id_produk', 'left');
		$this->db->group_by('produk.id_kategori');
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function detail($id_produk)
	{
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_produk', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	//gambar
	public function gambar($id_produk)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_produk', $id_produk);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	public function detail_gambar($id_gambar)
	{
		$this->db->select('*');
		$this->db->from('gambar');
		$this->db->where('id_gambar', $id_gambar);
		$this->db->order_by('id_gambar', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	//end gambar
	// add gambar
	public function add_gambar($data)
	{
		$this->db->insert('gambar', $data);
	}
	//end add gambar
	public function add($data)
	{
		$this->db->insert('produk', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->update('produk',$data);
	}
	public function delete($data)
	{
		$this->db->where('id_produk', $data['id_produk']);
		$this->db->delete('produk',$data);
	}

		public function delete_gambar($data)
	{
		$this->db->where('id_gambar', $data['id_gambar']);
		$this->db->delete('gambar',$data);
	}

}

/* End of file produk_model.php */
/* Location: ./application/models/produk_model.php */