<?php if (! defined('BASEPATH')) 

	exit('no direct script access allowed');

/**
*/
class M_pengguna extends CI_Model {
	

	public function ambil_data(){
		$data = $this->db->get('sipk_pengguna');
		return $data->result();
	}

	public function edit_data($where){
		return $this->db->select('*')->from('sipk_pengguna')->join('sipk_ktp', 'sipk_pengguna.no_ktp=sipk_ktp.no_ktp')->where($where)->get();
	}

	public function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('sipk_pengguna', $data);
	}

	function delete_data($id) {
		$this->db->where('nip_pengguna', $id);
		$this->db->delete('sipk_pengguna');
	}
	
	public function tambah_data($data){
		$this->db->insert('sipk_pengguna', $data);
	}
	public function ambil_data_id($id){
	return $this->db->get_where("sipk_pengguna", array('nip_pengguna' => $id))->row();
	}

	function get_user_from_pengguna_id($nip_pengguna){
	return $this->db->query("Select * From sipk_pengguna
	WHERE nip_pengguna=$nip_pengguna")->result();
	}
	function get_pengguna_operator(){
		$where = array(
			'jabatan' => "3"
		);
		$data = $this->db->select('*')->from('sipk_pengguna')->where($where)->get();
		return $data->num_rows();
	}

	function get_pengguna_admin(){
		$where = array(
			'jabatan' => "2"
		);
		$data = $this->db->select('*')->from('sipk_pengguna')->where($where)->get();
		return $data->num_rows();
	}

	public function ambil_data_ktp(){
		$data = $this->db->get('sipk_ktp');
		return $data->result();
	}

	public function ambil_data_by_pengguna_ktp(){
		$data = $this->db->select('*')->from('sipk_ktp')->join('sipk_pengguna','sipk_ktp.no_ktp=sipk_pengguna.no_ktp')->get();
		return $data->result();
	}

	public function edit_data_ktp($where){
		return $this->db->get_where('sipk_ktp',$where);
	}

	public function update_data_ktp($where,$data){
		$this->db->where($where);
		$this->db->update('sipk_ktp', $data);
	}

	function delete_data_ktp($id) {
		$this->db->where('no_ktp', $id);
		$this->db->delete('sipk_ktp');
	}
	
	public function tambah_data_ktp($data){
		$this->db->insert('sipk_ktp', $data);
	}

}
