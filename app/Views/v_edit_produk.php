<div class="card card-info">
              <div class="card-header">
                <!-- <h3 class="card-title">Edit Departement</h3> -->
              <!-- </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_produk')?>" method="post">
        <input type="hidden" name="id" value="<?= $ferdi->id_produk ?>">
        
        
         <div class="item form-group">
          <label class="control-label col-12" >Nama Produk<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nama_produk" name="nama_produk" placeholder="Isi Nama" required="required" class="form-control col-12" value="<?= $ferdi->nama_produk?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Harga<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="harga" name="harga" placeholder="Isi Harga" required="required" class="form-control col-12" value="<?= $ferdi->harga?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12">Stok<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="stok" name="stok" placeholder="Isi Stok" required="required" class="form-control col-12" value="<?= $ferdi->stok?>">
          </div>
        </div>
     


       <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="/home/produk" type="submit" class="btn btn-primary">Cancel</a></button>
            <button id="send" type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
