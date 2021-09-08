<?php $row = $db->get_row("SELECT * FROM tb_barang WHERE id_barang='$_GET[ID]'");?>
<div class="page-header">
    <h1>Ubah Barang</h1>
</div>
<div class="row">
    <div class="col-sm-6">
      <?php if($_POST) include'aksi.php';?>
      <form method="post" >
        <div class="form-group">
          <label>ID Barang </label>
          <div>
            <input class="form-control" type="text" name="kode" value="<?=$row->id_barang?>" readonly/>
          </div>
        </div>
        <div class="form-group">
          <label>Nama Barang</label>
          <div>
            <input class="form-control" type="text" name="nama" value="<?=$row->nama_barang?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Jenis Barang</label>
          <div>
            <input class="form-control" type="text" name="jenis" value="<?=$row->jenis_barang?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Stok</label>
          <div>
            <input class="form-control" type="text" name="stok" value="<?=$row->stok?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Panjang</label>
          <div>
            <input class="form-control" type="text" name="panjang" value="<?=$row->panjang?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Lebar</label>
          <div>
            <input class="form-control" type="text" name="lebar" value="<?=$row->lebar?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Tinggi</label>
          <div>
            <input class="form-control" type="text" name="tinggi" value="<?=$row->tinggi?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Volume</label>
          <div>
            <input class="form-control" type="text" name="volume" readonly="" value="<?=$row->volume?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Harga(M3)</label>
          <div>
            <input class="form-control" type="text" name="harga_meter" value="<?=$row->harga_meter?>"/>
          </div>
        </div>
        <div class="form-group">
          <label>Harga</label>
          <div>
            <input class="form-control" type="text" name="harga" readonly="" value="<?=$row->harga_barang?>"/>
          </div>
        </div>
         <div class="form-group">
                <button class="btn btn-primary"  ><span class="glyphicon glyphicon-save"></span> Simpan</button>
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
      function save()
  {
    
      $('#btnSave').text('saving...'); 
      $('#btnSave').attr('disabled',true);
      if(save_method == 'add') {
        url = "aksi.php?act=barang_ubah";
      } else {
        url = "aksi.php?act=barang_ubah";
      }
      $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
          if(data.status) 
          {
            
              location.reload();
            }
          
          else
          {
            for (var i = 0; i < data.inputerror.length; i++) 
            {
              $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); 
              $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); 
            }
          }
          $('#btnSave').text('save'); 
          $('#btnSave').attr('disabled',false);  
        }

</script>