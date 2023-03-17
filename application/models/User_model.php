<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function listing()
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

	//login
	public function login($username,$password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where(array('username' =>$username,
								'password' =>SHA1($password)));
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

		//hak akses
	public function hak_akses($username,$password,$akses_user)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where(array('username' =>$username,
								'password' =>SHA1($password),
								'akses_user'=> $akses_user));
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function detail($id_user)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where('id_user', $id_user);
		$this->db->order_by('id_user', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

	public function add($data)
	{
		$this->db->insert('tbl_user', $data);
	}

	public function edit($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->update('tbl_user',$data);
	}
	public function delete($data)
	{
		$this->db->where('id_user', $data['id_user']);
		$this->db->delete('tbl_user',$data);
	}

}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */