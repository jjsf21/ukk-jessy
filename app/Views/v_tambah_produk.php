<div class="card card-info">
              <div class="card-header">
                <!-- <h3 class="card-title">Tambah Nasabah</h3> -->
              <!-- </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_tambah_produk')?>" method="post">
                <h1></h1>
        
        <div class="item form-group">
          <label class="control-label col-12" >Nama Produk<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nama_produk" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="nama_produk" required="required" placeholder="Isi Nama">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Harga<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="harga" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="harga" required="required" placeholder="Isi Harga">
          </div>
        </div>
           <div class="item form-group">
          <label class="control-label col-12" >Stok<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="stok" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="stok" required="required" placeholder="Isi Stok">
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
            </div>