<?php

class Dashboard_admin extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('M_cart');
		$this->load->model('menu');
		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
   Anda Bukanlah Admin, Login Terlebih Dahulu Untuk Akses Lebih Lanjut!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
  </button>
</div>');
			redirect('auth/login');

		}
	}
	public function index()
	{
		$data['cafe'] = $this->tempat_cafe->total();
		$data['total'] = $this->M_cart->total();
		$data['belum'] = $this->menu->belum();
		$data['sudah'] = $this->menu->sudah();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_admin/footer');
	}
}