 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
            <?php ?>
            <form method="post" action="<?= base_url('transaksi/Orderan/tambahDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Kode Transaksi</label>
                    <input type="text" name="kode_transaksi" readonly value="<?= $kode ?>" class="form-control col-md-5">
                    <?= form_error('kode_supplier','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Transaksi</label>
                    <input type="datetime-local" readonly name="tgl_transaksi" value="<?php echo date('Y-m-d H:i:s') ?>"  class="form-control col-md-5">
                </div>
                <?php if ($this->session->userdata('hak_akses')=='1'){?>
                <div class="form-group">
                    <label for="">Pilih Outlet</label>
                    <select required class="form-control form-select" name="kode_outlet" id="">
                        <option selected disabled>Pilih Outlet</option>
                        <?php foreach ($outlet as $o):?>
                        <option value="<?php echo $o->kode_outlet?>"><?php echo $o->nama_outlet?></option>
                      <?php endforeach; ?>
                    </select>
                </div>
                <?php } ?>
                
                <?php if ($this->session->userdata('hak_akses')=='2'){?>
                    <div class="form-group">
                    <label for="">Nama Outlet</label>
                    <input required type="text" class="form-control col-md-5" name="kode_outlet" readonly value="<?php echo $this->session->userdata('username') ?>">
                    </div>
                <?php } ?>
                <div class="form-group">
                    <label for="">Pilih Permintaan Bahan</label>
                    <select class="form-control form-select" name="id_bahan" onchange="changeValueBahan(this.value)" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <?php 
                                $jsArray1 = "var prdNamaBahan = new Array();\n";
                                foreach($bahan as $data):
                                    echo '<option value="'.$data->id_bahan.'">'.$data->nama_bahan.'</option> ';
                                    $jsArray1 .= "prdNamaBahan['" . $data->id_bahan . "'] = {bahan:'" . addslashes($data->nama_bahan) . "',harga:'" . addslashes($data->harga) . "'};\n";
                               endforeach;
                                ?>
                    </select>
                    <input type="hidden" name="nama_bahan" id="bahan" class="form-control col-md-5">
                    
                </div>
                <div class="form-group">
                    <label for="">Harga </label>
                    <input type="text" readonly id="harga" onkeyup="hitung();" class="form-control col-md-5">
                </div>
                <div class="form-group">
                    <label for="">Banyaknya</label>
                    <input required type="number" name="permintaan" onkeyup="hitung();" id="qty" class="form-control col-md-5">                    
                </div>
                <div class="form-group">
                    <label for="">Total Harga</label>
                    <input type="text" readonly name="total" id="total" class="form-control col-md-5">
                </div>
               
                <button type="submit" class="btn btn-success">
                <i class="fas fa-paper-plane"></i>
                    Kirim Permintaan
                </button>
                <button type="reset"  class="btn btn-warning">
                    <i class="fas fa-undo"></i>
                Reset</button>
                <a href="<?= base_url('/transaksi/Orderan'); ?>" class="btn btn-secondary">
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
    document.getElementById('harga').value = prdNamaBahan[x].harga;
    }; 
    function hitung(){
        var qty = document.getElementById('qty').value;
        var harga = document.getElementById('harga').value;
        var hasil = parseInt(qty)*parseInt(harga);
        if (!isNaN(hasil)) {
            document.getElementById('total').value = hasil;
        }
    } 
    </script>