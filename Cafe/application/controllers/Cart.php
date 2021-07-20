<?php
/* defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function addcart($id_cafe, $id_menu)
	{
		$this->load->model('M_cart');
		$detail=$this->M_cart->detail_data_menu($id_menu);
		$data = array(
			'id'      => $detail->id_cafe,
			'qty'     => 1,
			'price'   => $detail->harga,
			'name'    => $detail->nama_cafe,
			'menu'	  => $detail->nama_menu,
			'totalmeja'	  => $detail->meja,
		);
		
		$this->cart->insert($data);
		redirect('dashboard/detail/'.$id_cafe, 'location');
	}
	public function simpan()
	{
		if($this->input->post('simpan')) {
			if($this->input->post('qty') == 0) {
				$this->session->set_flashdata('pesan', 'Gagal Memproses Pesanan');
				redirect('dashboard/cart', 'refresh');
			} else {
				$this->load->model('M_cart');
				$id_transaksi=$this->M_cart->simpan_cart();
				$this->session->set_flashdata('pesan', 'Sedang Memproses Pesanan');
				$this->cart->destroy();
				redirect('dashboard/cart', 'refresh');
			}
		}
	}
	public function del($id)
	{
		$data = array(
			'rowid' => $id,
			'qty' => 0
		);
		$this->cart->update($data);
		redirect('dashboard/cart','refresh');
	}
	public function update($id_pesanan)
	{
        $_image = $this->db->get_where('pesanan',['id_transaksi' => $id_pesanan])->row();
        $config['upload_path']          = './uploads';
        $config['allowed_types']        = 'gif|jpg|png';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('userfile')){
        	$this->session->set_flashdata('pesan1', 'Gagal Update Nota Pesanan');
            redirect('dashboard/cart');
        }
        else{
            $_data = array('upload_data' => $this->upload->data());
             $data = array(
                'gambar' => $_data['upload_data']['file_name']
                );
            $query = $this->db->update('pesanan', $data, array('id_transaksi' => $id_pesanan));;
            if($query){
                unlink("./uploads".$_image->image);
            }
            redirect('dashboard/cart');
        }
	}
	
}

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */