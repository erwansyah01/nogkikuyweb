<div class="container-fluid">
    <div class="card">
        <h5 class="card-header"> Detail Cafe </h5>
        <div class="card-body">
            <?php foreach($cafe as $cafe): ?>
            <div class="row">
                <div class="col-md-4">
                    <img style="height:300px; display: block; margin:auto; width:1050px;" src="<?php echo base_url().'/uploads/'.$cafe->gambar ?>"class="card-img-top">
                    
                </div>
                <div class="col-md-8"></div>
                <table class="table">
                    <tr>
                        <td>Nama Cafe</td>
                        <td><strong><?php echo $cafe->nama_cafe ?></strong></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td><strong><?php echo $cafe->keterangan ?></strong></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><strong><?php echo $cafe->alamat ?></strong></td>
                    </tr>
                        <td>Jumlah meja</td>
                        <td><strong><?php echo $cafe->meja ?></strong></td>
                    </tr>
                    <tr><td></td><td></td></tr>
                </table>
            </div>
        </div>
        <?php endforeach; ?>
        <div class="card" style="flex-direction: row; flex-wrap: wrap;">
            <h5 class="card-header">Daftar Menu</h5>
        <?php foreach($menu as $cafe): ?>
        <div class="card ml-4 mb-3"style="width: 21rem;">
            <div class="card-body"><br>
                <img style="height:200px;" src="<?php echo base_url().'/uploads/menu/'.$cafe->gambar ?>" class="card-img-top" alt="...">
                <h2 style="margin-top:20px;" class="card-title"><?php echo $cafe->nama_menu;?></h2><br>
                <p style="margin-top:-30px;">Rp. <?php echo $cafe->harga;?></p>
                <!---
                <?php if($this->session->userdata('username')){ ?>
                    <a href="<?=base_url('index.php/Cart/addcart/'.$cafe->id_cafe.'/'.$cafe->id_menu)?>" class="btn btn-success" style="float: right; margin-top: 20px; width: 100px;"> Pesan</a>
                <?php } ?> --->
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </div>
</div>
</div>