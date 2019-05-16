<?php if (! defined('BASEPATH')) 

	exit('no direct script access allowed');

/**
*/
class M_laporan_tanggapan extends CI_Model {
	

	public function ambil_data(){
		$data = $this->db->get('sipk_laporan_tanggapan');
		return $data->result();
	}

	public function ambil_chat($waktu , $id_laporan){
		$data = $this->db->select ('*')->from('sipk_laporan_tanggapan')->join('sipk_pengguna','sipk_laporan_tanggapan.nip_pengguna=sipk_pengguna.nip_pengguna')->where('sipk_laporan_tanggapan.waktu >' , $waktu)->where('sipk_laporan_tanggapan.id_laporan' , $id_laporan)->order_by('waktu','ASC')->get();
		return $data->result();
	}

	public function ambil_data_by_id_laporan($id){
		$data = $this->db->select ('*')->from('sipk_laporan_tanggapan')->join('sipk_pengguna','sipk_laporan_tanggapan.nip_pengguna=sipk_pengguna.nip_pengguna')->order_by('id_tanggapan', 'ASC')->where('id_laporan', $id)->get();
		return $data->result();
	}

	public function ambil_data_by_jabatan($jabatan){
		$data = $this->db->select ('*')->from('sipk_laporan_tanggapan')->join('sipk_pengguna','sipk_laporan_tanggapan.nip_pengguna=sipk_pengguna.nip_pengguna')->order_by('jabatan', 'ASC')->where('jabatan', $jabatan)->get();
		return $data->result();
	}

	public function edit_data($where){
		return $this->db->get_where('sipk_laporan_tanggapan',$where);
	}

	public function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('sipk_laporan_tanggapan', $data);
	}

	function delete_data($id) {
		$this->db->where('id_tanggapan', $id);
		$this->db->delete('sipk_laporan_tanggapan');
	}
	
	public function tambah_data($data){
		$this->db->insert('sipk_laporan_tanggapan', $data);
	}
	//nip_pengguna diset 2 hanya untuk 1 akun operator saja belom bisa untuk semua
	public function get_user_notif($id){
		$data = $this->db->select('*')->from('sipk_laporan_tanggapan')->join('sipk_pengguna','sipk_laporan_tanggapan.nip_pengguna=sipk_pengguna.nip_pengguna')->order_by('id_tanggapan', 'DESC')
		// ->where(array('sipk_laporan_tanggapan.nip_pengguna' => '2' || '1', 'sipk_laporan_tanggapan.notifikasi' => '0'))
		->where("sipk_laporan_tanggapan.notifikasi = '0' AND (sipk_laporan_tanggapan.nip_pengguna = '1' OR sipk_laporan_tanggapan.nip_pengguna = '2')")
		->get();
		return $data->row();
	}

}
