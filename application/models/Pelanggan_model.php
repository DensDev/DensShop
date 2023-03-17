<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	
		public function total_pelanggan()
	{
		$this->db->select('count(*) AS total');
		$this->db->from('customer');
		$query = $this->db->get();
		return $query->row();
	}
	public function login($email,$password)
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where(array('email' =>$email,
								'password' =>SHA1($password)));
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function detail($id_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('id_pelanggan', $id_pelanggan);
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	//pelanggan sudah login
	public function sudah_login($email,$nama_pelanggan)
	{
		$this->db->select('*');
		$this->db->from('customer');
		$this->db->where('email', $email);
		$this->db->where('nama_pelanggan', $nama_pelanggan);
		$this->db->order_by('id_pelanggan', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('customer', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->update('customer',$data);
	}
	public function delete($data)
	{
		$this->db->where('id_pelanggan', $data['id_pelanggan']);
		$this->db->delete('customer',$data);
	}
	

}

/* End of file Pelanggan_model.php */
/* Location: ./application/models/Pelanggan_model.php */