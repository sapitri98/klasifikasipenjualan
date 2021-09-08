

   <?php
   $tanggalawal = ($_GET['tanggalawal']) ? $_GET['tanggalawal'] : date('Y-m-01');
   $tanggalakhir = ($_GET['tanggalakhir']) ? $_GET['tanggalakhir'] : date('Y-m-d');

   ?>

   <!-- <h1><center>Laporan Penjualan</h1></center> -->
   <table class="table table-bordered table-striped">
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