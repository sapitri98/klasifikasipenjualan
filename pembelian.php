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
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Daftar Histori Pembelian</h3>
        <form class="form-inline">
          <input type="hidden" name="m" value="pembelian" />
          <div class="form-group">
            <!-- <a class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Filter Data</a> -->
          </div>
        </form>
      </div>
       <div class="box-footer">
      <div class="form-group">
        <?php if($_SESSION['level']=='admin'):?>
        <a class="btn btn-primary" href="?m=pembelian_tambah"><span class="glyphicon glyphicon-plus"></span> Tambah Transaksi Pembelian
        <?php endif ;?>
        </a>
      </div>
    </div>
      <div class="box-body no-padding">
        <div class="col-md-12">
         <table id="example1" class="table1 ">
          <thead>
            <tr>
              <th>NO</th>
              <th>No Faktur Pembelian</th>
              <th>Tanggal</th>
              <th>GrandTotal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $q = esc_field($_GET['q']);
            $rows = $db->get_results("SELECT * FROM tb_pembelian 
              ORDER BY no_faktur_pembelian");
            $no=1;
            foreach($rows as $row):?>
              <tr>
                <td><?=$no++ ?></td>
                <td><?=$row->no_faktur_pembelian?></td>
                <td><?=$row->tanggal_pembelian?></td>
                <td><?=$row->grandtotal?></td>
                <td class="nw">
                  <a class="btn btn-xs btn-primary" href="?m=detail_pembelian&amp;ID=<?=$row->no_faktur_pembelian?>"><span class="fa fa-eye"></span> Detail</a>
                </td>
              </tr>
            <?php endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</div>
</div>
<script type="text/javascript">
  $(function () {
    $('#example1').DataTable();
  });
</script>