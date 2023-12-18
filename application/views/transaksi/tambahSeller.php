 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
            <?php ?>
            <form method="POST" action="<?= base_url('transaksi/Seller/tambahDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Kode Outlet</label>
                    <input type="text" name="kode_outlet" readonly value="<?= $kode ?>" class="form-control col-md-5">
                    <?= form_error('kode_supplier','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <select name="kode_bahan"class="form-control">
                        <?php foreach($bahan as $b): ?>
                        <option value="<?= $b->kode_bahan ?>"><?= $b->nama_bahan ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Harga</label>
                    <input type="text" id="harga" onkeyup="hitung();" class="form-control col-md-5">
                </div>
                <div class="form-group">
                    <label for="">Jumlah Penjualan</label>
                    <input required type="number" name="qty" onkeyup="hitung();" id="qty" class="form-control col-md-5">
                </div>
                <div class="form-group">
                    <label for="">Total Penjualan</label>
                    <input type="text" readonly name="total" id="total" class="form-control col-md-5">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Input</label>
                    <input type="date" name="tanggal"  class="form-control col-md-5">
                </div>
                <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i>
                    Kirim Permintaan
                </button>
                <button type="reset"  class="btn btn-warning">
                    <i class="fas fa-undo"></i>
                Reset</button>
                <a href="<?= base_url('/transaksi/seller'); ?>" class="btn btn-secondary">
                    <i class="fas fa-reply"></i>
                Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">     
    function hitung(){
        var qty = document.getElementById('qty').value;
        var harga = document.getElementById('harga').value;
        var hasil = parseInt(qty)*parseInt(harga);
        if (!isNaN(hasil)) {
            document.getElementById('total').value = hasil;
        }
    } 
    </script>