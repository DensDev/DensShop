<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function kirim_pesan($data)
	{
		$this->db->insert('tbl_inbox', $data);
	}

	function update_status_kontak(){
		$hsl=$this->db->query("UPDATE tbl_inbox SET inbox_status='0'");
		return $hsl;
	}

		public function get_all_inbox()
	{
		$this->db->select('*', date('d-m-Y',strtotime('inbox_tanggal')));
		$this->db->from('tbl_inbox');
		$this->db->order_by('inbox_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function send_email($inbox_id)
	{
		$this->db->select('*', date('d-m-Y',strtotime('inbox_tanggal')));
		$this->db->from('tbl_inbox');
		$this->db->where('inbox_id', $inbox_id);
		$this->db->order_by('inbox_id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}

}

/* End of file Kontak_model.php */
/* Location: ./application/models/Kontak_model.php */