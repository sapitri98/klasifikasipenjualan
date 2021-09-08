
<div class="row">
 <div class="col-md-12">
  <div class="row">
    <div class="col-md-4">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h2 class="box-title">Data Transaksi Penjualan</h2>
        </div>
        <?php if($_POST) include'penjualan_simpan.php';?>
        <form method="post" action="?m=penjualan_tambah" class="form-horizontal">
          <div class="box-body">
            <div class="col-lg-12">
              <div class="form-group">
                <label >No Faktur penjualan</label>
                <input type="text" class="form-control" name="kode"  value="<?=kode_oto('no_faktur_penjualan','tb_penjualan','INV-FPJ-',4)?>" readonly/>
              </div>
            </div>
            <div class="col-lg-12">
             <div class="form-group">
              <label >Tanggal</label>
              <input type="date" name="tanggal" class="form-control" value="<?=$_POST['tanggal']?>" />
            </div>
          </div>
          <div class="col-lg-12">
           <div class="form-group">
            <button class="btn btn-primary btn-block"> SIMPAN</button>
            <a class="btn btn-danger btn-block" href="?m=penjualan"> BATAL</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<div class="col-md-8">
 <div class="box box-primary">
  <div class="box-header with-border">
    <h2 class="box-title">Detail Transaksi Penjualan</h2>
  </div>
  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-5">
         <label >Nama Barang</label>
         <select class="form-control" name="nama_barang" onchange="getbrg(this);">
          <option></option>
          <?=option_barang()?>
        </select>
      </div>
      <div class="col-md-3">
       <label >Harga Jual</label>
       <input type="text" name="harga_jual" class="form-control" />
     </div>
     <div class="col-md-2">
       <label >Jumlah</label>
       <input type="text" name="jumlah" class="form-control"/>
     </div>
     <div class="col-md-2">
       <label >&nbsp;</label>
       <a href="#" onclick="add()" class="btn btn-primary">Tambah Data</a>
     </div>
   </div>
 </div>
 <div class="row" style="padding-top: 15px;">
   <div class="col-md-12">
     <table id="table" class="table table-bordered table-striped">

     </table>
   </div>
 </div>
</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  $(document).ready(function() {
    $('[name="grandtotal"]').val(<?=$_SESSION['total_pj']?>);
    $.ajax({
      url : "penjualan_simpan.php?act=hapus_transaksi",
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('table').html(data);
      }
    });
  } );
  function add()
  {
    var id = $('[name="nama_barang"]').val();
    var jumlah = $('[name="jumlah"]').val();
    var harga= $('[name="harga_jual"]').val();
    $.ajax({
      url : "penjualan_simpan.php?act=simpan_transaksi&ID="+id+"&jumlah="+jumlah+"&harga="+harga,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('#table').html(data);
        $('[name="grandtotal"]').val(<?=$_SESSION['total_pj']?>);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });
  }

  function hapus(id)
  {
    $.ajax({
      url : "penjualan_simpan.php?act=hapus_transaksi&ID=" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('#table').html(data);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });
  }
  function getbrg(cell){
    var barang = $('[name="nama_barang"]').val();
    $.ajax({
      url : "penjualan_simpan.php?act=call_harga&barang="+barang,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        // $('[name="harga_jual"]').val(data.harga_barang);
      }
    });
  }
</script>