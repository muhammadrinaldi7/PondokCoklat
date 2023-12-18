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
            <?php if ($this->session->userdata('hak_akses')=='2'){?>
			    <a href="<?= base_url('transaksi/stoksupplier/tambahData');?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>			
            <?php } ?>
			</div>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Bahan</th>
                        <th>Permintaan</th>
                        <th>Nama Outlet</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($liat as $s) :?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->kode_transaksi ?></td>
                        <td><?= $s->nama_bahan ?></td>
                        <td><?= $s->permintaan ?></td>
                        <td><?= $s->kode_outlet ?></td>
                        <td><?= $s->status ?></td>
						<td>
                        <center>
					        <!--<a href="<?php echo base_url('transaksi/Stoksupplier/updateData/'.$s->id);?>" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>-->
						    <a onclick="return confirm('apakah anda yakin?')" href="<?php echo base_url('transaksi/Penjualan/deleteData/'.$s->id);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </center>
                        </td>
			    	</tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->