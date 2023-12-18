<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Penjualan </h3>
        </div>
        <div class="card-body">
                     
            <div class="col-md-12 col-sm-12 col-lg-12">
              <table class="table table-bordered table-striped" id="dataTable" >
                <thead>
                  <th>No</th>
                  <th>Nomor Faktur</th>
                  <th>Tanggal Pesanan</th>
                  <th>Jumlah</th>
                  <th>Action</th>
                </thead>
                <tbody>
                <?php $no=1;
                    foreach($riwayatpenjualan as $rp):
                    $id = $rp->kode_transaksi; ?>
                    
                  <tr>
                    
                    <td><?= $no++ ?></td>
                    <td><?= $rp->kode_transaksi ?></td>
                    <td><?= $rp->tgl_transaksi ?></td>
                    <td><?= $rp->qty ?></td>
                    <td><button type="button" class="btn btn-sm btn-primary form-control" data-toggle="modal" data-target="#modaldetail" onclick="detail(<?= $rp->id_penjualan?>)"><i class="fa fa-eye"> Detail </i></button></td>
                    <!-- Button trigger modal -->


                  </tr>
                  <?php endforeach; ?>
                </tbody>
              
              </table>
            </div>
           
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
    html += '<td><input type="text" readonly class="form-control" id="harga" onkeyup="hitung();" name="harga[]"></td>';
    html += '<td><input type="text" class="form-control" id="total" name="total[]"></td>';
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

<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="modaldetail" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pesanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="data_detail">
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
   function detail(id_penjualan){
    
    $.ajax({
      url:"<?= base_url('transaksi/Penjualanc/detail');?>",
      type: "POST",
      data:{id_penjualan:id_penjualan},
      success: function(getreturn){
        $('#data_detail').html(getreturn);
      }
    })
  }
</script>
<!-- end modal-->