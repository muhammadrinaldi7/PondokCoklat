 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
    <div class="card shadow mb-4" style="width:50%">
        <div class="card-body">
            <?php ?>
            <form method="post" action="<?= base_url('lokasi/lokasi/tambahDataAksi'); ?>">
                <div class="form-group">
                    <label for="">Kode</label>
                    <input type="text" name="kode" readonly value="<?= $kode ?>" class="form-control col-md-5">
                    <?= form_error('kode','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Nama Lokasi</label>
                    <input type="text" name="nama_lokasi" class="form-control col-md-12" required>
                    <?= form_error('nama_lokasi','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Koordinat</label>
                    <input readonly type="text" class="form-control col-md-12 mb-2" id="latlong" name="latlong">
                <div class="chart-area">
                    <div class="col-12" id="map"></div>
                </div>
                </div>
                <div class="form-group">
                    <label for="">Alamat</label>
                    <input type="text" name="alamat" class="form-control col-md-10" required>  
                    <?= form_error('alamat','<div class="text-small text-danger"></div>') ?>
                </div>
                <div class="form-group">
                    <label for="">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control col-md-10" required>  
                    <?= form_error('keterangan','<div class="text-small text-danger"></div>') ?>
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
<script type="text/javascript">    
    var map = L.map('map').setView([-3.391251, 114.656078], 13);
        L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        attribution: '© Google Maps',
        maxZoom: 20,}).addTo(map);
		L.marker([-3.391251, 114.656078],{alt: 'Gudang Pondok Coklat'}).addTo(map).bindPopup('Warehouse, Gudang Pondok Coklat');
        <?php
				foreach($lokasi as $l):
				?>
				L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $l->koordinat); ?>],{alt: 'Gudang Pondok Coklat'}).addTo(map).bindPopup('<?= 'Kode Outlet:'.$l->kode_outlet.'<br>Nama Oulet:'.$l->nama_lokasi; ?>');
				<?php endforeach; ?>
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