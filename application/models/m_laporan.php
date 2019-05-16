<?php if (! defined('BASEPATH')) 

	exit('no direct script access allowed');

/**
*/
class M_laporan extends CI_Model {
	
	public function ambil_data_kategori($kategori)
	{
		$data = $this->db->select('*')->from('sipk_laporan')->join('sipk_kategori','sipk_kategori.kode_kategori=sipk_laporan.kode_kategori')->join('sipk_pengguna','sipk_pengguna.nip_pengguna=sipk_laporan.nip_pengguna')->order_by('id_laporan', 'DESC');

		if ($kategori)
			$this->db->where('sipk_laporan.kode_kategori', $kategori);

		$data = $this->db->get();
		return $data->result();
	}

	public function ambil_data_by_id_laporan($id)
	{
		$data = $this->db->select('*')->from('sipk_laporan')
		->join('sipk_pengguna','sipk_pengguna.nip_pengguna=sipk_laporan.nip_pengguna')
		->where('id_laporan', $id)->get();
		return $data->row();
	}

	public function edit_data($where){
		return $this->db->get_where('sipk_laporan',$where);
	}

	public function update_data($where,$data){
		$this->db->where($where);
		$this->db->update('sipk_laporan', $data);
	}

	function delete_data($id) {
		$this->db->where('id_laporan', $id);
		$this->db->delete('sipk_laporan');
	}
	public function tambah_data($data){
		$this->db->insert('sipk_laporan', $data);
	}

	public function ambil_kategori(){
		$data = $this->db->get('sipk_kategori');
		return $data->result();
	}

	public function ambil_data(){
		$data = $this->db->select('*')->from('sipk_laporan')->join('sipk_kategori','sipk_kategori.kode_kategori=sipk_laporan.kode_kategori')->join('sipk_pengguna','sipk_pengguna.nip_pengguna=sipk_laporan.nip_pengguna')->get();

		return $data->result();
	}

	public function get_user_by_nip_pengguna($id)
	{
		return $this->db->get_where("sipk_pengguna", array('nip_pengguna' => $id))->row();
	}

	public function get_laporan_by_nip_pengguna($id)
	{
		$data = $this->db->select('*')->from('sipk_laporan')->join('sipk_kategori','sipk_laporan.kode_kategori=sipk_kategori.kode_kategori')->join('sipk_pengguna','sipk_laporan.nip_pengguna=sipk_pengguna.nip_pengguna')->where('sipk_laporan.nip_pengguna',$id)->get();
		return $data->result();
	}

	public function get_data_by_id_laporan($id){
		$data = $this->db->select('*')->from('sipk_laporan')->join('sipk_pengguna','sipk_laporan.nip_pengguna=sipk_pengguna.nip_pengguna')->where('id_laporan', $id)->get();
		return $data->row();
	}

	public function get_laporan_by_kategori_and_pengguna($varbulan,$vartahun)
	{
		$data = $this->db->select('*')->from('sipk_laporan')->join('sipk_kategori','sipk_laporan.kode_kategori=sipk_kategori.kode_kategori')->join('sipk_pengguna','sipk_laporan.nip_pengguna=sipk_pengguna.nip_pengguna')
		->where('month(waktu)', $varbulan)
		->where('year(waktu)', $vartahun)
		->get();
		return $data->result();
	}

	public function get_laporan_pending()
	{
		$where = array(
			'laporan_status' => "1"
		);
		$data = $this->db->select('*')->from('sipk_laporan')->where($where)->get();
		return $data->num_rows();
	}
	public function get_laporan_proses()
	{
		$where = array(
			'laporan_status' => "2"
		);
		$data = $this->db->select('*')->from('sipk_laporan')->where($where)->get();
		return $data->num_rows();
	}
	public function get_laporan_selesai()
	{
		$where = array(
			'laporan_status' => "3"
		);
		$data = $this->db->select('*')->from('sipk_laporan')->where($where)->get();
		return $data->num_rows();
	}

	public function get_laporan_kategori()
	{
		$data = $this->db->select('*')->from('sipk_laporan')->get();
		return $data->num_rows();
	}
}
