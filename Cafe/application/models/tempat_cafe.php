<?php
class tempat_cafe extends CI_Model{
	public function total()
	{
		$sql = "SELECT * FROM cafe";
		$query = $this->db->query($sql);
    	return $query->num_rows();
	}
	public function tampil_data(){
		return $this->db->get('cafe');
	}

	public function tambah_cafe($data,$table){
		$this->db->insert($table,$data);
	}

	public function edit_cafe($where,$table){
		return $this->db->get_where($table,$where);
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
	public function update_meja($where,$data,$table)
	{
		$this->db->where('id_cafe',$where);
		$this->db->update($table,array('meja' => $data));
	}
	public function detail_cafe($id_cafe)
	{
		$result = $this->db->where('id_cafe',$id_cafe)->get('cafe');
		if($result->num_rows() > 0){
			return $result->result();
		}else {
			return false;
		}
	}
	public function detail_menu($id_cafe)
	{
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->where('id_cafe', $id_cafe);
		return $this->db->get()->result();
	}

	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('cafe');
		$this->db->like('nama_cafe', $keyword);
		return $this->db->get()->result();
	}

}

