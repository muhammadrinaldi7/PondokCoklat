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
			    <a href="<?= base_url('supplier/Supplier/tambahData');?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>			
                
			</div>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>No Telepon</th>
                        <th>Tanggal Kerjasama</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($supplier as $s) :?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->kode_supplier ?></td>
                        <td><?= $s->nama_supplier ?></td>
                        <td><?= $s->alamat ?></td>
                        <td><?= $s->telp ?></td>
                        <td><?= $s->tgl_kerjasama ?></td>
						<td>
                        <center>
					        <a href="<?php echo base_url('supplier/Supplier/updateData/'.$s->id_supplier);?>" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
						    <a onclick="return confirm('apakah anda yakin?')" href="<?php echo base_url('supplier/Supplier/deleteData/'.$s->id_supplier);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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