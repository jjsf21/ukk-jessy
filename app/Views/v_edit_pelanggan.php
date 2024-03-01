<div class="card card-info">
              <div class="card-header">
                <!-- <h3 class="card-title">Edit Departement</h3> -->
              <!-- </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_pelanggan')?>" method="post">
        <input type="hidden" name="id" value="<?= $ferdi->id_pelanggan ?>">
        
        
         <div class="item form-group">
          <label class="control-label col-12" >Nama Pelanggan<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nama_pelanggan" name="nama_pelanggan" placeholder="Isi Nama" required="required" class="form-control col-12" value="<?= $ferdi->nama_pelanggan?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Alamat<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="alamat" name="alamat" placeholder="Isi Alamat" required="required" class="form-control col-12" value="<?= $ferdi->alamat?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Nomor Telepon<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nomor_telepon" name="nomor_telepon" placeholder="Isi Notelp" required="required" class="form-control col-12" value="<?= $ferdi->nomor_telepon?>">
          </div>
        </div>
     


       <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="/home/pelanggan" type="submit" class="btn btn-primary">Cancel</a></button>
            <button id="send" type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
