<style type="text/css">
  .table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #f2f5f7;
  }

  .table1 tr th{
    background: #35A9DB;
    color: #fff;
    font-weight: normal;
  }

  .table1, th, td {
    padding: 8px 20px;
    text-align: center;
  }

  .table1 tr:hover {
    background-color: #f5f5f5;
  }

  .table1 tr:nth-child(even) {
    background-color: #f2f2f2;
  }

</style>
<div class="page-header">
  <h1>Barang</h1>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <div class="form-inline">
      <div class="form-group">
    <?php if($_SESSION['level']=='admin'):?>
        <!-- <a class="btn btn-primary" href="?m=pembelia_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah Transaksi Pembelian -->
        
      <button class="btn btn-primary" onclick="add_data()"><span class="glyphicon glyphicon-plus"></span> Tambah</button><?php endif ;?>
       </div>
    </div>
  </div>
  <div class="table-responsive">
   <table id="example1" class="table1  table-striped">
    <thead>
      <tr>
        <th>NO</th>
        <th>ID Barang</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Panjang</th>
        <th>Lebar</th>
        <th>Tinggi</th>
        <th>Volume</th>
        <th>Harga(M3)</th>
        <th>Harga Barang</th>
        <th>Stok</th>
        
          <th ><?php if($_SESSION['level']=='admin'):?><center>Aksi</center><?php endif ;?></th>
          
      </tr>
    </thead>
    <tbody>
      <?php
      $q = esc_field($_GET['q']);
      $rows = $db->get_results("SELECT * FROM tb_barang 
        WHERE  nama_barang LIKE '%$q%'
        ORDER BY id_barang");
      $no=1;
      foreach($rows as $row):?>
        <tr>
          <td><?=$no++ ?></td>
          <td><?=$row->id_barang?></td>
          <td><?=$row->nama_barang?></td>
          <td><?=$row->jenis_barang?></td>
          <td><?=$row->panjang?></td>
          <td><?=$row->lebar?></td>
          <td><?=$row->tinggi?></td>
          <td><?=$row->volume?></td>
          <td><?=set_num($row->harga_meter)?></td>
          <td><?=set_num($row->harga_barang)?></td>
          <td><?=$row->stok?></td>
            <td class="nw">
             <?php if($_SESSION['level']=='admin'):?>
              <a class="btn btn-sm btn-primary" href="?m=barang_ubah&amp;ID=<?=$row->id_barang?>"><i class="glyphicon glyphicon-edit"></i> </a>

              <a class="btn btn-xs btn-danger" href="aksi.php?act=barang_hapus&ID=<?= $row->id_barang ?>" onclick="return confirm('Hapus data?')"><span class="glyphicon glyphicon-trash"></span></a> <?php endif ;?>

            </td>
        </tr>
      <?php endforeach;
      ?>
    </tbody>
  </table>
</div>
</div>

<div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Info Modal</h4>
        </div>
        <div class="modal-body">
          <form action="#" id="form" class="form-horizontal">
            <div class="form-body">
              <div class="form-group">
                <label class="control-label col-md-3">ID Barang </label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="kode" readonly="" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Nama Barang</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="nama"/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Jenis Barang</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="jenis"/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Panjang</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="panjang"/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Lebar</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="lebar"/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Tinggi</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="tinggi"/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Volume</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="volume" readonly="" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Harga(M3)</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="harga_meter" />
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Harga</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="harga" readonly=""/>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3">Stok</label>
                <div class="col-md-9">
                  <input class="form-control" type="text" name="stok"/>
                </div>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer form">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
          <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Simpan </button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
   var save_method; 
   var table;
   $(document).ready(function() {
    $('#example1').DataTable();
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

   function add_data()
   {
    save_method = 'add';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty(); 
    $('[name="kode"]').val('<?=kode_oto('id_barang','tb_barang','B',5)?>');
    $('#modal_form').modal('show'); 
    $('.modal-title').text('Tambah Barang');
  }


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

  function reload_table()
  {
    table.ajax.reload(null,false); 
  }

  function edit_data(id)
  {
    save_method = 'update';
    $('#form')[0].reset();
    $('.form-group').removeClass('has-error');
    $('.help-block').empty();

    $.ajax({
      url : "barang_server.php?act=get_barang&ID=" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="kode"]').val(data.id_barang);
        $('[name="nama"]').val(data.nama_barang);
        $('[name="satuan"]').val(data.satuan);
        $('[name="stok"]').val(data.stok);
        $('[name="panjang"]').val(data.panjang);
        $('[name="lebar"]').val(data.lebar);
        $('[name="tinggi"]').val(data.tinggi);
        $('[name="volume"]').val(data.volume);
        $('[name="harga"]').val(data.harga);
        $('[name="harga_meter"]').val(data.harga_meter);
        $('#modal_form').modal('show'); 
        $('.modal-title').text('Ubah Barang'); 
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });
  }
  function save()
  {
    
      $('#btnSave').text('saving...'); 
      $('#btnSave').attr('disabled',true);
      if(save_method == 'add') {
        url = "barang_simpan.php?act=barang_tambah";
      } else {
        url = "barang_simpan?act=barang_tambah";
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


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
          alert('Error adding / update data');
          $('#btnSave').text('save');
          $('#btnSave').attr('disabled',false); 

        }
      });
    }
  
  function delete_data(id)
  {
   if(confirm('Are you sure disabled this data?'))
   {
    $.ajax({
      url : "aksi.php?act=barang_hapus&ID=" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        alert('Disabled data success');
        reload_table();
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        alert('Error get data from ajax');
      }
    });
  }
}

function active_data(id)
{
 if(confirm('Are you sure active this data?'))
 {
  $.ajax({
    url : "aksi.php?act=barang_aktif&ID=" + id,
    type: "GET",
    dataType: "JSON",
    success: function(data)
    {
      alert('Active data success');
      reload_table();
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
      alert('Error get data from ajax');
    }
  });
}
}

</script>
