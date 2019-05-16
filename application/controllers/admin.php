<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');

		if ($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}

		if ($this->session->userdata('akses') != 2)
			redirect(base_url("login"));
	}

	public function index()
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data_kategori(0);

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		$data['operator'] = $this->m_pengguna->get_pengguna_operator();
		$data['lp_pending'] = $this->m_laporan->get_laporan_pending();
		$data['lp_proses'] = $this->m_laporan->get_laporan_proses();
		$data['lp_selesai'] = $this->m_laporan->get_laporan_selesai();
		$data['kategori'] = $this->m_laporan->get_laporan_kategori();

		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('dashboard_admin',$data);
		$this->load->view('footer');
	}

	public function lapor_keluhan()
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		//NOTIFIKASI
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		$data['nama'] = $this->m_user->get_user_by_nip_pengguna($this->session->userdata('nip_pengguna'))->nama_pengguna;
		$data['hasil'] = $this->m_kategori->ambil_data();
		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('tambah_keluhan',$data);
		$this->load->view('footer');
	}

	public function lihat_laporan()
	{	
		$i = 0;
		$ret = $this->m_laporan->ambil_data_kategori(0);

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;

		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		if (isset($_SESSION['bebastambah'])) {
			$data['notiftmbh'] = $this->session->flashdata('bebastambah');
		}

		$this->load->view('sidebar_admin');
		$this->load->view('header', $data);
		$this->load->view('tampil_laporan',$data);
		$this->load->view('footer');
	}

	public function tambah_kategori()
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('tambah_kategori');
		$this->load->view('footer');
	}

	public function lihat_kategori()
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		$data['hasil'] = $this->m_kategori->ambil_data();

		//NOTIFIKASI POPUP DELETE
		if (isset($_SESSION['bebas'])) {
			$data['notif'] = $this->session->flashdata('bebas');
		}

		if (isset($_SESSION['bebastambah'])) {
			$data['notiftmbh'] = $this->session->flashdata('bebastambah');
		}

		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('tampil_kategori',$data);
		$this->load->view('footer');
	}

	public function edit_kategori($id)
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		$where = array ('kode_kategori'=> $id);

		$data['hasil'] = $this->m_kategori->edit_data($where,'sipk_kategori')->result();
		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('edit_kategori',$data);
		$this->load->view('footer');
	}

	public function tanggapi_keluhan($id)
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		//NOTIFIKASI
		$data ['laporan'] = $laporan = $this->m_laporan->ambil_data_by_id_laporan($id);
		$data ['tanggapan'] = $this->m_laporan_tanggapan->ambil_data_by_id_laporan($id);
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));

		if ($laporan->laporan_status == 1)
			$this->m_laporan->update_data(array ('id_laporan'=> $id), array('laporan_status'=> 2));

		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('tanggapi_keluhan',$data);
		$this->load->view('footer');
	}

	//COPY KE ONLINE//
	public function lihat_pengguna()
	{	
		$i = 0;
		$ret = $this->m_laporan->ambil_data(0);
		$data['pengguna'] = $this->m_pengguna->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;

		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		if (isset($_SESSION['bebas'])) {
			$data['notif'] = $this->session->flashdata('bebas');
		}

		if (isset($_SESSION['bebastambah'])) {
			$data['notiftmbh'] = $this->session->flashdata('bebastambah');
		}

		$this->load->view('sidebar_admin');
		$this->load->view('header', $data);
		$this->load->view('tampil_pengguna',$data);
		$this->load->view('footer');
	}


	public function edit_pengguna($id)
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		$where = array ('nip_pengguna'=> $id);
		$data['pengguna'] = $this->m_pengguna->edit_data($where,'sipk_pengguna')->result();

		$data['noktp'] = $this->m_ktp->ambil_data_by_pengguna('sipk_ktp');

		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('edit_pengguna',$data);
		$this->load->view('footer');
	}

	public function tambah_pengguna()
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		$data['noktp'] = $this->m_ktp->ambil_data();
		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('tambah_pengguna');
		$this->load->view('footer');
	}

	public function lihat_ktp_pengguna()
	{	
		$i = 0;
		$ret = $this->m_laporan->ambil_data(0);
		$data['penggunaktp'] = $this->m_ktp->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;

		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		if (isset($_SESSION['bebas'])) {
			$data['notif'] = $this->session->flashdata('bebas');
		}

		if (isset($_SESSION['bebastambah'])) {
			$data['notiftmbh'] = $this->session->flashdata('bebastambah');
		}

		$this->load->view('sidebar_admin');
		$this->load->view('header', $data);
		$this->load->view('tampil_ktp_pengguna',$data);
		$this->load->view('footer');
	}

	public function data_diri_ktp($id)
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		$where = array ('no_ktp'=> $id);
		$data['penggunaktp'] = $this->m_ktp->edit_data($where,'sipk_ktp')->result();
		$data['noktp'] = $this->m_ktp->ambil_data_by_pengguna('sipk_ktp');

		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('data_diri_ktp',$data);
		$this->load->view('footer');
	}

	public function edit_pengguna_ktp($id)
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		$where = array ('no_ktp'=> $id);
		$data['penggunaktp'] = $this->m_ktp->edit_data($where,'sipk_ktp')->result();

		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('edit_pengguna_ktp',$data);
		$this->load->view('footer');
	}
	public function tambah_pengguna_ktp()
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		$data['noktp'] = $this->m_ktp->ambil_data();
		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('tambah_pengguna_ktp');
		$this->load->view('footer');
	}
	public function lihat_user()
	{	
		$i = 0;
		$ret = $this->m_laporan->ambil_data(0);
		$data['user'] = $this->m_user->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;

		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		if (isset($_SESSION['bebas'])) {
			$data['notif'] = $this->session->flashdata('bebas');
		}

		if (isset($_SESSION['bebastambah'])) {
			$data['notiftmbh'] = $this->session->flashdata('bebastambah');
		}

		$this->load->view('sidebar_admin');
		$this->load->view('header', $data);
		$this->load->view('tampil_user_pengguna',$data);
		$this->load->view('footer');
	}
	public function edit_user($id)
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data();
		$data['pengguna'] = $this->m_pengguna->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		$where = array ('id_user'=> $id);
		$data['user'] = $this->m_user->edit_data($where,'sipk_user')->result();

		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('edit_user',$data);
		$this->load->view('footer');
	}

	public function tambah_user()
	{
		$i = 0;
		$ret = $this->m_laporan->ambil_data();

		$data['hasil'] = $ret;
		$data['notifikasi'] = $ret;
		
		foreach ($ret as $u) if ($u->laporan_status == 1) $i++;
		$data['notifikasi_n'] = $i;
		$data['nama_pengguna'] = $this->m_pengguna->get_user_from_pengguna_id($this->session->userdata('nip_pengguna'));
		//NOTIFIKASI
		$data['pengguna'] = $this->m_pengguna->ambil_data();
		$this->load->view('sidebar_admin');
		$this->load->view('header',$data);
		$this->load->view('tambah_user');
		$this->load->view('footer');
	}
	//COPY KE ONLINE//
}
