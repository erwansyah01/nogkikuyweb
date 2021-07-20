<?php

class Dashboard extends CI_Controller{
	
	public function index()
	{
		$data['cafe'] = $this->tempat_cafe->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
		
	}
	public function detail($id_cafe)
	{
		$data['cafe'] = $this->tempat_cafe->detail_cafe($id_cafe);
		$data['menu'] = $this->tempat_cafe->detail_menu($id_cafe);
		$this->load->view('templates_menu/header');
		$this->load->view('templates_menu/sidebar');
		$this->load->view('detail_cafe',$data);
		$this->load->view('templates_menu/footer');
	}
	/* public function cart()
	{
		$this->load->model('M_cart');
		$data['cafe'] = $this->M_cart->getnota_user()->result();
		$this->load->view('templates_menu/header');
		$this->load->view('templates_menu/sidebar');
		$this->load->view('template_cart', $data);
		$this->load->view('templates_menu/footer');
	}
	public function hapus_selesai($where1, $where2, $meja, $totalmeja)
	{
		$this->load->model('M_cart');
		$this->M_cart->update_meja($where2,($totalmeja + $meja),'cafe');
		$where = array('id_transaksi' => $where1);
		$this->tempat_cafe->hapus_data($where, 'pesanan');
		redirect('dashboard/cart'); 
	}*/
}