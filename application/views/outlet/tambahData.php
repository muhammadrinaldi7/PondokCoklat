 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
            <?php ?>
            <form method="post" action="<?= base_url('outlet/outlet/tambahDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Kode outlet</label>
                    <input type="text" name="kode_outlet" readonly value="<?= $kode ?>" class="form-control col-md-5">
                    <?= form_error('kode_outlet','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Nama outlet</label>
                    <input type="text" name="nama_outlet" class="form-control col-md-12">
                    <?= form_error('nama_outlet','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Alamat outlet</label>
                    <input type="text" name="alamat" class="form-control col-md-12">
                    <?= form_error('alamat','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group mb-4">
                    <label for="">No Telp outlet</label>
                    <input type="telephone" name="telp" class="form-control col-md-8">
                    <?= form_error('telp','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Bergabung</label>
                    <input type="date" name="tgl" class="form-control col-md-12">
                    <?= form_error('tgl','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" readonly value="<?= $kode ?>" class="form-control col-md-12">
                    <?= form_error('username','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control col-md-12">
                    <?= form_error('password','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Hak Akses</label>
                    <input type="text" readonly name="hak_akses" value="Outlet" class="form-control col-md-12">
                    <?= form_error('alamat','<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                    Simpan
                </button>
                <button type="reset"  class="btn btn-warning">
                    <i class="fas fa-undo"></i>
                Reset</button>
                <a href="<?= base_url('/outlet/outlet'); ?>" class="btn btn-secondary">
                    <i class="fas fa-reply"></i>
                Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>