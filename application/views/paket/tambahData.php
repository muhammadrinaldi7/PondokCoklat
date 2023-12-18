 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
            <?php ?>
            <form method="post" action="<?= base_url('paket/paket/tambahDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Kode Paket</label>
                    <input type="text" name="kode_paket" readonly value="<?= $kode ?>" class="form-control col-md-5">
                    <?= form_error('kode_paket','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Paket</label>
                    <input type="text" name="nama_paket" class="form-control col-md-12" required>
                    <?= form_error('nama_paket','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Deskripsi Paket</label>
                    <input type="text" name="deskripsi" class="form-control col-md-10" required>  
                    <?= form_error('deskripsi','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Harga Beli</label>
                    <input type="number" name="harga" class="form-control col-md-10" required>  
                    <?= form_error('harga','<div class="text-small text-danger"></div>') ?>
                </div>
                
                <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                    Simpan
                </button>
                <button type="reset"  class="btn btn-warning">
                    <i class="fas fa-undo"></i>
                Reset</button>
                <a href="<?= base_url('paket/paket'); ?>" class="btn btn-secondary">
                    <i class="fas fa-reply"></i>
                Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>