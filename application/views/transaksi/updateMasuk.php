 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
            <?php foreach ($bahan_masuk as $s ):?>
            <form method="post" action="<?= base_url('transaksi/Stoksupplier/updateDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Kode Transaksi</label>
                    <input type="text" readonly name="kode_transaksi" value="<?= $s->kode_transaksi; ?>" class="form-control col-md-5">
                    <input type="hidden" name="id_transaksi" value="<?= $s->id_transaksi; ?>" class="form-control col-md-5">
                    <?= form_error('kode_supplier','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Bahan</label>
                    <select class="form-control form-select" name="id_bahan" aria-label="Default select example">
                            <option value="<?= $s->id_bahan?>" selected><?= $s->nama_bahan ?></option>
                            <?php foreach ($bahan as $b):?>
                            <option value="<?= $b->id_bahan ?>"><?= $b->nama_bahan ?></option>
                            <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Nama Supplier</label>
                     <select class="form-control form-select" name="id_supplier" aria-label="Default select example">
                     <option value="<?= $s->id_supplier?>" selected><?= $s->nama_supplier ?></option>
                            <?php foreach ($supplier as $a):?>
                            <option value="<?= $a->id_supplier ?>"><?= $a->nama_supplier ?></option>
                            <?php endforeach;?>
                    </select>
                </div>
                <div class="form-group mb-4">
                    <label for="">Banyaknya</label>
                    <input type="text" name="permintaan" value="<?= $s->permintaan; ?>"class="form-control col-md-8">
                    <?= form_error('permintaan','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group mb-4">
                    <label for="">Tanggal Transaksi</label>
                    <input type="date" name="tgl_transaksi" value="<?= $s->tgl_transaksi; ?>"class="form-control col-md-8">
                    <?= form_error('permintaan','<div class="text-small text-danger"></div>') ?>
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
<script type="text/javascript">    
    
    <?php echo $jsArray1; ?>  
    function changeValueBahan(x){  
    document.getElementById('bahan').value = prdNamaBahan[x].bahan;
    }; 
    <?php echo $jsArray; ?>
    function changeValueSupplier(x){  
    document.getElementById('nama').value = prdName[x].nama;
    document.getElementById('telp').value = prdName[x].telp ;   
    };  
    </script>