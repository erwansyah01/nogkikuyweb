<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Model {
	public function belum()
	{
		$sql = "SELECT * FROM pesanan WHERE status = 0";
		$query = $this->db->query($sql);
    	return $query->num_rows();
	}
	public function sudah()
	{
		$sql = "SELECT * FROM pesanan WHERE status = 1";
		$query = $this->db->query($sql);
    	return $query->num_rows();
	}
	public function tampil_data(){
		$this->db->select('*, menu.gambar AS gambar_menu');
		$this->db->from('menu');
		$this->db->join('cafe', 'menu.id_cafe = cafe.id_cafe');
		return $this->db->get();
	}

	public function tambah_menu($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_menu($where,$table){
		$this->db->select('*, menu.gambar AS gambar_menu');
		$this->db->from($table);
		$this->db->join('cafe', 'menu.id_cafe = cafe.id_cafe');
		$this->db->where($where);
		return $this->db->get();
	}

	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);

	}
	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
}

/* End of file menu.php */
/* Location: ./application/models/menu.php */