 <!-- Begin Page Content -->
 <?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
} ?>
 <div class="container-fluid">
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
            <?php echo $this->session->flashdata('pesan')?>            
            <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
            <div class="float-right mt-4">
			    <a href="<?= base_url('transaksi/stoksupplier/tambahData');?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp;Tambah</a>			
              
			</div>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Bahan</th>
                        <th>Banyaknya</th>
                        <th>Nama Supplier</th>
                        <th>Telp Supplier</th>
                        <th>Tanggal Transaksi</th>
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
                        <td><?= $s->nama_supplier ?></td>
                        <td><?= $s->telp ?></td>
                        <td><?= tgl_indo(date('Y-m-d', strtotime($s->tgl_transaksi))) ?></td>
						<td>
                        <center>
					        <a href="<?php echo base_url('transaksi/Stoksupplier/updateData/'.$s->id_transaksi);?>" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></a>
						    <a onclick="return confirm('apakah anda yakin?')" href="<?php echo base_url('transaksi/stoksupplier/deleteData/'.$s->id_transaksi);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
