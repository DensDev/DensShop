<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	//load model

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');

		$this->simple_login->cek_login();
	}

	public function index()
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 			= $this->user_model->detail($id_user);
		$user = $this->user_model->listing();
		$data =array('title' => 'Data Users',
					 'user'  => $user,
					 'profile'=> $profile,
					 'isi'   => 'admin/user/list'

			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// add data
	public function add()
	{	
		$id_user 		= $this->session->userdata('id_user');
		$profile 			= $this->user_model->detail($id_user);
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama Lengkap','required',
				array('required' => '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
				array('required' => '%s harus diisi',
					  'valid_email' => '%s tidak valid'));

		$valid->set_rules('username','Username','required|min_length[6]|max_length[32]|is_unique[tbl_user.username]',
				array('required' => '%s harus diisi',
					  'min_length '=>'%s minimal 6 karakter',
					  'max_length' =>'%s maksimal 32 karakter',
					  'is_unique'  => '%s sudah ada. Buat Username Baru. '));

		$valid->set_rules('password','Password','required',
			array('required' => '%s harus diisi'));

		if($valid->run()===FALSE)
		{


		$data =array('title' => 'Add Users',
					 'profile'	 => $profile,
					 'isi'   => 'admin/user/add'

			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}else{
		$i = $this->input;
		$data = array( 'nama' => $i->post('nama'),
					   'email' => $i->post('email'),
					   'username' => $i->post('username'),
					   'password' => sha1($i->post('password')),
					   'akses_user' => $i->post('akses_level')
						);
		$this->user_model->add($data);
		redirect(base_url('admin/user'),'refresh');
	}
}

	// edit data
	public function edit($id_user)
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile = $this->user_model->detail($id_user);
		$user = $this->user_model->detail($id_user);
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama Lengkap','required',
				array('required' => '%s harus diisi'));

		$valid->set_rules('email','Email','required|valid_email',
				array('required' => '%s harus diisi',
					  'valid_email' => '%s tidak valid'));

		$valid->set_rules('password','Password','required',
			array('required' => '%s harus diisi'));

		if($valid->run()===FALSE)
		{


		$data =array('title' 	=> 'Edit Users',
					 'profile' 	=>  $profile,
					 'user'   	=> 	$user,
					 'isi'   	=> 'admin/user/edit'

			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}else{
		$i = $this->input;
		$data = array( 
					   'id_user' =>$id_user,
					   'nama' => $i->post('nama'),
					   'email' => $i->post('email'),
					   'username' => $i->post('username'),
					   'akses_user' => $i->post('akses_user')
						);
		$this->user_model->edit($data);
		redirect(base_url('admin/user'),'refresh');
	}

}	
	public function profile()
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 		= $this->user_model->detail($id_user);

		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama Lengkap','required',
				array('required' => '%s harus diisi'));

		if($valid->run()===FALSE)
		{

		$data =array('title' => 'Profile User',
					 'profile'  => $profile,
					 'isi'   => 'admin/user/profile'

			);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}else{
		$i = $this->input;
		//jika password lebih dari 6 karakter maka password diganti
		if(strlen($i->post('password')) > 6)
		{

		$data = array( 'id_user' =>$id_user,
					   'nama' => $i->post('nama'),
					   'email' => $i->post('email'),
					   'username' => $i->post('username'),
					   'password' => sha1($i->post('password')),
						);
		} else{
		//jika password kurang dari 6 karakter maka password ga diganti
				$data = array( 'id_user' =>$id_user,
							   'nama' => $i->post('nama'),
							   'email' => $i->post('email'),
							   'username' => $i->post('username'),
						);	
		}
		//end data update
		$this->user_model->edit($data);
		$this->session->set_flashdata('sukses', 'Update Profil Berhasil');
		redirect(base_url('admin/user/profile'),'refresh');
	}
}

	//konfigurasi logo
	public function foto_profil()
	{
		$id_user 		= $this->session->userdata('id_user');
		$profile 		= $this->user_model->detail($id_user);
		//validasi
		$valid = $this->form_validation;
		$valid->set_rules('nama','Nama Lengkap','required',
				array('required' => '%s harus diisi'));
		
		if($valid->run()){
			// check jika gambar diganti
			if(!empty($_FILES['gambar']['name'])) {

			$config['upload_path'] 		= './assets/upload/image/profile';
			$config['allowed_types'] 	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400';//dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload('gambar')){
		
		$data =array('title'			=> 'Foto',
					 'profile'			=>  $profile,
					 'error'   			=>  $this->upload->display_errors(),
					 'isi'     			=> 'admin/user/foto');

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}else{
		$upload_gambar = array('upload_data' => $this->upload->data());
		//Thumbnail
		$config['image_library'] 	= 'gd2';
		$config['source_image'] 	= './assets/upload/image/profile/'.$upload_gambar['upload_data']['file_name'];
		$config['new_image']		= './assets/upload/image/thumbs/profile/';
		$config['create_thumb'] 	= TRUE;
		$config['maintain_ratio'] 	= TRUE;
		$config['width']         	= 250;
		$config['height']       	= 250;
		$config['thumb_marker'] 	= '';

		$this->load->library('image_lib', $config);

		$this->image_lib->resize();
		//End Thumbnail
		$i = $this->input;
		$data = array( 'id_user' 			=> $profile->id_user,
					    'nama' 				=> $i->post('nama'),
					   	'gambar' 			=> $upload_gambar['upload_data']['file_name'],
					   
						);
		$this->user_model->edit($data);
		$this->session->set_flashdata('sukses','Data telah diupdate');
		redirect(base_url('admin/user/profile'),'refresh');
	}} else { 
		//edit produk tanpa ubah gambar
		$i = $this->input;
		$data = array( 'id_user' 			=> $profile->id_user,
					   'nama' 				=> $i->post('nama'),
					   	//'logo' 			=> $upload_gambar['upload_data']['file_name'],
					   
						);
		$this->user_model->edit($data);
		$this->session->set_flashdata('sukses','Data telah diupdate');
		redirect(base_url('admin/user/profile'),'refresh');
	}}
	$data =array(	'title'				=> 'Foto User:',
					 'profile'			=>  $profile,
					 'isi'     			=> 'admin/user/foto');

		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//end masuk database

	public function delete($id_user)
	{
		$data = array('id_user' =>$id_user);
		$this->user_model->delete($data);
		redirect(base_url('admin/user'),'refresh');
	}
}

/* End of file User.php */
/* Location: ./application/controllers/admin/User.php */