 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
            <?php foreach ($supplier as $s ):?>
            <form method="post" action="<?= base_url('supplier/Supplier/updateDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Kode Supplier</label>
                    <input type="hidden" name="id_supplier" value="<?= $s->id_supplier; ?>" class="form-control col-md-5">
                    <input type="text" name="kode_supplier" readonly value="<?= $s->kode_supplier ?>" class="form-control col-md-5">
                    <?= form_error('kode_supplier','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Supplier</label>
                    <input type="text" name="nama_supplier" value="<?= $s->nama_supplier; ?>" class="form-control col-md-12" required>
                    <?= form_error('nama_supplier','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Alamat Supplier</label>
                    <input type="text" name="alamat" value="<?= $s->alamat; ?>" class="form-control col-md-12" required>
                    <?= form_error('alamat','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group mb-4">
                    <label for="">No Telp Supplier</label>
                    <input type="text" name="telp" value="<?= $s->telp; ?>" class="form-control col-md-8" required>
                    <?= form_error('telp','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group mb-4">
                    <label for="">Tanggal Kerjasama</label>
                    <input type="date" name="tgl_kerjasama" value="<?= $s->tgl_kerjasama; ?>" class="form-control col-md-8" required>
                    <?= form_error('tgl_kerjasama','<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                    Simpan
                </button>
                <button type="reset"  class="btn btn-warning">
                    <i class="fas fa-undo"></i>
                Reset</button>
                <a href="<?= base_url('/supplier/supplier'); ?>" class="btn btn-secondary">
                    <i class="fas fa-reply"></i>
                Kembali</a>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>