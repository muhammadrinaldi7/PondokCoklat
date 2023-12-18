<?php
if (isset($_POST['save'])) {
  foreach ($_POST as $key => $value) {
    ${$key} = $value;
  }
  $koneksi = $this->load->model('pondokModel');
  $query = mysqli_query($koneksi, "INSERT INTO penjualanoutlet SET kode_transaksi = '$kode',
   tgl_transaksi = '$tgl_transaksi'");
  if ($query) {
    $jumlah = count($_POST['kode_bahan']);
    $id_insert = mysqli_insert_id($koneksi);
    $status = mysqli_query($koneksi, "INSERT INTO status_peminjaman SET id_peminjaman = '$id_insert', status = 2, tgl_status = NOW()");
    for ($i = 0; $i < $jumlah; $i++) {
      $sql_uraian = mysqli_query($koneksi, "INSERT INTO detail_peminjaman SET id_peminjaman = '$id_insert', 
      id_alat = '$id_alat[$i]', deskripsi_peminjaman = '$deskripsi[$i]'");
      $update = mysqli_query($koneksi, "UPDATE alat SET status_alat = 'Dipinjam'
      WHERE id_alat = '$id_alat[$i]'");
    }
    $_SESSION['notif'] = 'Berhasil';
?>
    <script>
      window.location = "peminjaman.php";
    </script>
  <?php
  } else {
    $e = "Mysql Error " . mysqli_errno($koneksi);
  ?>
    <script>
      Toast.fire({
        icon: 'error',
        title: '<?= $e ?>'
      });
    </script>
<?php
  }
}
?>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Penjualan </h3>
        </div>
        <div class="card-body">
          <form method="POST" enctype="multipart/form-data" action="<?= base_url('transaksi/Penjualanc/tambahDataAksi'); ?>">
            <div class="form-group">
              <label for="">Nomor Penjualan</label>
              <input type="text" class="form-control" name="kode" value="<?= $kode ?>" readonly>
              <label>Tanggal penjualan</label>
              <input type="date" name="tgl_transaksi" value="<?php echo date('Y-m-d') ?>" readonly class="form-control" required>
            </div>
            <div class="col-md-12 col-sm-12 col-lg-12">
              <table class="table">
                <thead>
                  <th>No</th>
                  <th>Pesanan</th>
                  <th>Jumlah</th>
                  <th>Action</th>
                </thead>
                <tbody class="allalat">
                  <tr class="mainalat_1">
                    <td>1</td>
                    <td><select name="kode_bahan[]" class="form-control alat" id="alat_1">
                        <option value=""></option>
                        <?php 
                         $jsArray1 = "var prdNamaBahan = new Array();\n";
                        foreach($bahan as $b): 
                          echo '<option value="'.$b->kode_bahan.'">'.$b->nama_bahan.'</option> ';
                          $jsArray1 .= "prdNamaBahan['" . $b->kode_bahan . "'] = {bahan:'" . addslashes($b->nama_bahan) . "',harga:'" . addslashes($b->harga_jual) . "'};\n"; ?>
                        <?php endforeach; ?>
                      </select>
                      <input type="hidden"  name="nama_bahan" id="bahan" class="form-control col-md-5">
                    </td>                    
                    <td><input type="number" class="form-control" id="qty" name="qty[]"></td>
                    <td><button type="button" onclick="addalat()" class="btn btn-sm btn-primary form-control"><i class="fa fa-plus"></i></button></td>
                  </tr>
                </tbody>
              
              </table>
            </div>
            <input type="submit" value="Submit" name="save" class="btn btn-primary float-right">
          </form>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

  </div>
                        </div>
</section>
<!-- /.content -->
<script type="text/javascript">
  <?php echo $jsArray1; ?>  
    function changeValueBahan(x){  
    document.getElementById('bahan').value = prdNamaBahan[x].bahan;
    document.getElementById('harga').value = prdNamaBahan[x].harga;
    }; 
    function hitung(){
        var qty = document.getElementById('qty').value;
        var harga = document.getElementById('harga').value;
        var hasil = parseInt(harga)*parseInt(qty);
        if (!isNaN(hasil)) {
            document.getElementById('total').value = hasil;
        }
    } 
  function addalat() {
    var numItems = $('.alat').last().attr('id');
    // alert(numItems);
    numItems = parseInt((numItems.split("_"))[1]) + 1;

    let html = "";
    html += '<tr class="mainalat_' + numItems + '">';
    html += '<td>' + numItems + '</td>';
    html += '<td><select name="kode_bahan[]" onchange="changeValueBahan(this.value)" class="form-control alat" id="alat_' + numItems + '">';
    html += '<option value=""></option>';
    <?php foreach ($bahan as $b): ?>
      html += '<option value="<?= $b->kode_bahan ?>"><?= $b->nama_bahan ?></option>';
    <?php endforeach; ?>
    html += '</select></td>';
    html += '<td><input type="text" class="form-control" id="qty" onkeyup="hitung();" name="qty[]"></td>';
    html += '<td><div class="mainalat_' + numItems + '">';
    html += '<button type="button" onclick="removealat(' + numItems + ')" class="btn btn-sm btn-danger form-control"><i class="fa fa-trash"></i></button>';
    html += '</td></tr>';
    $(".allalat").append(html);

    $("#total_alat").val(numItems);
  }

  function removealat(numItems) {
    $(".mainalat_" + numItems).remove();
  }

  
</script>