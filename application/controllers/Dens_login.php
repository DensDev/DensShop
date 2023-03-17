<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dens_login extends CI_Controller {


	// Halaman Login
	public function index()
	{
		//validasi
		$this->form_validation->set_rules('username','Username','required',
			array('required' => '%s harus diisi'));
		$this->form_validation->set_rules('password','Password','required',
			array('required' => '%s harus diisi'));
		

		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			//proses ke simple login
			$this->simple_login->login($username,$password);
		}
		//End Validasi

		$data = array( 'title' => 'Login ');
		$this->load->view('login/list', $data, FALSE);
	}

	//logout
	public function logout()
	{
		$this->simple_login->logout();
	}

}

/* End of file Dens_login.php */
/* Location: ./application/controllers/Dens_login.php */