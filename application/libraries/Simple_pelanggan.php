<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        //load model user
        $this->CI->load->model('pelanggan_model');
	}

	//login
	public function login($email,$password)
	{
		$check = $this->CI->pelanggan_model->login($email,$password);
		//jika ada data user, create session
		if($check){
			$id_pelanggan 	= $check->id_pelanggan;
			$nama_pelanggan = $check->nama_pelanggan;
			$email 			= $check->email;
			//session
			$this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
			$this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan);
			$this->CI->session->set_userdata('email',$email);
			//redirect ke admin page
			redirect(base_url('dashboard'),'refresh');

		}else{
			$this->CI->session->set_flashdata('warning', 'Username atau Password salah');
			redirect(base_url('masuk'),'refresh');
		}
	}
	//cek login
	public function cek_login()
	{
		if($this->CI->session->userdata('email') == "")
		{
			$this->CI->session->set_flashdata('warning', 'Anda Belum Login');
			redirect(base_url('masuk'),'refresh');
		}
	}
	public function logout()
	{
			$this->CI->session->unset_userdata('id_pelanggan');
			$this->CI->session->unset_userdata('nama_pelanggan');
			$this->CI->session->unset_userdata('email');

			$this->CI->session->set_flashdata('sukses', 'Anda Telah Logout');
			redirect(base_url('masuk'),'refresh');
	}

}

/* End of file Simple_pelanggan.php */
/* Location: ./application/libraries/Simple_pelanggan.php */
