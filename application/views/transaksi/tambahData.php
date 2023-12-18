 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
            <?php ?>
            <form method="post" action="<?= base_url('transaksi/Stoksupplier/tambahDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Kode Transaksi</label>
                    <input type="text" name="kode_transaksi" readonly value="<?= $kode ?>" class="form-control col-md-5">
                    <?= form_error('kode_supplier','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Pilih Permintaan Bahan</label>
                    <select class="form-control form-select" name="id_bahan" onchange="changeValueBahan(this.value)" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <?php 
                                $jsArray1 = "var prdNamaBahan = new Array();\n";
                                foreach($bahan as $data):
                                    echo '<option value="'.$data->id_bahan.'">'.$data->nama_bahan.'</option> ';
                                    $jsArray1 .= "prdNamaBahan['" . $data->id_bahan . "'] = {bahan:'" . addslashes($data->nama_bahan) . "'};\n";
                               endforeach;
                                ?>
                    </select>
                    <input type="hidden" name="bahan" id="bahan" class="form-control col-md-5">
                    
                </div>
                <div class="form-group">
                    <label for="">Banyaknya</label>
                    <input type="number" name="permintaan"  class="form-control col-md-5">
                    
                </div>
                <div class="form-group">
                    <label for="">Total Harga</label>
                    <input type="text" name="total"  class="form-control col-md-5">
                </div>
                <div class="form-group">
                    <label for="">Tanggal Masuk</label>
                    <input type="date" name="tgl_transaksi"  class="form-control col-md-5">
                </div>
                <div class="form-group">
                    <label for="">Pilih Supplier</label>
                    <select class="form-control form-select" name="id_supplier" onchange="changeValueSupplier(this.value)" aria-label="Default select example">
                            <option disabled selected>Open this select menu</option>
                            <?php 
                                $jsArray = "var prdName = new Array();\n";
                                foreach($supplier as $data):
                                    echo '<option value="'.$data->id_supplier.'">'.$data->nama_supplier.'</option> ';
                                    $jsArray .= "prdName['" . $data->id_supplier . "'] = {nama:'" . addslashes($data->alamat) . "',telp:'" . addslashes($data->telp) . "'};\n";
                               endforeach;
                                ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label for="">Alamat Supplier</label>
                    <input type="text" readonly id="nama" class="form-control col-md-8">
                </div>
                <div class="form-group mb-4">
                    <label for="">No Telp Supplier</label>
                    <input type="text" readonly id="telp" name="telp" class="form-control col-md-8">
                </div>
                <button type="submit" class="btn btn-success">
                <i class="fas fa-save"></i>
                    Kirim Permintaan
                </button>
                <button type="reset"  class="btn btn-warning">
                    <i class="fas fa-undo"></i>
                Reset</button>
                <a href="<?= base_url('/transaksi/stoksupplier'); ?>" class="btn btn-secondary">
                    <i class="fas fa-reply"></i>
                Kembali</a>
            </form>
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