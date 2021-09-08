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
  <?php
 $tanggalawal = ($_GET['tanggalawal']) ? $_GET['tanggalawal'] : date('Y-m-01');
 $tanggalakhir = ($_GET['tanggalakhir']) ? $_GET['tanggalakhir'] : date('Y-m-d');

 ?>
 <div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Transaksi Penjualan </h3>
      </div>
      <div class="box-body no-padding">
        <div class="row">
         <div class="col-md-12">
          <div class="panel ">
            <div class="panel-heading">        
              <form class="form-inline">
                <input type="hidden" name="m" value="laporan_penjualan" />
                <div class="form-group">                
                  <input class="form-control" type="date" name="tanggalawal" value="<?=$tanggalawal?>"/>
                </div>
                <div class="form-group">
                  <input class="form-control" type="date" name="tanggalakhir" value="<?=$tanggalakhir?>"/>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary"><span class="fa fa-search"></span> Cari</a>
                  </div>
                  <div class="form-group">
                    <a class="btn btn-primary" target="_BLANK" href="cetak.php?m=laporan_penjualan&tanggalawal=<?=$_GET['tanggalawal']?>&tanggalakhir=<?=$_GET['tanggalakhir']?>"><span class="fa fa-print"></span> Cetak</a>
                  </div>
                </form>
              </div>
              <div class="box box-primary">
                <div class="box-header with-border">
                </div>
                <div class="box-body no-padding">
                  <div class="col-md-12">
                   <table class="table1">
                    <thead>
                      <tr>
                        <th>NO</th>
                        <th>Tanggal</th>
                        <th>No Faktur Penjualan</th>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga Jual</th>
                        <th>GrandTotal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $q = esc_field($_GET['q']);
                      $rows = $db->get_results("SELECT *
                        FROM tb_penjualan AS t INNER JOIN tb_detail_penjualan dt 
                        ON t.`no_faktur_penjualan` = dt.`no_faktur_penjualan` 
                        INNER JOIN tb_barang bg ON bg.id_barang = dt.id_barang
                        WHERE tanggal_penjualan >= '$tanggalawal' AND tanggal_penjualan <= '$tanggalakhir'
                        ORDER BY t.`no_faktur_penjualan`");
                      $no=1;
                      foreach($rows as $row):?>
                        <tr>
                          <td><?=$no++ ?></td>
                          <td><?=$row->tanggal_penjualan?></td>
                          <td><?=$row->no_faktur_penjualan?></td>
                          <td><?=$row->nama_barang?></td>
                          <td><?=$row->jumlah?></td>
                          <td><?=set_num($row->harga)?></td>
                          <td><?=set_num($row->harga*$row->jumlah)?></td>
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
      </div>
    </div>
  </div>
</div>
