<div class="container-fluid">
	<buton class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_cafe"><i class= "fas fa-plus"></i> Tambah Menu</buton>
	<?php
      $notif = $this->session->flashdata('pesan');
      if(!empty($notif)){
      echo '<div class="alert alert-info">'.$notif.'</div>';
  }?>
  <?php
      $notif = $this->session->flashdata('pesan1');
      if(!empty($notif)){
      echo '<div class="alert alert-danger">'.$notif.'</div>';
  }?>
	<table class="table table-bordered">
		<tr>
			<th>NO</th>
			<th>NAMA CAFE</th>
			<th>NAMA MENU</th>
			<th>HARGA</th>
			<th>GAMBAR</th>
			<th colspan="3">AKSI</th>
		</tr>
		 <?php 
		 $no=1;
		 foreach($cafe as $cafe): ?>
		 	<tr>
		 		<td><?php echo $no++ ?></td>
		 		<td><?php echo $cafe->nama_cafe ?></td>
		 		<td><?php echo $cafe->nama_menu ?></td>
		 		<td>Rp.<?php echo $cafe->harga ?></td>
		 		<td style=""><img style="display: block; width: 200px; height: 100px;" src="<?php echo base_url().'uploads/menu/'.$cafe->gambar_menu ?>" class="card-img-top" alt="..."></td>
		 		<td><?php echo anchor('admin/menu_cafe/edit/' .$cafe->id_menu, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>')?>
		 		<?php echo anchor('admin/menu_cafe/hapus/' .$cafe->id_menu, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>')?></td>

		 	</tr>
		 <?php endforeach; ?>
	</table>
</div>


<!-- Modal -->
<div class="modal fade" id="tambah_cafe" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM INPUT CAFE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        	<spsn aria-hidden="true">&times;</spsn>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'index.php/admin/menu_cafe/tambah_aksi';?>" method="post" enctype="multipart/form-data">
        	<div class="form-group">
        		<label>Nama Cafe</label>
        		<select class="form-control" name="id_cafe" require>
        			<?php foreach($data as $tampil){ ?>
							<option value="<?php echo $tampil->id_cafe?>"><?php echo $tampil->nama_cafe?></option>
							<?php } ?>
					</select>
        	</div>
        	<div class="form-group">
        		<label>Nama Menu</label>
        		<input type="text" name="nama_menu" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Harga (Rp.)</label>
        		<input type="number" name="harga" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>Gambar Cafe</label><br>
        		<input type="file" name="gambar" class="form-control">
        	</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>

      </form>
    </div>
  </div>
</div>