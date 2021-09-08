<?php 
require_once'functions.php';

if ($act=="call_harga") {
    $kode_barang = $_GET["barang"];
    $row = $db->get_row("SELECT * FROM tb_barang WHERE id_barang='$kode_barang'");
    echo json_encode($row);
}else if($act=='simpan_transaksi');
{
    $_SESSION['barang_jual'][$_GET['ID']] = array(
        'jumlah' =>$_GET['jumlah'] );

    $data = array();
    $data=' <thead>
    <tr>
    <th>Kode Barang</th>
    <th>Nama Barang</th>
    <th>Harga</th>
    <th>Jumlah</th>
    <th>Total</th>
    <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody >';
    $total = 0;
    $gt = 0;
    foreach ($_SESSION['barang_jual'] as $key => $value) {
        $row = $db->get_row("select * from tb_barang  where id_barang='$key'");
        $total = $row->harga_barang*$value['jumlah'];
        $gt+=$total;
        $data.='<tr>
        <td>'.$key.'</td>
        <td>'.$row->nama_barang.'</td>
        <td>'.$row->harga_barang.'</td>
        <td>'.$value['jumlah'].'</td>
        <td>'.$total.'</td>
        <td><a class="btn btn-sm btn-danger" href="javascript:void()" title="Hapus" onclick="hapus('."'".$key."'".')"> Hapus</a></td>
        </tr>';
    }
    $data.='<tr><td colspan="4"><strong> Grandtotal</strong></td>
    <td><strong>'.$gt.'</strong></td></tr>'; 
    $data.='</tbody>'; 
    $_SESSION['total_pj'] = $gt; 
    echo json_encode($data);


}