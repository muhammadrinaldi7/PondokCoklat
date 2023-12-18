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
    
    <?php     
    if ($hak == '2'){?>
    <table class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                        <th>NO</th>
                        <th>Nama Outlet</th>
                        <th>Nama Bahan</th>
                        <th>Banyaknya</th>
                        <th>Total Penjualan</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($liat as $s) :?>
                <tr>
                    <td><center><?php echo $no++; ?></center></td>
                        <td><?= $s->nama_outlet ?></td>
                        <td><?= $s->nama_bahan ?></td>
                        <td><?= $s->qty ?></td>
                        <td><?= rupiah($s->total) ?></td>
                </tr>
            <?php endforeach ?>
            <tr>
                    <td colspan="3"><b>TOTAL</b></td>
                        <td><b><?= $s->jumlhqty ?></b></td>
                        <td><b><?= rupiah($s->jumlhtotal) ?></b></td>
                    
                </tr>
        </tbody>
    </table>
    <?php }else{ ?>
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
        <?php $no=1; foreach($liat3 as $d) :?>
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
    <?php $no=1; foreach ($liat1 as $p):?>
    <table style="font-size:14px" border="0px solid">
    
        <tr>
            <td style="padding: 10px"><?= $no++; ?></td>
            <td>Nama Outlet </td>
            <td style="padding-right: 54px"></td>
            <td> <b> : <?= $p->nama_outlet ?></b></td>
        </tr>
        <tr>
            <td style="padding: 10px"></td>
            <td>Jumlah Total Terjual</td>
            <td style="padding-right: 54px"></td>
            <td>: <?= $p->jumlhqty ?></td>
        </tr>
        <tr>
            <td style="padding: 10px"></td>
            <td>Jumlah Total Penjualan</td>
            <td style="padding-right: 54px"></td>
            <td>: <u> <?= rupiah($p->jumlhtotal) ?></u></td>
        </tr>
    </table>
    <br>
    <?php endforeach; ?>
 
    <?php } ?>
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