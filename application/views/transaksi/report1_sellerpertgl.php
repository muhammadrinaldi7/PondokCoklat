<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style type="text/css">
        body {
            font-family: Arial;
            color: black;
        }
    </style>
</head>

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

<body onLoad="window.print()">
<table border="0px solid" align="center" width="100%">
        <tr align="center">
        <td>
                <img width="120px" src="<?= base_url() ?>assets/img/lg.jpg">
            </td>
            <td align="left">
                <h2 style="margin-left: 120px;">CV. HATTA PUTRA BORNEO</h2>
            </td>
        </tr>
        <tr align="center">
            <td colspan="3">
                <font size="3">Jl. A. Yani No.65, Banua Hanyar, Kec. Kertak Hanyar, Kabupaten Banjar, Kalimantan Selatan 70652</font>
            </td>
        </tr>
        <tr align="center">
            <td colspan="3">
                <font size="3">Telp. (0813) 0999 8666</font>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <hr  color="black">
            </td>
        </tr>
    </table>
    <div style="text-align: center;font-size:22px">
        LAPORAN PENJUALAN OUTLET PER PERIODE
    </div>
    <br>
    <div style="text-align: left;font-size:14px;margin-bottom:5px">
    PRIODE : <?= tgl_indo($tgl1)?> - <?= tgl_indo($tgl2)?>
    </div>
    
    <table class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                        <th>NO</th>
                        <th>Nama Outlet</th>
                        <th>Nama Bahan</th>
                        <th>Banyasdaaknya</th>
                        <th>Total Penjualan</th>
            </tr>
        </thead>
        
        <tbody>
        <?php 
        $qry = $this->db->query("SELECT penjualan.tanggal,outlet.nama_outlet,bahan.nama_bahan,penjualan.qty,penjualan.total,SUM(penjualan.qty)OVER(PARTITION by penjualan.kode_outlet) jumlhqty, SUM(penjualan.total)OVER(PARTITION by penjualan.kode_outlet) jumlhtotal 
        FROM `penjualan` LEFT JOIN outlet on outlet.kode_outlet = penjualan.kode_outlet 
        LEFT JOIN bahan on bahan.kode_bahan = penjualan.kode_bahan 
        WHERE penjualan.tanggal between '2023-01-01' and '2023-08-01'")->result();
        $no=1; foreach($qry as $d) :?>
            
                <tr>
                    <td><center><?php echo $no++; ?></center></td>
                        <td><?= $d->nama_outlet ?></td>
                        <td><?= $d->nama_bahan ?></td>
                        <td><?= $d->qty ?></td>
                        <td><?= rupiah($d->total) ?></td>
                </tr>
                <?php endforeach ?>
                
        </tbody>
    </table>
    

    <!-- AKHIRAN HALAMAN -->


    <!-- MULAI HALAMAN -->

    <br><br><br>

    <div style="text-align: left; display: inline-block; float: left; margin-right: 50px;">
        <label>
            <br><br>
            Dibuat Oleh :
            <br>
            <p style="text-align: center;">
                <b>STAFF HRD</b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u>_______________________</u></b><br>
            </p>
        </label>
    </div>

    <div style="text-align: left; display: inline-block; float: right; margin-right: 50px;">
        <label>
        Banjarmasin, <?= tgl_indo(date('Y-m-d')) ?>
            <br><br>
            Mengetahui : <br>
            <p style="text-align: center;">
                <b>MANAGER HRD</b>
            </p>
            <br><br><br><br><br>
            <p style="text-align: center;">
                <b><u>_______________________</u></b><br>

            </p>
        </label>
    </div>

</body>

</html>