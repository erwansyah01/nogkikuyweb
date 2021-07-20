<?php
/* defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function index()
	{
		$this->load->model('M_cart');
		$data['cafe'] = $this->M_cart->getnota()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_pesanan',$data);
		$this->load->view('templates_admin/footer');
	}
	public function selesai()
	{
		$this->load->model('M_cart');
		$data['cafe'] = $this->M_cart->getnota_done()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/pesanan_selesai',$data);
		$this->load->view('templates_admin/footer');
	}
	public function update($where1, $where2, $meja, $totalmeja){
		$this->load->model('M_cart');
		$this->M_cart->update_pesanan($where1,1,'pesanan');
		$this->M_cart->update_meja($where2,($meja + $totalmeja),'cafe');
		redirect('admin/cart');
	}
	public function hapus($id)
	{
		$where = array('id_transaksi' => $id);
		$this->tempat_cafe->hapus_data($where, 'pesanan');
		redirect('admin/cart'); 
	}

}

/* End of file cart.php */
/* Location: ./application/controllers/admin/cart.php */