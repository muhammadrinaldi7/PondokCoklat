 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<div class="card shadow mb-4">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Orderan Terbaru</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse" id="collapseCardExample1" style="">
                                    <div class="card-body">
                                         <?php echo $this->session->flashdata('pesan')?>   
            <div class="table-responsive">         
            <table class="table table-bordered table-striped" width="100%" cellspacing="0">
            <div class="float-right mt-4">
			    <a href="<?= base_url('transaksi/Orderan/tambahData');?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a><br><br>		
         
			</div>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Bahan</th>
                        <th>Permintaan</th>
                        <?php if ($this->session->userdata('hak_akses')=='1'){?>
                        <th>Outlet Pengorder</th>
                        <th>Telp Outlet</th>
                        <th>Alamat Outlet</th>
                        <?php } ?>
                        <th>Tanggal Transaksi</th>
                        <th>Tanggal Estimasi </th>
                        <th>Status</th>
                        <?php if ($this->session->userdata('hak_akses')=='1'){?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                <?php  
                if($this->session->userdata('hak_akses') =='2'){
                $no=1;
                foreach($oliat as $s) : ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->kode_transaksi ?></td>
                        <td><?= $s->nama_bahan ?></td>
                        <td><?= $s->permintaan ?></td>
                        <td><?= $s->tgl_transaksi?></td>
                        <td><?= $s->tgl_estimasi?></td>
                        <td><?= $s->status ?></td>
			    	</tr>
                <?php endforeach;
                } ?>
                <?php  
                if($this->session->userdata('hak_akses') =='1'){
                $no=1;
                foreach($liat as $s) : ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->kode_transaksi ?></td>
                        <td><?= $s->nama_bahan ?></td>
                        <td><?= $s->permintaan ?></td>
                        <td><?= $s->nama_outlet ?></td>
                        <td><?= $s->telp ?></td>
                        <td><?= $s->alamat ?></td>
                        <td><?= $s->tgl_transaksi?></td>
                        <td><?= $s->tgl_estimasi?></td>
                        <td><?= $s->status ?></td>
                        <?php if ($this->session->userdata('hak_akses')=='1'){?>
						<td class="project-actions text-right">                            
                            <?php if ($s->status == 'Dikirim') {
                            echo '<center><a class="btn btn-primary col-md-12 disabled">Konfirmasi <i class="fa fa-check"></i></a></center>';
                         }else{?>
                        <center>
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#verifikasi">
                          <i class="fa fa-check"></i>  Konfirmasi
                        </button>
                        </center>
                        <!-- Modal -->
                        <div class="modal fade" id="verifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Estimasi Pengiriman
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body shadow mb-4" id="modal-body">
                                <form action="<?php echo base_url('transaksi/Orderan/updateDataKirim'); ?>" method="post">
                                  <!-- id -->
                                  <input type="hidden" class="form-control" name="id" id="" value="<?= $s->id ?>">
                                  <!-- ditolak pt.2 -->
                                  <div class="form-group">
                                    <label><b>Estimasi Pengiriman</b></label>
                                    <input type="datetime-local" class="form-control" name="tgl_estimasi">
                                  </div>
                                  <div class="form-group">
                                    <label><b>Status</b></label>
                                    <select name="status" class="form-control form-select">
                                        <option value="Dikirim">Dikirim</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                  </div>
                                  <button type="submit" onclick="return confirm('Konfirmasi Pengiriman?')" class="btn btn-primary col-md-12"> Submit</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
					        <!-- <a onclick="return confirm('Konfirmasi Pengiriman?')" href="<?php //echo base_url('transaksi/Orderan/updateDataKirim/'.$s->id);?>" class="btn btn-success btn-sm">Konfirmasi <i class="fa fa-check"></i></a> -->
                       
                        <?php } ?>
                        
                        </td>
                        <?php } ?>
			    	</tr>
                <?php endforeach;
                } ?>
                </tbody>
            </table>
            </div>
                                    </div>
                                </div>
                            </div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
      <!-- Card Header - Accordion -->
      <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
        <h6 class="m-0 font-weight-bold text-primary">Riwayat Orderan</h6>
      </a>
                                <!-- Card Content - Collapse -->
      <div class="collapse" id="collapseCardExample" style="">
            <div class="card-body">
            <?php echo $this->session->flashdata('pesan')?>   
            <div class="table-responsive">         
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
            <div class="float-right mt-4">
			  
         
			</div>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Bahan</th>
                        <th>Permintaan</th>
                        <th>Outlet Pengorder</th>
                        <th>Telp Outlet</th>
                        <th>Alamat Outlet</th>
                        <th>Tanggal Transaksi</th>
                        <th>Tanggal Estimasi</th>
                        <th>Status</th>
                        <?php if ($this->session->userdata('hak_akses')=='1'){?>
                        <th>Action</th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                <?php  
                if($this->session->userdata('hak_akses') =='2'){
                $no=1;
                foreach($oliat1 as $s) : ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->kode_transaksi ?></td>
                        <td><?= $s->nama_bahan ?></td>
                        <td><?= $s->permintaan ?></td>
                        <td><?= $s->nama_outlet ?></td>
                        <td><?= $s->telp ?></td>
                        <td><?= $s->alamat ?></td>
                        <td><?= $s->tgl_transaksi?></td>
                        <td><?= $s->tgl_estimasi?></td>
                        <td><?= $s->status ?></td>
			    	</tr>
                <?php endforeach;
                } ?>
                <?php  
                if($this->session->userdata('hak_akses') =='1'){
                $no=1;
                foreach($liat1 as $s) : ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->kode_transaksi ?></td>
                        <td><?= $s->nama_bahan ?></td>
                        <td><?= $s->permintaan ?></td>
                        <td><?= $s->nama_outlet ?></td>
                        <td><?= $s->telp ?></td>
                        <td><?= $s->alamat ?></td>
                        <td><?= $s->tgl_transaksi?></td>
                        <td><?= $s->tgl_estimasi?></td>
                        <td><?= $s->status ?></td>
                        <?php if ($this->session->userdata('hak_akses')=='1'){?>
						<td class="project-actions text-right">                            
                            <?php if ($s->status == 'Dikirim') {
                            echo '<center><a class="btn btn-primary col-md-12 disabled">Konfirmasi <i class="fa fa-check"></i></a></center>';
                         }else{?>
                        <center>
                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#verifikasi">
                          <i class="fa fa-check"></i>  Konfirmasi
                        </button>
                        </center>
                        <!-- Modal -->
                        <div class="modal fade" id="verifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Estimasi Pengiriman
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body shadow mb-4" id="modal-body">
                                <form action="<?php echo base_url('transaksi/Orderan/updateDataKirim'); ?>" method="post">
                                  <!-- id -->
                                  <input type="hidden" class="form-control" name="id" id="" value="<?= $s->id ?>">
                                  <!-- ditolak pt.2 -->
                                  <div class="form-group">
                                    <label><b>Estimasi Pengiriman</b></label>
                                    <input type="datetime-local" class="form-control" name="tgl_estimasi">
                                  </div>
                                  <div class="form-group">
                                    <label><b>Status</b></label>
                                    <select name="status" class="form-control form-select">
                                        <option value="Dikirim">Dikirim</option>
                                        <option value="Pending">Pending</option>
                                    </select>
                                  </div>
                                  <button type="submit" onclick="return confirm('Konfirmasi Pengiriman?')" class="btn btn-primary col-md-12"> Submit</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
					        <!-- <a onclick="return confirm('Konfirmasi Pengiriman?')" href="<?php //echo base_url('transaksi/Orderan/updateDataKirim/'.$s->id);?>" class="btn btn-success btn-sm">Konfirmasi <i class="fa fa-check"></i></a> -->
                       
                        <?php } ?>
                        
                        </td>
                        <?php } ?>
			    	</tr>
                <?php endforeach;
                } ?>
                </tbody>
            </table>
            </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->
              </div>
</div>
<!-- End of Main Content -->

