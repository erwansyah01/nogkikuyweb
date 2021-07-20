<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>EDIT DATA MENU CAFE</h3>
	<?php foreach($cafe as $cafe) : ?>

		<form action="<?php echo base_url().'index.php/admin/menu_cafe/update/'.$cafe->id_menu?>" method="post" enctype="multipart/form-data">

			<div class="form-group">
        		<label>Nama Cafe</label>

        		<input type="hidden" name="id_menu" class="form-control"
        		value="<?php echo $cafe->id_menu ?>">

        		<input type="text" class="form-control" value="<?php echo $cafe->nama_cafe ?>" readonly>
        	</div>

        	<div class="form-group">
        		<label>Nama Menu</label>
        		<input type="text" name="menu" class="form-control"
        		value="<?php echo $cafe->nama_menu ?>">
        	</div>

        	<div class="form-group">
        		<label>Harga (Rp.)</label>
        		<input type="number" name="harga" class="form-control"
        		value="<?php echo $cafe->harga ?>">
        	</div>
        	<div class="form-group">
        		<label>Gambar</label>
        		<input type="file" name="gambar" class="form-control"
        		value="<?php echo $cafe->gambar_menu ?>">
        	</div>
        	<button type="submit" class="btn btn-primary btn-sm">Simpan</button>

		</form>

		<?php endforeach; ?>
</div>