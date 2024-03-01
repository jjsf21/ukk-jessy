<div class="card card-info">
              <div class="card-header">
                <!-- <h3 class="card-title">Edit Departement</h3> -->
              <!-- </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_penjualan')?>" method="post">
        <input type="hidden" name="id" value="<?= $ferdi->id_penjualan ?>">
        
          <div class="item form-group">
          <label class="control-label col-12" >Nama Pelanggan<span class="required"></span>
          </label>
          <div class="col-12">
          <select name="id_pelanggan" class="form-control text-capitalize" id="id_pelanggan" required>
            <option>Pilih Nama</option>

            <?php
            foreach ($duar as $nama_pelanggan) {
            ?>

            <option value="<?php echo $nama_pelanggan->id_pelanggan?>"><?php echo $nama_pelanggan->nama_pelanggan ?></option>
            <?php } ?>
          </select>
          </div>
        </div>
         <div class="item form-group">
          <label class="control-label col-12" >Tanggal Penjualan<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="date" id="tanggal_penjualan" name="tanggal_penjualan" placeholder="Isi Tanggal" required="required" class="form-control col-12" value="<?= $ferdi->tanggal_penjualan?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Total Harga<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="total_harga" name="total_harga" placeholder="Isi Total Harga" required="required" class="form-control col-12" value="<?= $ferdi->total_harga?>">
          </div>
        </div>
    
     


       <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="/home/penjualan" type="submit" class="btn btn-primary">Cancel</a></button>
            <button id="send" type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
