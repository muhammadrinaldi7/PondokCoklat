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
			<!-- <a href="<?= base_url('outlet/outlet/tambahData');?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>			-->
               
			</div>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode outlet</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Tanggal Bergabung</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($outlet as $s) :?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->kode_outlet ?></td>
                        <td><?= $s->nama_outlet ?></td>
                        <td><?= $s->alamat ?></td>
                        <td><?= $s->telp ?></td>
                        <td><?= $s->tgl_bergabung ?></td>
						<td>
                        <center>
					        <a href="<?php echo base_url('outlet/outlet/updateData/'.$s->id_outlet);?>" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
						   <!-- <a onclick="return confirm('apakah anda yakin?')" href="<?php echo base_url('outlet/outlet/deleteData/'.$s->kode_outlet);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>-->
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