  <section class="content">
      <div class="row">
          <div class="col-12">
              <div class="card">
                  <!-- /.card-header -->
                  <div class="card-body">
                      <h1></h1>

                      <a href="<?= base_url('/home/tambah_penjualan/')?>"><button class="btn btn-success"><i
                                  class="fa fa-plus"></i>+tambah</button></a>

                      <h1></h1>
                      <table id="datatable-buttons" class="table table-striped table-bordered">
                          <thead>
                              <tr>

                                  <th>No</th>
                                  <th>Nama Pelanggan</th>
                                  <th>Tanggal Penjualan</th>
                                  <th>Total Harga</th>
                                  <th>Total Bayar</th>
                                  <th>Kembalian</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>


                              <?php
                    $no=1;
                    foreach ($ferdi as $jes){
                      ?>
                              <tr>
                                  <th><?php echo $no++ ?></th>
                                  <td><?php echo $jes->nama_pelanggan?></td>
                                  <td><?php echo $jes->tanggal_penjualan?></td>
                                  <td><?php echo $jes->total_harga?></td>
                                  <td><?php echo $jes->total_bayar?></td>
                                  <td><?php echo $jes->kembalian?></td>


                                  <td>
                                      <a href="<?= base_url('/home/nota/'.$jes->id_penjualan)?>"><button
                                              class="btn btn-success"><i class="fa fa-list"></i>Nota</button></a>
                                      <a href="<?= base_url('/home/detail_penjualan/'.$jes->id_penjualan)?>"><button
                                              class="btn btn-primary"><i class="fa fa-list"></i>Detail</button></a>
                                      <a href="<?= base_url('/home/hapus_penjualan/'.$jes->id_penjualan)?>"><button
                                              class="btn btn-danger"><i class="fa fa-trash"></i>Hapus</button></a>
                                  </td>
                              </tr>


                              <?php }?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>