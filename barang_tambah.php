<!-- <div class="page-header">
    <h1>Tambah Barang</h1>
</div>
<div class="row">
    <div class="col-sm-6">
      <?php if($_POST) include'barang_simpan.php';?>
      <form method="post" action="?m=barang_tambah">
        <div class="form-group">
          <label>ID Barang </label>
          <div>
            <input class="form-control" type="text" name="kode" value="<?=kode_oto('id_barang','tb_barang','B',5)?>" readonly/>
          </div>
        </div>
        <div class="form-group">
          <label>Nama Barang</label>
          <div>
            <input class="form-control" type="text" name="nama" value="<?=$_POST['nama']?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Jenis Barang</label>
          <div>
            <input class="form-control" type="text" name="jenis" value="<?=$_POST['jenis']?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Stok</label>
          <div>
            <input class="form-control" type="text" name="stok" value="<?=$_POST['stok']?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Panjang</label>
          <div>
            <input class="form-control" type="text" name="panjang" value="<?=$_POST['panjang']?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Lebar</label>
          <div>
            <input class="form-control" type="text" name="lebar" value="<?=$_POST['lebar']?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Tinggi</label>
          <div>
            <input class="form-control" type="text" name="tinggi" value="<?=$_POST['tinggi']?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Volume</label>
          <div>
            <input class="form-control" type="text" name="volume" readonly="" value="<?=$_POST['volume']?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Harga(M3)</label>
          <div>
            <input class="form-control" type="text" name="harga_meter" value="<?=$_POST['harga_meter']?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Harga</label>
          <div>
            <input class="form-control" type="text" name="harga" readonly="" value="<?=$_POST['harga']?>"/>
          </div>
        </div>
         <div class="form-group">
                <button class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Simpan</button>
                <a class="btn btn-danger" href="?m=barang"><span class="glyphicon glyphicon-arrow-left"></span> Kembali</a>
            </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
        $('[name="panjang"]').keyup(function(){
          hitung_volume();
        });
        $('[name="Lebar"]').keyup(function(){
          hitung_volume();
        });
        $('[name="tinggi"]').keyup(function(){
          hitung_volume();
        });

        $('[name="harga_meter"]').keyup(function(){
          hitung_harga();
        });


      } );

     


      function hitung_volume()
      {
        var panjang = $('[name="panjang"]').val();
        var lebar = $('[name="lebar"]').val();
        var tinggi = $('[name="tinggi"]').val();

        $('[name="volume"]').val((panjang*lebar*tinggi)/1000000);
      }

      function hitung_harga()
      {
        var harga = $('[name="harga_meter"]').val();
        var volume = $('[name="volume"]').val();
        $('[name="harga"]').val(harga*volume);
      }
</script> -->
