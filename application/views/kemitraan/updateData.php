 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
            <?php foreach ($outlet as $s ):?>
            <form method="post" action="<?= base_url('outlet/outlet/updateDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Kode Outlet</label>
                    <input type="hidden" name="id_outlet" value="<?= $s->id_outlet; ?>" class="form-control col-md-5">
                    <input type="text" name="kode_outlet" readonly value="<?= $s->kode_outlet ?>" class="form-control col-md-5">
                    <?= form_error('kode_outlet','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Outlet</label>
                    <input type="text" name="nama_outlet" value="<?= $s->nama_outlet; ?>" class="form-control col-md-12">
                    <?= form_error('nama_outlet','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Alamat outlet</label>
                    <input type="text" name="alamat" value="<?= $s->alamat; ?>" class="form-control col-md-12">
                    <?= form_error('alamat','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group mb-4">
                    <label for="">No Telp Outlet</label>
                    <input type="text" name="telp" value="<?= $s->telp; ?>" class="form-control col-md-8">
                    <?= form_error('telp','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Bergabung</label>
                    <input type="date" name="tgl" value="<?= $s->tgl_bergabung; ?>" class="form-control col-md-12">
                    <?= form_error('tgl','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" readonly value="<?= $s->username; ?>" class="form-control col-md-12">
                    <?= form_error('username','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" value="<?= $s->password; ?>" class="form-control col-md-12">
                    <?= form_error('password','<div class="text-small text-danger"></div>') ?>
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
            <?php endforeach; ?>
        </div>
    </div>
</div>
</div>