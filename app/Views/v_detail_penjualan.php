  <section class="content">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                      <h1></h1>

                      <h1></h1>
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                              <tr>

                                  <th>No</th>
                                  <th>Tanggal Penjualan</th>
                                  <th>Nama Produk</th>
                                  <th>Jumlah Produk</th>
                                  <th>Subtotal</th>
                              </tr>
                          </thead>
                          <tbody>


                              <?php
                    $no=1;
                    foreach ($ferdi as $jes){
                      ?>
                              <tr>
                                  <th><?php echo $no++ ?></th>
                                  <td><?php echo $jes->tanggal_penjualan?></td>
                                  <td><?php echo $jes->nama_produk?></td>
                                  <td><?php echo $jes->jumlah_produk?></td>
                                  <td><?php echo $jes->subtotal?></td>
                              </tr>

                              <?php }?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>