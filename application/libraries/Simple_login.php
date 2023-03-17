<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        //load model user
        $this->CI->load->model('user_model');
	}

	//login
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		//jika ada data user, create session
		if($check){
			$id_user 	 = $check->id_user;
			$nama 		 = $check->nama;
			$akses_level = $check->akses_user;
			//session
			$this->CI->session->set_userdata('id_user',$id_user);
			$this->CI->session->set_userdata('nama',$nama);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('akses_user',$akses_level);

			redirect(base_url('admin/dashboard'),'refresh');
			}else{
			$this->CI->session->set_flashdata('warning', 'Username atau Password salah');
			redirect(base_url('dens_login'),'refresh');
			}	
		}
	
	//cek login
	public function cek_login()
	{
		if($this->CI->session->userdata('username') == "")
		{
			$this->CI->session->set_flashdata('warning', 'Anda Belum Login');
			redirect(base_url('dens_login'),'refresh');
		}
	}
	public function logout()
	{
			$this->CI->session->unset_userdata('id_user');
			$this->CI->session->unset_userdata('nama');
			$this->CI->session->unset_userdata('username');
			$this->CI->session->unset_userdata('akses_level');

			$this->CI->session->set_flashdata('suskes', 'Anda Telah Logout');
			redirect(base_url('dens_login'),'refresh');
	}

}

/* End of file Simple_login.php */
/* Location: ./application/libraries/Simple_login.php */
