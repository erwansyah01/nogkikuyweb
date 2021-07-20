<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>EDIT DATA CAFE</h3>
	<?php foreach($cafe as $cafe) : ?>

		<form method="post" action="<?php echo base_url().'index.php/admin/data_cafe/update'?>">

				<div class="form-group">
        		<label>Nama Cafe</label>

        		<input type="hidden" name="id_cafe" class="form-control"
        		value="<?php echo $cafe->id_cafe ?>">

        		<input type="text" name="nama_cafe" class="form-control"
        		value="<?php echo $cafe->nama_cafe ?>">
        	</div>

        	<div class="form-group">
        		<label>Keterangan</label>
        		<input type="text" name="keterangan" class="form-control"
        		value="<?php echo $cafe->keterangan ?>">
        	</div>

        	<div class="form-group">
        		<label>Total Meja</label>
        		<input type="text" name="meja" class="form-control"
        		value="<?php echo $cafe->meja ?>">
        	</div>
        	
        	<div class="form-group">
        		<label>Alamat</label>
        		<input type="text" name="alamat" class="form-control"
        		value="<?php echo $cafe->alamat ?>">
        	</div>

        	<button type="submit" class="btn btn-primary btn-sm">Simpan</button>

		</form>

		<?php endforeach; ?>
</div>