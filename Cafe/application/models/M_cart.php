<?php
/*defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model {

	public function total()
	{
    	$query = $this->db->select('SUM(grandtotal) as jumlah')->from('pesanan')->where('status', 1)->get();
    	return $query->row()->jumlah;
    }
	public function detail_data_menu($id)
	{
		
    	$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('cafe', 'menu.id_cafe = cafe.id_cafe');
    	$this->db->where('menu.id_menu',$id); 
    	return $this->db->get()->row(); 
	}
	public function tampil_data(){
		$this->db->select('*');
		$this->db->from('menu');
		$this->db->join('cafe', 'menu.id_cafe = cafe.id_cafe');
		return $this->db->get();
	}
	public function simpan_cart()
	{
		$id_cafe = $this->input->post('id_cafe');
		$meja = $this->input->post('meja');
		$totalmeja = $this->input->post('totalmeja');
		$object=array(
			'id_cafe'=>$this->input->post('id_cafe'),
			'grandtotal'=>$this->input->post('grandtotal'),
			'meja'=>$this->input->post('meja'),
			'pemesan'=>$this->session->userdata('nama'),
			'total'=>$this->input->post('qty')
		);

		$this->db->insert('pesanan', $object);

		$this->db->where('id_cafe',$id_cafe);
		$this->db->update('cafe',array('meja' => ($totalmeja - $meja)));
		
	}
	public function getnota()
	{
		$this->db->select('id_transaksi, pesanan.id_cafe, total, grandtotal, pesanan.meja, pemesan, cafe.id_cafe, nama_cafe, pesanan.gambar, cafe.meja AS totalmeja');
		$this->db->from('pesanan');
		$this->db->join('cafe', 'cafe.id_cafe = pesanan.id_cafe');
		$this->db->where('status', 0);
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get();
	}
	public function getnota_done()
	{
		$this->db->select('id_transaksi, pesanan.id_cafe, total, grandtotal, pesanan.meja, pemesan, cafe.id_cafe, nama_cafe, pesanan.gambar, cafe.meja AS totalmeja');
		$this->db->from('pesanan');
		$this->db->join('cafe', 'cafe.id_cafe = pesanan.id_cafe');
		$this->db->where('status', 1);
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get();
	}
	public function getnota_user()
	{
		$nama = $this->session->userdata('nama');
		$this->db->select('id_transaksi, pesanan.id_cafe, total, grandtotal, pesanan.meja, pemesan, cafe.id_cafe, nama_cafe, pesanan.gambar, cafe.meja AS totalmeja');
		$this->db->from('pesanan');
		$this->db->join('cafe', 'cafe.id_cafe = pesanan.id_cafe');
		$this->db->where('pemesan', $nama);
		$this->db->order_by('id_transaksi', 'desc');
		return $this->db->get();
	}
	public function update_meja($where,$data,$table)
	{
		$this->db->where('id_cafe',$where);
		$this->db->update($table,array('meja' => $data));
	}
	public function update_pesanan($where,$data,$table)
	{
		$this->db->where('id_transaksi', $where);
		$this->db->update($table,array('status' => $data));
	}

}

/* End of file m_cart.php */
/* Location: ./application/models/m_cart.php */