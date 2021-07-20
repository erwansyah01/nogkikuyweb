<div class="container-fluid">
	<buton class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_cafe"><i class= "fas fa-plus"></i> Tambah Cafe</buton>

	<table class="table table-bordered">
		<tr>
			<th>NO</th>
			<th>NAMA CAFE</th>
			<th>KETERANGAN</th>
			<th>ALAMAT</th>
			<th colspan="3">AKSI</th>
		</tr>
		 <?php 
		 $no=1;
		 foreach($cafe as $cafe): ?>
		 	<tr>
		 		<td><?php echo $no++ ?></td>
		 		<td><?php echo $cafe->nama_cafe ?></td>
		 		<td><?php echo $cafe->keterangan ?></td>
		 		<td><?php echo $cafe->alamat ?></td>
		 		<td><?php echo anchor('admin/data_cafe/detail/' .$cafe->id_cafe, '<div class="btn btn-success btn-sm"><i class="fas fa-search-plus"></i></div>')?></td>
		 		<td><?php echo anchor('admin/data_cafe/edit/' .$cafe->id_cafe, '<div class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></div>')?> </td>
		 		<td><?php echo anchor('admin/data_cafe/hapus/' .$cafe->id_cafe, '<div class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></div>')?></td>

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
        <form action="<?php echo base_url(). 'index.php/admin/data_cafe/tambah_menu';?>" method="post" enctype="multipart/form-data">
        	<div class="form-group">
        		<label>Nama Cafe</label>
        		<input type="text" name="nama_cafe" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>keterangan</label>
        		<input type="text" name="keterangan" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>alamat</label>
        		<input type="text" name="alamat" class="form-control">
        	</div>
        	<div class="form-group">
        		<label>gambar cafe</label><br>
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