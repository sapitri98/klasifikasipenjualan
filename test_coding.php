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
        
      <button class="btn btn-primary" ><span class="glyphicon glyphicon-plus"></span><a href="?m=test_coding_tambah"> Tambah</a></button><?php endif ;?>
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

<script type="text/javascript">
  function getjenis(cell){
    var jenis = $('[name="nama_barang"]').val();
    $.ajax({
      url : "test_coding_simpan.php?act=call_jenis&barang="+barang,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="jenis_barang"]').val(data.jenis_barang);
      }
    });
  }
</script>