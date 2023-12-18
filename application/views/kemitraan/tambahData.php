 <!-- Begin Page Content -->
 <div class="container-fluid">
 <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
        
            <?php ?>
            <form method="post" action="<?= base_url('transaksi/Kemitraan/tambahDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Kode outlet</label>
                    <input type="text" name="kode_outlet" readonly value="<?= $kode ?>" class="form-control col-md-5">
                    <?= form_error('kode_outlet','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">NIK</label>
                    <input type="text" name="no_ktp" class="form-control col-md-12" maxlength="16">
                    <?= form_error('no_ktp','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Nama</label>
                    <input type="text" name="nama_lengkap" class="form-control col-md-12">
                    <?= form_error('nama_lengkap','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Alamat Lengkap</label>
                    <input type="text" name="alamat_lengkap" class="form-control col-md-12">
                    <?= form_error('alamat_lengkap','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control col-md-12">
                    <?= form_error('email','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Outlet</label>
                    <input type="text" name="nama_outlet" class="form-control col-md-12">
                    <?= form_error('nama_outlet','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Alamat Outlet</label>
                    <input type="text" name="alamat" class="form-control col-md-12">
                    <?= form_error('alamat','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Koordinat</label>
                    <input readonly type="text" class="form-control col-md-12 mb-2" id="latlong" name="latlong">
                <div class="chart-area">
                    <div class="col-12" id="map"></div>
                </div>
                </div>
                
                <div class="form-group mb-4">
                    <label for="">No Telp outlet</label>
                    <input type="telephone" name="telp" class="form-control col-md-8">
                    <?= form_error('telp','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Tanggal Bergabung</label>
                    <input type="date" name="tgl_bergabung" class="form-control col-md-12">
                    <?= form_error('tgl_bergabung','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Paket</label>
                    <select class="form-control form-select" name="kd_paket" onchange="changeValuePaket(this.value)" aria-label="Default select example">
                            <option selected>--PILIH PAKET--</option>
                            <?php 
                                $jsArray1 = "var prdKodePaket = new Array();\n";
                                foreach($paket as $data):
                                    echo '<option value="'.$data->kode_paket.'">'.$data->nama_paket.'</option> ';
                                    $jsArray1 .= "prdKodePaket['" . $data->kode_paket . "'] = {kdpaket:'" . addslashes($data->kode_paket) . "',harga:'" . addslashes($data->harga) . "'};\n";
                               endforeach;
                                ?>
                    </select>
                    <input type="hidden" name="kode_paket" id="kdpaket" class="form-control col-md-5">
                </div>

                <div class="form-group">
                    <label for="">Harga </label>
                    <input type="text" readonly id="harga" onkeyup="hitung();" class="form-control col-md-5">
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
                    <?= form_error('hak_akses','<div class="text-small text-danger"></div>') ?>
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
<script type="text/javascript">    
    <?php echo $jsArray1; ?>  
    function changeValuePaket(x){  
    document.getElementById('kdpaket').value = prdKodePaket[x].kdpaket;
    document.getElementById('harga').value = prdKodePaket[x].harga;
    }; 
    function hitung(){
        var qty = document.getElementById('qty').value;
        var harga = document.getElementById('harga').value;
        var hasil = parseInt(qty)*parseInt(harga);
        if (!isNaN(hasil)) {
            document.getElementById('total').value = hasil;
        }
    } 
    var map = L.map('map').setView([-3.391251, 114.656078], 16);
        L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        attribution: '© Google Maps',
        maxZoom: 20,}).addTo(map);
		L.marker([-3.391251, 114.656078],{alt: 'Gudang Pondok Coklat'}).addTo(map).bindPopup('Warehouse, Gudang Pondok Coklat');
        var popup = L.popup();

    // buat fungsi popup saat map diklik
    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("koordinatnya adalah " + e.latlng.toString()
                ) //set isi konten yang ingin ditampilkan, kali ini kita akan menampilkan latitude dan longitude
            .openOn(map);   
            
        document.getElementById('latlong').value =  e.latlng //value pada form latitde, longitude akan berganti secara otomatis
    }
    map.on('click', onMapClick);
    </script>