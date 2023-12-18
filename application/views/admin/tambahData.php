 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
            <?php echo $this->session->flashdata('pesan')?>   
            <form method="post" action="<?= base_url('admin/User/tambahDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" name="username" class="form-control col-md-12">
                    <?= form_error('username','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control col-md-12">
                    <?= form_error('password','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Hak Akses</label>
                    <select class="form-control" name="hak_akses">
                        <option disabled selected>--Pilih Hak Akses--</option>
                        <option value="1">Admin</option>
                        <option value="2">Outlet</option>
                    </select>
                    <?= form_error('hak_akses','<div class="text-small text-danger"></div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i>
                    Simpan
                </button>
                <button type="reset"  class="btn btn-warning">
                    <i class="fas fa-undo"></i>
                Reset</button>
                <a href="<?= base_url('/admin/user'); ?>" class="btn btn-secondary">
                    <i class="fas fa-reply"></i>
                Kembali</a>
            </form>
        </div>
    </div>
</div>
</div>