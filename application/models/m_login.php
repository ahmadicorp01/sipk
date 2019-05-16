<?php 
 
class M_login extends CI_Model{	
	function cek_login($table, $where){		
		return $this->db->select('*')->from($table)->where($where)->join('sipk_pengguna', 'sipk_user.nip_pengguna=sipk_pengguna.nip_pengguna')->get();
	}	

	function hak_akses ($nip_pengguna) {
		$data = $this->db->query("Select * From sipk_pengguna
			join sipk_laporan on sipk_pengguna.nip_pengguna=sipk_laporan.nip_pengguna
			join sipk_user on sipk_pengguna.nip_pengguna=sipk_user.nip_pengguna WHERE sipk_pengguna.nip_pengguna=$nip_pengguna");
		
		$data = $data->row();
		return $data->akses;
	}
}