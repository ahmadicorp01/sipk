<?php if (! defined('BASEPATH')) 

	exit('no direct script access allowed');

/**
*/
class M_user extends CI_Model {
	
	public function ambil_data(){
	$data = $this->db->select('*')->from('sipk_user')->join('sipk_pengguna','sipk_user.nip_pengguna = sipk_pengguna.nip_pengguna')->get();
	return $data->result();
	}
	
	public function edit_data($where){
	return $this->db->select('*')->from('sipk_user')->join('sipk_pengguna', 'sipk_user.nip_pengguna=sipk_pengguna.nip_pengguna')->where($where)->get();
	}

	public function update_data($where,$data){
	$this->db->where($where);
	$this->db->update('sipk_user', $data);
	}

	public function delete_data($id) {
	$this->db->where('id_user', $id);
	$this->db->delete('sipk_user');
	}
	
	public function tambah_data($data){
		$this->db->insert('sipk_user', $data);
	}

	public function get_user_by_nip_pengguna($id)
	{
		return $this->db->get_where("sipk_pengguna", array('nip_pengguna' => $id))->row();
	}

	public function get_pengguna_by_id_user($id)
	{
		return $this->db->get_where("sipk_user", array('id_user' => $id))->row()->nip_pengguna;
	}

}
