<?php if (! defined('BASEPATH')) 

	exit('no direct script access allowed');

/**
*/
class M_kategori extends CI_Model {
	

	public function ambil_data(){
		$data = $this->db->get('sipk_kategori');
		return $data->result();
	}

	public function edit_data($where){
		return $this->db->get_where('sipk_kategori',$where);
	}

	public function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('sipk_kategori', $data);
	}

	function delete_data($id) {
		$this->db->where('kode_kategori', $id);
		$this->db->delete('sipk_kategori');
	}
	
	public function tambah_data($data){
		$this->db->insert('sipk_kategori', $data);
	}


}
