                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Laporan <?= $title ?></h1>
                    </div>
                    <!-- Content Row -->
		
                    <div class="row">
                       <!-- Earnings (Monthly) Card Example -->
					
		            <div class="col-xl-4 mb-4">
		              <div class="card border-left-danger shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                	<div class="col mr-2">
		                    	<div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Analisa Produk Terlaris</div> 
									<div class="col mb-2">
							  			<form target="_blank" action="<?= base_url('transaksi/Analisa/report_analisaproduk') ?>" method="post">
                						<label for="">DARI TANGGAL</label><input type="date" name="tgl1" class="form-control" required autocomplete="off" /> 
									</div>
									<div class="col mb-2">
										<label for="">SAMPAI TANGGAL</label><input type="date" name="tgl2" class="form-control" required autocomplete="off" />
									</div>
										<button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" target="_blank" value="Filter"> 
										<i class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan</a>
										</button>
		                    	</div>
								<div class="col-auto">
								<i class="fas fa-file-download fa-4x text-gray-300"></i>
								</div>
		                  </div>
		                </div>
						</div>
		              </div>
		            </div>
					
					
				<div class="row">
		            <!-- Earnings (Monthly) Card Example -->
		        <!-- /.container-fluid -->
            </div>
            </div>
			</div>
                        <!-- End of Main Content -->

            <!-- Footer -->
 