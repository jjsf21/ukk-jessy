<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <h1></h1>

                    <h1></h1>
                    <h6 class="card-subtitle text-muted">Tanggal: <?= $ferdi[0]->tanggal_penjualan?></h6>
                    <h6 class="card-subtitle text-muted mt-2">Details: </h6>
                    <ul>
                        <?php 
                                $grandTotal = 0;
                                foreach($ferdi as $jes){
                            ?>
                        <li>
                            <?=$jes->nama_produk?> (Jumlah: <?=$jes->jumlah_produk?>)
                        </li>
                        <ul>
                            <li>Rp<?= number_format(floor($jes->subtotal), 0, ',', '.') ?></li>
                        </ul>
                        <?php 
                                $grandTotal += floor($jes->subtotal);
                                }
                            ?>

                    </ul>
                    <h6 class="card-subtitle text-muted mt-4">Grand Total:
                        Rp<?= number_format($grandTotal, 0, ',', '.') ?></h6>
                    <h6 class="card-subtitle text-muted mt-4" align="center">Terima kasih sudah berbelanja bersama kami
                    </h6>
                </div>
            </div>
        </div>