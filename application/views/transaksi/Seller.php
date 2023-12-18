 <!-- Begin Page Content -->
 <div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
            <?php echo $this->session->flashdata('pesan')?>  
            <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <table class="table table-bordered table-striped table-hover dataTable" aria-describedby="dataTable_info" id="dataTable" role="grid" width="100%" cellspacing="0">
            <div class="float-right mt-4">
			    <a href="<?= base_url('transaksi/Seller/tambahData');?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>			
         
			</div>
                <thead>
                    <tr>
                        <th class="sorting">No.</th>
                        <th>Kode Outlet</th>
                        <th>Nama Bahan</th>
                        <th>Jumlah Penjualan</th>
                        <th>Total Penjualan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no=1;
                foreach($liat as $s) : ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->kode_outlet ?></td>
                        <td><?= $s->nama_bahan ?></td>
                        <td><?= $s->qty ?></td>
                        <td><?= rupiah($s->total) ?></td>
                        <td><?= $s->tanggal ?></td>
                        <td>
                        <a href="<?php echo base_url('transaksi/seller/updateData/'.$s->id);?>" class="btn btn-success btn-sm"><i class="fa fa-pen"></i></a>
						    <a onclick="return confirm('apakah anda yakin?')" href="<?php echo base_url('transaksi/seller/deleteData/'.$s->id);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
			    	</tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </div>        
            </div>  
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->