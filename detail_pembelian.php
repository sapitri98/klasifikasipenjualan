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
        <h3 class="box-title">Detail No Faktur <?=$_GET['ID']?></h3>
        <hr>
        <form class="form-inline">
          <input type="hidden" name="m" value="pembelian" />
          <div class="form-group">
            <!-- <a class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Filter Data</a> -->
          </div>
        </form>

      </div>
      <div class="box-body no-padding">
        <div class="col-md-12">
         <table id="example1" class="table1">
          <thead>
            <tr>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total = 0;
            $q = esc_field($_GET['q']);
            $rows = $db->get_results("SELECT * FROM tb_pembelian p INNER JOIN tb_detail_pembelian pb ON p.no_faktur_pembelian = pb.no_faktur_pembelian INNER JOIN tb_barang b ON b.id_barang = pb.id_barang WHERE pb.no_faktur_pembelian='$_GET[ID]'");
            $no=1;
            foreach($rows as $row):
              $total+=$row->total;?>
              <tr>
                <td><?=$row->id_barang?></td>
                <td><?=$row->nama_barang?></td>
                <td><?=$row->harga?></td>
                <td><?=$row->jumlah?></td>
                <td><?=$row->total?></td>
              </tr>
            <?php endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <div class="box-footer">
      <h5>Total Pembelian : <?=set_num($total)?></h5>
    </div>
  </div>
</div>
</div>