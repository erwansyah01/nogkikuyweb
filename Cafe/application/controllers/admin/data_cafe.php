<?php

class Data_cafe extends CI_Controller{

	public function __construct(){
		parent::__construct();
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
		$data['cafe'] = $this->tempat_cafe->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_cafe',$data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_aksi()
	{
		$nama_cafe		=$this->input->post('nama_cafe');
		$keterangan		=$this->input->post('keterangan');
		$alamat			=$this->input->post('alamat');
		$meja			=$this->input->post('meja');
		$gambar			=$_FILES['gambar']['name'];
		if ($gambar 	=''){}else{
			$config ['upload_path']= './uploads';
			$config ['allowed_types']= 'jpg|jpeg|png';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('gambar')){
				echo "Gambar Gagal Di Upload";
			}else{
				$gambar=$this->upload->data('file_name');
			}

		}

			$data = array(
				'nama_cafe'		=> $nama_cafe,
				'keterangan'	=> $keterangan,
				'alamat'		=> $alamat,
				'meja'			=> $meja,
				'gambar'		=> $gambar,
			);

			$this->tempat_cafe->tambah_cafe($data, 'cafe');
			redirect('admin/data_cafe/index');
		
	}

	public function edit($id)
	{
		$where = array('id_cafe' =>$id);
		$data['cafe'] = $this->tempat_cafe->edit_cafe($where, 'cafe')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_cafe',$data);
		$this->load->view('templates_admin/footer');
	}

	public function update(){
		$id 			=$this->input->post('id_cafe');
		$nama_cafe 		=$this->input->post('nama_cafe');
		$keterangan		=$this->input->post('keterangan');
		$alamat 		=$this->input->post('alamat');
		$meja 		=$this->input->post('meja');

		$data = array(
			'nama_cafe'		=> $nama_cafe,
			'keterangan'	=> $keterangan,
			'alamat'		=> $alamat,
			'meja'			=> $meja,
			
			);
		$where = array(
			'id_cafe'	=> $id
		);

		$this->tempat_cafe->update_data($where,$data,'cafe');
		redirect('admin/data_cafe/index');
	}
	public function hapus ($id)
	{
		$where = array('id_cafe' => $id);
		$this->tempat_cafe->hapus_data($where, 'cafe');
		redirect('admin/data_cafe/index'); 
	}

}

