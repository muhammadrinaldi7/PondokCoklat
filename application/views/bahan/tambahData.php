 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
            <?php ?>
            <form method="post" action="<?= base_url('bahan/Bahan/tambahDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Kode bahan</label>
                    <input type="text" name="kode_bahan" readonly value="<?= $kode ?>" class="form-control col-md-5">
                    <?= form_error('kode_bahan','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Nama bahan</label>
                    <input type="text" name="nama_bahan" class="form-control col-md-12" required>
                    <?= form_error('nama_bahan','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Satuan Bahan</label>
                    <input type="text" name="satuan" class="form-control col-md-10" required>  
                    <?= form_error('satuan','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Harga Beli</label>
                    <input type="number" name="harga" class="form-control col-md-10" required>  
                    <?= form_error('harga','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Harga Jual</label>
                    <input type="number" name="harga_jual" class="form-control col-md-10" required>  
                    <?= form_error('harga_jual','<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                    Simpan
                </button>
                <button type="reset"  class="btn btn-warning">
                    <i class="fas fa-undo"></i>
                Reset</button>
                <a href="<?= base_url('bahan/Bahan'); ?>" class="btn btn-secondary">
                    <i class="fas fa-reply"></i>
                Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>