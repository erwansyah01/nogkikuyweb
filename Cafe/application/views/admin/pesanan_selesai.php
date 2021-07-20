<div class="container-fluid">
	<table class="table table-bordered">
		<tr>
			<th>NO</th>
			<th>NAMA CAFE</th>
			<th>TOTAL PESANAN</th>
			<th>KURSI DIPESAN</th>
			<th>TOTAL HARGA</th>
			<th>PEMESAN</th>
			<th>PESANAN</th>
			<th>AKSI</th>
		</tr>
		<?php
		$no=1;
		foreach($cafe as $cafe) echo '
		<tr>
			<td>'.$no++.'</td>
			<td>'.$cafe->nama_cafe.'</td>
			<td>'.$cafe->total.'</td>
			<td>'.$cafe->meja.'</td>
			<td>Rp.'.$cafe->grandtotal.'</td>
			<td>'.$cafe->pemesan.'</td>
			<td><button class="btn btn-primary" data-toggle="modal" data-target="#modal'.$cafe->id_transaksi.'">Lihat Pesanan</button>
			</td>
			<td><a href="'.base_url().'index.php/admin/cart/hapus/'.$cafe->id_transaksi.'" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
			</td>
		</tr>

		<div class="row" align="center">
			<div class="portfolio-modal modal fade" id="modal'.$cafe->id_transaksi.'" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="myModalLabel">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="row justify-content-center">
							<img style="display: block; width: 1000px;" src='.base_url().'/uploads/'.$cafe->gambar.' class="card-img-top" id="image">
						</div>
					</div>
				</div>
			</div>
		</div>		
	'; ?>
	</table>
</div>
