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
			    <a href="<?= base_url('transaksi/kemitraan/tambahData');?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>			
               
			</div>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Nama Mitra</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Tanggal Bergabung</th>
                        <th>Nama Paket</th>
                        <!-- <th>Action</th> -->
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($kemitraan as $s) :?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->nama_lengkap ?></td>
                        <td><?= $s->alamat_lengkap ?></td>
                        <td><?= $s->email ?></td>
                        <td><?= $s->telp ?></td>
                        <td><?= $s->tgl_bergabung ?></td>
                        <td><?= $s->paket ?></td>
					<!--	<td>
                        <center>
					        <a href="<?php echo base_url('kemitraan/kemitraan/updateData/'.$s->id);?>" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
						    <a onclick="return confirm('apakah anda yakin?')" href="<?php echo base_url('kemitraan/kemitraan/deleteData/'.$s->id);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </center> 
                        </td>-->
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