<!-- <section class="page-section bg-light" id="exhibition">
  <div class="container">
    <div class="text-center">
      <h2 class="section-heading text-uppercase">Proses Pesanan</h2>
      <br/>
      <p style="float: left; font-weight: bolder;">*Harap Unduh Nota Pemesanan</p>
      <?php
      $notif = $this->session->flashdata('pesan');
      if(!empty($notif)){
      echo '<div class="alert alert-info">'.$notif.'</div>';
      }?>
    </div>
    <form action="<?=base_url('index.php/Cart/simpan')?>" method="post">
      <table class="table table-hover table-striped text-center">
        <tr>
          <td>Nama Cafe</td>
          <td>Nama Menu</td>
          <td>Jumlah</td>
          <td>Harga</td>
          <td>Subtotal Harga</td>
          <td>Aksi</td>
        </tr>
        
        <?php
        foreach($this->cart->contents() as $items){
        ?>
        <tr>
          <td>
            <input type="hidden" name="id_cafe" value="<?=$items['id']?>">
            <input type="hidden" name="totalmeja" value="<?=$items['totalmeja']?>">
            <?= $items['name']?>
          </td>
          <td><?= $items['menu']?></td>
          <td><?= $items['qty']?></td>
          <td>Rp. <?= $items['price']?></td>
          <td>Rp. <?= $items['subtotal']?></td>
          <td>
            <a class="btn btn-danger" href="<?=base_url('index.php/Cart/del/'.$items['rowid'])?>" onclick="return confirm('Yakin Untuk Menghapus?')">Del</a>
          </td>
        </tr>
        <?php
        }
        ?>
        <tr>
          <input type="hidden" name="qty" value="<?=$this->cart->total_items()?>">
          <td>Total Jumlah</td>
          <td></td>
          <td><?= $this->cart->total_items()?></td>
          <td colspan="3"></td>
        </tr>
        <tr>
          <input type="hidden" name="grandtotal" value="<?=$this->cart->total()?>">
          <td>Total Harga</td>
          <td colspan="3"></td>
          <td>Rp. <?= $this->cart->total()?></td>
          <td></td>
        </tr>
        <tr>
          <td>Pesan Tempat:</td>
          <td colspan="2">
            <input type="number" name="meja" class="form-control" placeholder="Jumlah Kursi" value="1">
          </td>
          <td>Nama Pemesan:</td>
          <td colspan="2"><input type="text" name="pemesan" class="form-control" value="<?=$this->session->userdata('nama');?>"></td>
        </tr>
      </table>
      <a class="btn btn-success" id="a" href="javascript:void(0);" onclick="generate();" style="float: right; display:none;">CETAK NOTA</a>
      <input type="submit" id="b" name="simpan" value="PROSES PESANAN" class="btn btn-success" style="float: right; display:none;">
    </form>
  </div>
</section>

<div class="container-fluid" style="margin-top: 100px;">
  <hr>
  <div class="text-center">
    <h2 class="section-heading text-uppercase">Daftar Pesanan</h2>
    <br/>
    <?php
      $notif = $this->session->flashdata('pesan1');
      if(!empty($notif)){
      echo '<div class="alert alert-danger">'.$notif.'</div>';
      }?>
    <br/>
  </div>
  <table class="table table-bordered">
    <tr>
      <th>NO</th>
      <th>NAMA CAFE</th>
      <th>TOTAL PESANAN</th>
      <th>KURSI DIPESAN</th>
      <th>TOTAL HARGA</th>
      <th>PEMESAN</th>
      <th>PESANAN</th>
    </tr>
     <?php 
     $no=1;
     foreach($cafe as $cafe): ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $cafe->nama_cafe ?></td>
        <td><?php echo $cafe->total ?></td>
        <td><?php echo $cafe->meja ?></td>
        <td>Rp.<?php echo $cafe->grandtotal ?></td>
        <td><?php echo $cafe->pemesan ?></td>
        <td>
          <?php if ($cafe->gambar == null){ ?>
            <form action="<?php echo base_url('index.php/Cart/update/').$cafe->id_transaksi;?>" method="post" enctype="multipart/form-data">
              <input type="file" name="userfile" class="btn">
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="float:left;">Upload</button>
                <a href="<?=base_url('index.php/dashboard/hapus_selesai/'.$cafe->id_transaksi.'/'.$cafe->id_cafe.'/'.$cafe->meja.'/'.$cafe->totalmeja);?>" class="btn btn-danger">Batalkan Pesanan</a>
              </div>
            </form>
          <?php } else { ?>
            <img style="display: block; width: 500px;" src="<?php echo base_url().'/uploads/'.$cafe->gambar ?>" class="card-img-top">
          <?php } ?>            
        </td>

      </tr>
     <?php endforeach; ?>
  </table>
</div> -->