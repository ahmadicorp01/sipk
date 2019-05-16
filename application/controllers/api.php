<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	function user_login($username, $password) {
		$where = array(
			'username' => $username,
			'password' => $password
		);

		$cek = $this->m_login->cek_login("sipk_user", $where);
		if($cek->num_rows() > 0){
 			$data = $cek->row_array();

			$datas = array(
				'nama' => $username,
				'id_user' => $data['id_user'],
				'nip_pengguna' => $data['nip_pengguna'],
				'status' => "login",
				'akses' => $data['akses']
				);

			$json = array(
				'status' => true,
				'data' => $datas
			);
 		} 
		else{
			$json = array(
					'status' => false,
					'data' => "Maaf Username atau Password yang Anda masukkan salah!"
				);
		}

		echo json_encode($json);
	}

	function user_detail($id_user){
		$where = array(
			'id_user' => $id_user
		);

		$cek = $this->m_login->cek_login("sipk_user", $where);
		if($cek->num_rows() > 0){
 			$data = $cek->row_array();

			$json = array(
				'status' => true,
				'data' => $data
			);
 		} 
		else{
			$json = array(
					'status' => false,
					'data' => "Maaf Data Tidak ada!"
				);
		}

		echo json_encode($json);
	}

	function user_lapor_daftar($id_user){
		$nip_pengguna =$this->m_user->get_pengguna_by_id_user($id_user);
		$cek = $this->m_laporan->get_laporan_by_nip_pengguna($nip_pengguna);
		$json = array(
				'status' => true,
				'data' => $cek
			);

		echo json_encode($json);
	}

	function user_notif($id){
		// $nip_pengguna =$this->m_user->get_pengguna_by_id_user($id_user);

		$cek = $this->m_laporan_tanggapan->get_user_notif($id);

		if ($cek) {

		$id_tanggapan = $cek->id_tanggapan;
		$this->m_laporan_tanggapan->update_data(array('id_tanggapan' => $id_tanggapan), array('notifikasi' => '1'));
			
		}

		$json = array(
				'status' => true,
				'data' => $cek
			);

		echo json_encode($json);
	}

	function user_lapor(){
		$data = $this->input->post();
		
		$this->m_laporan->tambah_data($data);

		$json = array(
				'status' => true,
				'data' => "Tambah Laporan Berhasil"
			);

		echo json_encode($json);
	}

	function user_upload_img()
	{
		$newFileName = uniqid('uploaded-', true); 
		$file_path = "./uploads/chat/";
		$temp = explode(".", $_FILES["laporan_file"]["name"]);
		$file_name = "u-" . $newFileName . ".". end($temp);
		$file_path = $file_path . $file_name;

		if (file_exists($file_path)) 
		unlink($file_path);
		if (move_uploaded_file($_FILES['laporan_file']['tmp_name'],$file_path)) {
			echo $file_name;
		}else{
			echo "default.jpg";
		}
		return $file_name;
	}

	function user_upload_img_chat()
	{
		$newFileName = uniqid('uploaded-', true); 
		$file_path = "./uploads/chat/";
		$temp = explode(".", $_FILES["gambar"]["name"]);
		$file_name = "u-" . $newFileName . ".". end($temp);
		$file_path = $file_path . $file_name;

		if (file_exists($file_path)) 
		unlink($file_path);
		if (move_uploaded_file($_FILES['gambar']['tmp_name'],$file_path)) {
			echo $file_name;
		}else{
			echo "default.jpg";
		}
		return $file_name;
	}

	public function user_tanggapan($id)
	{
		// $i = 0;
		// $data['hasil'] = $ret;
		// $data['notifikasi'] = $ret;
		// foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		// $data['notifikasi_n'] = $i;
		// //NOTIFIKASI
		$data = $this->m_laporan_tanggapan->ambil_data_by_id_laporan($id);
		// $data = $this->m_laporan_tanggapan->ambil_data_by_jabatan($jabatan);
		// if ($laporan->laporan_status == 1)
		// 	$this->m_laporan->update_data(array ('id_laporan'=> $id), array('laporan_status'=> 2));
		$json = array(
				'status' => true,
				'data' => $data
			);

		echo json_encode($json);	
	}

	function user_tanggapan_kirim(){
		$data = $this->input->post();

		// if (!$data['gambar']) {
		// 	$this->load->library('upload');


		// 	$config['encrypt_name'] = TRUE;
		// 	$config['upload_path'] = './uploads/chat/';
		//     $config['allowed_types'] = 'jpg|png|JPG|PNG|jpeg|JPEG|gif';
		//     $this->upload->initialize($config);
		//     if (!$this->upload->do_upload('gambar')) {
		//     	// print_r($this->upload->display_errors());
		//     	// exit;
		//     }

		//     $upload_data = $this->upload->data();
		// 	$data['gambar'] = $upload_data['file_name'];
		// }

		$this->m_laporan_tanggapan->tambah_data($data);
		$json = array(
				'status' => true,
				'data' => "Tambah Chat Berhasil"
			);

		echo json_encode($json);
	}

	function user_get_kategori(){
		$data = $this->m_kategori->ambil_data();

		$json = array(
				'status' => true,
				'data' => $data
			);

		echo json_encode($json);
	}
	
	public function user_parsing_keluhan($id)
	{
		// $i = 0;
		// $data['hasil'] = $ret;
		// $data['notifikasi'] = $ret;
		// foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		// $data['notifikasi_n'] = $i;
		// //NOTIFIKASI
		$data = $this->m_laporan->get_data_by_id_laporan($id);
		// if ($laporan->laporan_status == 1)
		// 	$this->m_laporan->update_data(array ('id_laporan'=> $id), array('laporan_status'=> 2));
		$json = array(
				'status' => true,
				'data' => $data
			);

		echo json_encode($json);	
	}

	//TAMBAH LAPORAN ADMIN
	function tambah_laporan(){
		$data = $this->input->post();
		
		if (!$data['laporan_file']) {
		$this->load->library('upload');


		$config['encrypt_name'] = TRUE;
		$config['upload_path'] = './uploads/chat/';
	    $config['allowed_types'] = 'jpg|png|JPG|PNG|jpeg|JPEG|gif';
	    $this->upload->initialize($config);
	    if (!$this->upload->do_upload('laporan_file')) {
	    	// print_r($this->upload->display_errors());
	    	// exit;
	   		 }

		    $upload_data = $this->upload->data();
			$data['laporan_file'] = $upload_data['file_name'];
		}
		$this->m_laporan->tambah_data($data,'sipk_laporan');
		//NOTIFIKASI POPUP DELETE
		$this->session->set_flashdata('bebastambah','SUKSES');
		redirect('admin/lihat_laporan');
	}

	function tambah_laporan_kepala(){
		$data = $this->input->post();
		
		if (!$data['laporan_file']) {
		$this->load->library('upload');


		$config['encrypt_name'] = TRUE;
		$config['upload_path'] = './uploads/chat/';
	    $config['allowed_types'] = 'jpg|png|JPG|PNG|jpeg|JPEG|gif';
	    $this->upload->initialize($config);
	    if (!$this->upload->do_upload('laporan_file')) {
	    	// print_r($this->upload->display_errors());
	    	// exit;
	   		 }

		    $upload_data = $this->upload->data();
			$data['laporan_file'] = $upload_data['file_name'];
		}

		$this->m_laporan->tambah_data($data,'sipk_laporan');
		//NOTIFIKASI POPUP DELETE
		$this->session->set_flashdata('bebastambah','SUKSES');
		redirect('kepalaphh/lihat_laporan');
	}

	function tambah_kategori_kepalaphh(){
		$data = $this->input->post();

		$this->m_kategori->tambah_data($data,'sipk_kategori');

		//NOTIFIKASI POPUP DELETE
		$this->session->set_flashdata('bebastambah','SUKSES');
		// $this->session->set_flashdata('message', 'Berhasil Hapus Data');
		redirect('kepalaphh/lihat_kategori');
	}

	function delete_kategori_kepalaphh($id){
		$this->m_kategori->delete_data($id, 'sipk_kategori');

		//NOTIFIKASI POPUP DELETE
		$this->session->set_flashdata('bebas','SUKSES');
		redirect('kepalaphh/lihat_kategori');
		// echo "<script type='text/javascript'>swal('Good job!', 'You clicked the button!', 'success')</script>";
	}
	
	function update_kategori_kepalaphh(){
	$kode_kategori =$this->input->post('kode_kategori');
	$nama_kategori =$this->input->post('nama_kategori');

	$data= array (
		'kode_kategori' => $kode_kategori,
		'nama_kategori' => $nama_kategori
	);

		$where = array(
			'kode_kategori' => $kode_kategori
		);
		$this->m_kategori->update_data($where,$data);

		//NOTIFIKASI POPUP DELETE
		$this->session->set_flashdata('bebas','SUKSES');

		redirect('kepalaphh/lihat_kategori');
	}
	
	function tambah_kategori(){
		$data = $this->input->post();

		$this->m_kategori->tambah_data($data,'sipk_kategori');

		$this->session->set_flashdata('bebastambah','SUKSES');
		redirect('admin/lihat_kategori');
	}

	function delete_kategori($id){
		$this->m_kategori->delete_data($id, 'sipk_kategori');

		//NOTIFIKASI POPUP DELETE
		$this->session->set_flashdata('bebas','SUKSES');
		redirect('admin/lihat_kategori');
	}
	
	function update_kategori(){
	$kode_kategori =$this->input->post('kode_kategori');
	$nama_kategori =$this->input->post('nama_kategori');

	$data= array (
		'kode_kategori' => $kode_kategori,
		'nama_kategori' => $nama_kategori
	);

		$where = array(
			'kode_kategori' => $kode_kategori
		);
		$this->m_kategori->update_data($where,$data);
		redirect('admin/lihat_kategori');
	}

	function tambah_tanggapan(){
		$data = $this->input->post();

		if (!$data['gambar']) {
			$this->load->library('upload');


			$config['encrypt_name'] = TRUE;
			$config['upload_path'] = './uploads/chat/';
		    $config['allowed_types'] = 'jpg|png|JPG|PNG|jpeg|JPEG|gif';
		    $this->upload->initialize($config);
		    if (!$this->upload->do_upload('gambar')) {
		    	// print_r($this->upload->display_errors());
		    	// exit;
		    }

		    $upload_data = $this->upload->data();
			$data['gambar'] = $upload_data['file_name'];
		}
		
		// $data = $this->input->post();

		$this->m_laporan_tanggapan->tambah_data($data, 'sipk_laporan_tanggapan');
		redirect($_SERVER['HTTP_REFERER']);
	}

	function tutup_laporan($id){
		$this->m_laporan->update_data(array ('id_laporan'=> $id), array('laporan_status'=> 3));
		redirect($_SERVER['HTTP_REFERER']);
	}

	function ambilchat(){
		$data = $this->input->post();
		$waktu = $data['waktu'];
		$id_laporan = $data['id_laporan'];
		// $waktu = "2019-04-28 12:10:03";
		// $id_laporan = 3;
		$chats = $this->m_laporan_tanggapan->ambil_chat($waktu, $id_laporan);

		$output = [];
		foreach ($chats as $chat) {
			$format_waktu = date("H:i | M:d", strtotime($chat->waktu));
			array_push($output, [
				'waktu' => $format_waktu,
				'chat' => $chat->tanggapan,
				'gambar' => $chat->gambar,
				'pengirim' => $chat->nama_pengguna
			]);
		}
		echo json_encode($output);
	}
	//COPY KE ONLINE//
	function update_pengguna_admin(){
	$nip_pengguna =$this->input->post('nip_pengguna');
	$nama_pengguna =$this->input->post('nama_pengguna');
	$perusahaan =$this->input->post('perusahaan');
	$jabatan =$this->input->post('jabatan');
	$no_ktp =$this->input->post('no_ktp');

	$data= array (
		'nip_pengguna' => $nip_pengguna,
		'nama_pengguna' => $nama_pengguna,
		'perusahaan' => $perusahaan,
		'jabatan' => $jabatan,
		'no_ktp' => $no_ktp
	);

		$where = array(
			'nip_pengguna' => $nip_pengguna
		);
		$this->m_pengguna->update_data($where,$data);

		//NOTIFIKASI POPUP DELETE
		$this->session->set_flashdata('bebas','SUKSES');

		redirect('admin/lihat_pengguna');
	}

	function tambah_pengguna_admin(){
		$data = $this->input->post();

		$this->m_pengguna->tambah_data($data,'sipk_pengguna');

		$this->session->set_flashdata('bebastambah','SUKSES');
		redirect('admin/lihat_pengguna');
	}

	function delete_pengguna_admin($id){
		$this->m_pengguna->delete_data($id, 'sipk_pengguna');

		//NOTIFIKASI POPUP DELETE
		$this->session->set_flashdata('bebas','SUKSES');
		redirect('admin/lihat_pengguna');
	}

	function update_ktp_admin(){
	$no_ktp =$this->input->post('no_ktp');
	$nama =$this->input->post('nama');
	$tempat_lahir =$this->input->post('tempat_lahir');
	$tanggal_lahir =$this->input->post('tanggal_lahir');
	$jenis_kelamin =$this->input->post('jenis_kelamin');
	$alamat =$this->input->post('alamat');
	$rt_rw =$this->input->post('rt_rw');
	$kelurahan =$this->input->post('kelurahan');
	$kecamatan =$this->input->post('kecamatan');
	$agama =$this->input->post('agama');

	$data= array (
		'no_ktp' => $no_ktp,
		'nama' => $nama,
		'tempat_lahir' => $tempat_lahir,
		'tanggal_lahir' => $tanggal_lahir,
		'jenis_kelamin' => $jenis_kelamin,
		'alamat' => $alamat,
		'rt_rw' => $rt_rw,
		'kelurahan' => $kelurahan,
		'kecamatan' => $kecamatan,
		'agama' => $agama
	);

		$where = array(
			'no_ktp' => $no_ktp
		);
		$this->m_ktp->update_data($where,$data);

		//NOTIFIKASI POPUP DELETE
		$this->session->set_flashdata('bebas','SUKSES');

		redirect('admin/lihat_ktp_pengguna');
	}

	function delete_ktp_admin($id){
		$this->m_ktp->delete_data($id, 'sipk_ktp');

		//NOTIFIKASI POPUP DELETE
		$this->session->set_flashdata('bebas','SUKSES');
		redirect('admin/lihat_ktp_pengguna');
	}

	function tambah_ktp_admin(){
		$data = $this->input->post();

		$this->m_ktp->tambah_data($data,'sipk_ktp');

		$this->session->set_flashdata('bebastambah','SUKSES');
		redirect('admin/lihat_ktp_pengguna');
	}
	function update_user_admin(){
	$id_user =$this->input->post('id_user');
	$nip_pengguna =$this->input->post('nip_pengguna');
	$username =$this->input->post('username');
	$password =$this->input->post('password');
	$akses =$this->input->post('akses');

	$data= array (
		'id_user' => $id_user,
		'nip_pengguna' => $nip_pengguna,
		'username' => $username,
		'password' => $password,
		'akses' => $akses
	);

		$where = array(
			'id_user' => $id_user
		);
		$this->m_user->update_data($where,$data);

		//NOTIFIKASI POPUP DELETE
		$this->session->set_flashdata('bebas','SUKSES');

		redirect('admin/lihat_user');
	}

	function delete_user_admin($id){
		$this->m_user->delete_data($id, 'sipk_user');

		//NOTIFIKASI POPUP DELETE
		$this->session->set_flashdata('bebas','SUKSES');
		redirect('admin/lihat_user');
	}

	function tambah_user_admin(){
		$data = $this->input->post();

		$this->m_user->tambah_data($data,'sipk_user');

		$this->session->set_flashdata('bebastambah','SUKSES');
		redirect('admin/lihat_user');
	}
	//COPY KE ONLINE//
}
