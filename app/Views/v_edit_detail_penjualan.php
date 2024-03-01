<div class="card card-info">
              <div class="card-header">
                <!-- <h3 class="card-title">Edit Departement</h3> -->
              <!-- </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_detail_penjualan')?>" method="post">
        <input type="hidden" name="id" value="<?= $ferdi->id_detail ?>">
        
        
         <div class="item form-group">
          <label class="control-label col-12" >Tanggal Penjualan<span class="required"></span>
          </label>
          <div class="col-12">
          <select name="id_penjualan" class="form-control text-capitalize" id="id_penjualan" required>
            <option>Pilih Tanggal</option>

            <?php
            foreach ($duar as $tanggal_penjualan) {
            ?>

            <option value="<?php echo $tanggal_penjualan->id_penjualan?>"><?php echo $tanggal_penjualan->tanggal_penjualan ?></option>
            <?php } ?>
          </select>
          </div>
        </div>
          <div class="item form-group">
          <label class="control-label col-12" >Nama Produk<span class="required"></span>
          </label>
          <div class="col-12">
          <select name="id_produk" class="form-control text-capitalize" id="id_produk" required>
            <option>Pilih Nama</option>

            <?php
            foreach ($a as $nama_produk) {
            ?>

            <option value="<?php echo $nama_produk->id_produk?>"><?php echo $nama_produk->nama_produk ?></option>
            <?php } ?>
          </select>
          </div>
        </div>
         <div class="item form-group">
          <label class="control-label col-12" >Jumlah Produk<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="jumlah_produk" name="jumlah_produk" placeholder="Isi Jumlah" required="required" class="form-control col-12" value="<?= $ferdi->jumlah_produk?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Subtotal<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="subtotal" name="subtotal" placeholder="Isi Subtotal" required="required" class="form-control col-12" value="<?= $ferdi->subtotal?>">
          </div>
        </div>
    
     


       <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="/home/detail_penjualan" type="submit" class="btn btn-primary">Cancel</a></button>
            <button id="send" type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
