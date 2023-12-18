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
											<div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Cetak Penjualan Hari Ini</div> 
												<div class="col mb-2">							  			
													<a href="<?php echo base_url('transaksi/Seller/report_seller');?>"class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" target="_blank" value="Filter"> 
													<i class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan</a>
													</a>
												</div>
											<div class="col-auto">
											<i class="fas fa-file-download fa-4x text-gray-300"></i>
											</div>
									</div>
								</div>
							</div>
						</div>
		            </div>
					
					
			</div>
				<div class="row">
		            <!-- Earnings (Monthly) Card Example -->
		        <!-- /.container-fluid -->
				<div class="col-xl-4 mb-4">
		              <div class="card border-left-danger shadow h-100 py-2">
		                <div class="card-body">
		                  <div class="row no-gutters align-items-center">
		                	<div class="col mr-2">
		                    	<div class="text-xl font-weight-bold text-danger text-uppercase mb-1">Cetak Penjualan Per Periode</div> 
									<div class="col mb-2">							  			
										<form method="POST" target="_blank" action="<?php echo base_url('transaksi/Seller/report_sellerpertgl');?>">
											<input hidden type="text" value ="<?= $this->session->userdata('hak_akses'); ?>" name="hak" >
											<label for="">Dari Tanggal</label>
                    						<input type="date" name="tgl1" class="form-control"><br>
											<label for="">Sampai Tanggal</label>
                    						<input type="date" name="tgl2" class="form-control"><br>
											<button class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" type="submit"><i class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan</button>
										</form>
		                    	</div>
								
		                  </div>
		                </div>
						</div>
		              </div>
		            </div>
            </div>
            </div>
			</div>
                        <!-- End of Main Content -->

            <!-- Footer -->
 