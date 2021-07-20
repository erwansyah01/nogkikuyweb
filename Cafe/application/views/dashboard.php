<div class="container-fluid">
  

  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo base_url('assets/img/bg1.jpg')?>" class="d-block w-100" alt="Image" height="250"> 
    </div>
    <div class="carousel-item">
      <img src="<?php echo base_url('assets/img/bg2.jpg')?>" class="d-block w-100" alt="Image" height="250"> 
    </div>
  </div>
   <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <div class="row mt-4">

        <?php foreach($cafe as $cafe): ?>
            <div class="card ml-4 mb-3"style="width: 21rem;">
  <img style="height:200px; display: block; margin:auto; width:100%;" src="<?php echo base_url().'/uploads/'.$cafe->gambar ?>" class="card-img-top" alt="...">
  <div class="card-body"><br>
    <h2 style=class="card-title"><?php echo $cafe->nama_cafe ?></h2><br>
    <p><?php echo $cafe->keterangan ?></p>
    <small><?php echo $cafe->alamat ?></small><br><br>
    
    <?php echo anchor('dashboard/detail/'.$cafe->id_cafe,'<div class="btn btn-sm btn-success">Detail</div>')?>
  </div>
</div>

            <?php endforeach; ?>
        </div>
    </div>