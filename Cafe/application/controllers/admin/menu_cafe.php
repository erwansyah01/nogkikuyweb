<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_cafe extends CI_Controller {

	public function __construct(){
		parent::__construct();
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
		$data['data'] = $this->tempat_cafe->tampil_data()->result();
		$data['cafe'] = $this->menu->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/menu_cafe',$data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_aksi()
	{
		$id_cafe		=$this->input->post('id_cafe');
		$menu			=$this->input->post('nama_menu');
		$harga			=$this->input->post('harga');
		$gambar			=$_FILES['gambar']['name'];
		if ($gambar 	=''){}else{
			$config ['upload_path']= './uploads/menu';
			$config ['allowed_types']= 'jpg|jpeg|png';

			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('gambar')){
				echo "Gambar Gagal Di Upload";
			}else{
				$gambar=$this->upload->data('file_name');
			}

		}
		
		$data = array(
			'id_cafe'	=> $id_cafe,
			'nama_menu'	=> $menu,
			'harga'		=> $harga,
			'gambar'	=> $gambar,
		);

		$this->menu->tambah_menu($data, 'menu');
		redirect('admin/menu_cafe/index');
		
	}
	public function edit($id)
	{
		$where = array('id_menu' =>$id);
		$data['cafe'] = $this->menu->edit_menu($where, 'menu')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_menu',$data);
		$this->load->view('templates_admin/footer');
	}

	public function update($id_gambar){
		$id 			=$this->input->post('id_menu');
		$nama_menu		=$this->input->post('menu');
		$harga 			=$this->input->post('harga');
		
		$_image = $this->db->get_where('menu',['id_menu' => $id_gambar])->row();
        $config['upload_path']          = './uploads/menu';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('gambar')){
        	$data = array(
				'nama_menu'	=> $nama_menu,
				'harga'		=> $harga,
				
				);
			$where = array(
				'id_menu'	=> $id
			);

			$this->menu->update_data($where,$data,'menu');
        	$this->session->set_flashdata('pesan1', 'Gagal Update Nota Pesanan');
        	redirect('admin/menu_cafe/index');
        	
        }
        else{
            $_data = array('upload_data' => $this->upload->data());
             $data = array(
                'gambar' => $_data['upload_data']['file_name']
                );
            $query = $this->db->update('menu', $data, array('id_menu' => $id_gambar));
            if($query){
                unlink("./uploads/menu/".$_image->gambar);
                $data = array(
					'nama_menu'	=> $nama_menu,
					'harga'		=> $harga,
					
					);
				$where = array(
					'id_menu'	=> $id
				);

				$this->menu->update_data($where,$data,'menu');
				redirect('admin/menu_cafe/index');
            }
           
        }
	}
	public function hapus ($id)
	{
		$where = array('id_menu' => $id);
		$this->menu->hapus_data($where, 'menu');
		redirect('admin/menu_cafe/index'); 
	}
}

/* End of file menu_cafe.php */
/* Location: ./application/controllers/admin/menu_cafe.php */