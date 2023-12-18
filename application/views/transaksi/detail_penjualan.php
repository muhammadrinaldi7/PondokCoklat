<?php
$id_penjualan = $_POST['id_penjualan'];
$detail = $this->db->query("SELECT dpenjualanoutlet.*,bahan.nama_bahan,bahan.harga_jual FROM dpenjualanoutlet LEFT JOIN bahan on bahan.kode_bahan = dpenjualanoutlet.kode_bahan where id_penjualan = '$id_penjualan'")->result_array();
$kd = $this->db->query("SELECT dpenjualanoutlet.kode_transaksi FROM dpenjualanoutlet LEFT JOIN bahan on bahan.kode_bahan = dpenjualanoutlet.kode_bahan where id_penjualan = '$id_penjualan'")->row();
$tgl = $this->db->query("SELECT tgl_transaksi from penjualanoutlet where id_penjualan = '$id_penjualan'")->row();
$kode = $kd->kode_transaksi;
$tnggl = $tgl->tgl_transaksi;
?>
<form action="">
    <div class="form-group">
                <label for="">Nomor Penjualan</label>
                <input type="text" class="form-control" name="kode" value="<?= $kode ?>" readonly>
                <label>Tanggal Transaksi</label>
                <input type="text" name="tgl_transaksi" value="<?= $tnggl   ?>" readonly class="form-control" required>
    </div>
<table class="table bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pesanan</th>
            <th>Qty</th>
            <th>Harga</th>
            <th>Total Harga</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach($detail as $d): 
        $jumlh[] = $d['qty'];
        $total[] = $d['harga_jual']*$d['qty'];
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $d['nama_bahan'] ?></td>
            <td><?= $d['qty'] ?></td>
            <td><?= number_format($d['harga_jual'],0,',','.') ?></td>
            <td><center><?= number_format($d['qty']*$d['harga_jual'],0,',','.') ?></center></td>
        </tr>
        
        <?php endforeach;?>
    </tbody>
    <tfoot>
        <?php $jumlah= array_sum($total);$tqty = array_sum($jumlh); ?>
        <tr>
            <td colspan="2"><b>Total</b></td>
            <td colspan="2"><b><?= $tqty ?></b></td>
            <td><b><?= "Rp " . number_format($jumlah,0,',','.') ?></b></td>
        </tr>
    </tfoot>
</table>
</form>