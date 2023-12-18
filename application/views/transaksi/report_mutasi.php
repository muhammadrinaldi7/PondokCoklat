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
function rupiah($angka)
{

    $hasil_rupiah = "Rp " . number_format($angka, 0, ',', '.');
    return $hasil_rupiah;
}
?>

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
        LAPORAN MUTASI BAHAN 
    </div>
    <br>
    <div style="text-align: left;font-size:14px;margin-bottom:5px">
        PRIODE : <?php echo strtoupper(tgl_indo($tgl1)); ?> - <?php echo strtoupper(tgl_indo($tgl2)); ?>
    </div>
    
    <table class="table table-striped table-bordered" width="100%">
        <thead>
            <tr>
                        <th>NO</th>
                        <th>Vendor</th>
                        <th>Tanggal Transaksi</th>
                        <th>Nama Bahan</th>
                        <th>Bahan Keluar</th>
                        <th>Bahan Masuk</th>
            </tr>
        </thead>
        <tbody>
        <?php $no=1; foreach($liat as $s) :?>
                <tr>
                    <td><center><?php echo $no++; ?></center></td>
                        <td><?= $s->vendor ?></td>
                        <td><?= $s->tanggal ?></td>
                        <td><?= $s->nama_bahan ?></td>
                        <td><?= $s->bahankeluar ?></td>
                        <td><?= $s->bahanmasuk ?></td>
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