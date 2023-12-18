 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
            <?php foreach ($bahan as $s ):?>
            <form method="post" action="<?= base_url('bahan/bahan/updateDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Kode Bahan</label>
                    <input type="hidden" name="id_bahan" value="<?= $s->id_bahan; ?>" class="form-control col-md-5">
                    <input type="text" name="kode_bahan" readonly value="<?= $s->kode_bahan ?>" class="form-control col-md-5">
                    <?= form_error('kode_bahan','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Bahan</label>
                    <input type="text" name="nama_bahan" value="<?= $s->nama_bahan; ?>" class="form-control col-md-12">
                    <?= form_error('nama_bahan','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Satuan Bahan</label>
                    <input type="text" name="satuan" value="<?= $s->satuan; ?>" class="form-control col-md-12">
                    <?= form_error('satuan','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group mb-4">
                    <label for="">Harga Bahan</label>
                    <input type="text" name="harga" value="<?= $s->harga; ?>"class="form-control col-md-8">
                    <?= form_error('harga','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group mb-4">
                    <label for="">Harga Jual</label>
                    <input type="text" name="harga_jual" value="<?= $s->harga; ?>"class="form-control col-md-8">
                    <?= form_error('harga jual','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group mb-4">
                    <label for="">Stok</label>
                    <input type="text" name="stok" value="<?= $s->stok; ?>"class="form-control col-md-8">
                    <?= form_error('stok','<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                    Simpan
                </button>
                <button type="reset"  class="btn btn-warning">
                    <i class="fas fa-undo"></i>
                Reset</button>
                <a href="<?= base_url('/bahan/bahan'); ?>" class="btn btn-secondary">
                    <i class="fas fa-reply"></i>
                Kembali</a>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>