                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Halaman <?= $title ?></h1>
                    </div>
                    <!-- Content Row -->
		
                    <div class="row">
                       <!-- Earnings (Monthly) Card Example -->
					<?php if($this->session->userdata('hak_akses')=='1'){ ?>
		            <div class="col-xl-3 col-md-6 mb-4">
		              <div class="card border-left-primary shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2">
		                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Barang Masuk</div>
		                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $bahan_masuk ?></div>
		                    </div>
		                    <div class="col-auto">
		                      <i class="fas fa-box fa-2x text-gray-300"></i>
		                    </div>
		                  </div>
		                </div>
		              </div>
		            </div>

		            <!-- Earnings (Monthly) Card Example -->
		            <div class="col-xl-3 col-md-6 mb-4">
		              <div class="card border-left-success shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2">
		                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah Supplier</div>
		                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $supplier ?></div>
		                    </div>
		                    <div class="col-auto">
		                      <i class="fas fa-cash-register fa-2x text-gray-300"></i>
		                    </div>
		                  </div>
		                </div>
		              </div>
		            </div>

		            <!-- Earnings (Monthly) Card Example -->
		            <div class="col-xl-3 col-md-6 mb-4">
		              <div class="card border-left-info shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2">
		                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Permintaan</div>
		                      <div class="row no-gutters align-items-center">
		                        <div class="col-auto">
		                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $bahan_keluar ?></div>
		                        </div>
		                      </div>
		                    </div>
		                    <div class="col-auto">
		                      <i class="fas fa-file-invoice fa-2x text-gray-300"></i>
		                    </div>
		                  </div>
		                </div>
		              </div>
		            </div>

		            <!-- Pending Requests Card Example -->
		            <div class="col-xl-3 col-md-6 mb-4">
		              <div class="card border-left-warning shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                    <div class="col mr-2">
		                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Outlet</div>
		                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $outlet ?></div>
		                    </div>
		                    <div class="col-auto">
		                      <i class="fas fa-users fa-2x text-gray-300"></i>
		                    </div>
		                  </div>
		                </div>
		              </div>
		            </div>
					<?php } ?>
		          </div>
                  <div class="col-md-6">
						<div class="card shadow">
							<div class="card-header"><strong>User Sedang Login</strong></div>
							<div class="card-body">
								<strong>Username : </strong><br>
								<input type="text" value="<?= $this->session->userdata('username') ?>" readonly class="form-control mt-2 mb-2">
								<strong>Role : </strong><br>
								<?php if ($this->session->userdata('hak_akses')=='1'){
									$role = 'Admin';
									}else{
										$role = 'Outlet';
									}
									?>
								<input type="text" value="<?= $role ?>" readonly class="form-control mt-2 mb-2">
							</div>				
						</div>
		          	</div> <br>
					  <?php if ($this->session->userdata('hak_akses')=='2'){ ?>
						<div class="col-md-12">
						<div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Stok</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardExample" style="">
                                    <div class="card-body">
									<table class="table table-striped table-bordered table-hover" id="dataTable">
										<thead>
											<th>No.</th>
											<th>Nama Bahan</th>
											<th>Qty</th>
										</thead>
										<tbody>
											<?php
											$no = 1; 
											foreach($stok as $s): ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $s->nama_bahan ?></td>
												<td><?= $s->qty ?></td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
                                    </div>
                                </div>
                            </div>
											</div>
					<?php } ?>
					<div class="col-md-12">
					<div class="card shadow mb-4">
                                <div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">Lokasi Outlet</h6>
                                </div>
                                <div class="card-body">								
                                    <div class="chart-area">
                                        <div id="map"></div>
                                    </div>
                                </div>
                    </div>
					</div>
					
					

                </div>
                <!-- /.container-fluid -->
			</div>
			<script type="text/javascript">
				var map = L.map('map').setView([-3.391251, 114.656078], 11);

				L.tileLayer('https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        attribution: '© Google Maps',
        maxZoom: 20, //menggunakan peta model streets-v11 kalian bisa melihat jenis-jenis peta lainnnya di web resmi mapbox
					
				}).addTo(map);
				L.marker([-3.391251, 114.656078],{alt: 'Gudang Pondok Coklat'}).addTo(map).bindPopup('Warehouse, Gudang Pondok Coklat');
				<?php
				foreach($lokasi as $l):
				?>
				L.marker([<?php echo str_replace(['[', ']', 'LatLng', '(', ')'], '', $l->koordinat); ?>],{alt: 'Gudang Pondok Coklat'}).addTo(map).bindPopup('<?= 'Kode Outlet:'.$l->kode_outlet.'<br>Nama Oulet:'.$l->nama_lokasi; ?>');
				<?php endforeach; ?>
			</script>
			
                        <!-- End of Main Content -->

            <!-- Footer -->
 