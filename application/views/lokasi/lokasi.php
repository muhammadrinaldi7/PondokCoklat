 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
            <?php echo $this->session->flashdata('pesan')?>            
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
            <div class="float-right mt-4">
			    <a href="<?= base_url('lokasi/lokasi/tambahData');?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>			
               
			</div>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Lokasi</th>
                        <th>Alamat</th>
                        <th>Koordinat</th>
                        <th>Keterangan</th>
                         <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($lokasi as $s) :?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->nama_lokasi ?></td>
                        <td><?= $s->alamat ?></td>
                        <td><?= $s->koordinat ?></td>
                        <td><?= $s->keterangan ?></td>
						<td>
                        <center>
					        <a href="<?php echo base_url('lokasi/lokasi/updateData/'.$s->kode_outlet);?>" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
						    <a onclick="return confirm('apakah anda yakin?')" href="<?php echo base_url('lokasi/lokasi/deleteData/'.$s->kode_outlet);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </center> 
                        </td>
			    	</tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        
    </div>
</div>
<div class="col-md-12">
					<div class="card shadow mb-4">
                                <div class="card-header py-3">
									
                                    <h6 class="m-0 font-weight-bold text-primary">Saran Lokasi</h6>
                                </div>
                                <div class="card-body">								
                                    <div class="chart-area">
                                        <div id="map"></div>
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
                <?php
				foreach($saran as $l):
				?>
				L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $l->koordinat); ?>],{alt: 'Gudang Pondok Coklat'}).addTo(map).bindPopup('<?= 'Kode Outlet:'.$l->kode_outlet.'<br>Nama Oulet:'.$l->nama_lokasi; ?>');
				<?php endforeach; ?>
</script>
<!-- End of Main Content -->
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->