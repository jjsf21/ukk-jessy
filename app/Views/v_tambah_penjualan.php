<div class="card card-info">
    <div class="card-header"></div>
    <form class="form-horizontal form-label-left" novalidate action="<?= base_url('home/aksi_tambah_penjualan') ?>"
        method="post">
        <h1></h1>

        <div class="item form-group">
            <label class="control-label col-12">Nama Pelanggan<span class="required"></span></label>
            <div class="col-12">
                <select name="id_pelanggan" class="form-control text-capitalize" id="id_pelanggan" required>
                    <option>Pilih Nama</option>
                    <?php foreach ($ferdi1 as $nama_pelanggan) { ?>
                    <option value="<?php echo $nama_pelanggan->id_pelanggan ?>">
                        <?php echo $nama_pelanggan->nama_pelanggan ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-12">Produk<span class="required"></span></label>
            <div class="col-12">
                <select name="id_produk" class="form-control text-capitalize" id="id_produk" required>
                    <option>Pilih Produk</option>
                    <?php foreach ($ferdi2 as $nama_produk) { ?>
                    <option value="<?php echo $nama_produk->id_produk ?>"><?php echo $nama_produk->nama_produk ?>
                    </option>
                    <?php } ?>
                </select>
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-12">Tanggal Penjualan<span class="required"></span></label>
            <div class="col-12">
                <input type="date" id="tanggal_penjualan" class="form-control col-12" data-validate-length-range="6"
                    data-validate-words="2" name="tanggal_penjualan" required="required" placeholder="Isi Tanggal">
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-12">Jumlah<span class="required"></span></label>
            <div class="col-12">
                <input type="text" id="jumlah" class="form-control col-12" data-validate-length-range="6"
                    data-validate-words="2" name="jumlah" required="required" placeholder="Isi Jumlah">
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-12">Total Harga<span class="required"></span></label>
            <div class="col-12">
                <input readonly type="text" id="total_harga" class="form-control col-12" data-validate-length-range="6"
                    data-validate-words="2" name="total_harga" required="required" placeholder="Isi Total Harga">
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-12">Total Bayar<span class="required"></span></label>
            <div class="col-12">
                <input type="text" id="total_bayar" class="form-control col-12" data-validate-length-range="6"
                    data-validate-words="2" name="total_bayar" required="required" placeholder="Isi Total Harga">
            </div>
        </div>

        <div class="item form-group">
            <label class="control-label col-12">Total Kembali<span class="required"></span></label>
            <div class="col-12">
                <input readonly type="text" id="total_kembali" class="form-control col-12"
                    data-validate-length-range="6" data-validate-words="2" name="total_kembali" required="required"
                    placeholder="Isi Total Harga">
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
</div>

<script>
document.getElementById('id_produk').addEventListener('change', function() {
    var selectedProdukId = this.value;
    var selectedProduk = <?php echo json_encode($ferdi2); ?>.find(function(product) {
        return product.id_produk == selectedProdukId;
    });

    if (selectedProduk) {
        var harga = selectedProduk.harga;
        var jumlah = document.getElementById('jumlah').value;
        var totalHarga = harga * jumlah;

        document.getElementById('total_harga').value = totalHarga;
    }
});

document.getElementById('jumlah').addEventListener('input', function() {
    var harga = <?php echo json_encode($ferdi2); ?>.find(function(product) {
        return product.id_produk == document.getElementById('id_produk').value;
    }).harga;

    var jumlah = this.value;
    var totalHarga = harga * jumlah;

    document.getElementById('total_harga').value = totalHarga;
});
</script>
<script>
document.getElementById('total_bayar').addEventListener('input', function() {
    var totalHarga = parseFloat(document.getElementById('total_harga').value);
    var totalBayar = parseFloat(this.value);

    if (!isNaN(totalHarga) && !isNaN(totalBayar)) {
        var kembali = totalBayar - totalHarga;
        document.getElementById('total_kembali').value = kembali.toFixed(2);
    }
});
</script>