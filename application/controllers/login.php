<?php if (! defined('BASEPATH')) 

	exit('no direct script access allowed');

/**
* 
*/
class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');

	}

	function index(){
		if ($this->session->userdata('status') == "login"){
			if ($this->session->userdata('akses') == 1)
 				redirect(base_url('kepalaphh'));
 			else if ($this->session->userdata('akses') == 2)
 				redirect(base_url('admin'));
		}

		$this->load->view('login');
		
	}

	function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);

		$cek = $this->m_login->cek_login("sipk_user",$where);
		if($cek->num_rows() > 0){
 			$data=$cek->row_array();

			$data_session = array(
				'nama' => $username,
				'nip_pengguna' => $data['nip_pengguna'],
				'status' => "login",
				'akses' => $data['akses']
				);
 
			$this->session->set_userdata($data_session);
 			
 			if ($data['akses'] == 1)
 				redirect(base_url('kepalaphh'));
 			else if ($data['akses'] == 2)
 				redirect(base_url('admin'));
 			// else if ($data['akses'] == 3)
 			// 	redirect(base_url('anggotaproyek'));

			// redirect(base_url("admin"));
 		} 
		else{
			$this->session->set_flashdata('gagallogin', '<div class="alert alert-danger">
  					Maaf Username atau Password Yang Anda Masukkan Salah!
  					
				</div>');
			redirect(base_url('login'));
		}
	}
 
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}