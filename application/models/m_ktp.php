<?php if (! defined('BASEPATH')) 

	exit('no direct script access allowed');

/**
*/
class M_ktp extends CI_Model {
	

	public function ambil_data(){
		$data = $this->db->get('sipk_ktp');
		return $data->result();
	}

	public function ambil_data_by_pengguna(){
		$data = $this->db->select('*')->from('sipk_ktp')->join('sipk_pengguna','sipk_ktp.no_ktp=sipk_pengguna.no_ktp')->get();
		return $data->result();
	}

	public function edit_data($where){
		return $this->db->get_where('sipk_ktp',$where);
	}

	public function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('sipk_ktp', $data);
	}

	function delete_data($id) {
		$this->db->where('no_ktp', $id);
		$this->db->delete('sipk_ktp');
	}
	
	public function tambah_data($data){
		$this->db->insert('sipk_ktp', $data);
	}


}
