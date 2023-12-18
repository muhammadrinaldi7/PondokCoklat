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
			    <a href="<?= base_url('admin/User/tambahData');?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>			
               
			</div>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Hak Akses</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($user as $s) :?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $s->username ?></td>
                        <td><?= $s->password ?></td>
                        <td><?php 
                        if ($s->hak_akses == '1'){
                            echo 'Admin';
                        }else{
                            echo 'Outlet';
                        } ?></td>
						<td>
                        <center>
					        <a onclick="return confirm('apakah anda yakin?')" href="<?php echo base_url('admin/User/deleteData/'.$s->id);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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