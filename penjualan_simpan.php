<?php 
require_once'functions.php';

if ($act=="call_harga") {
    $kode_barang = $_GET["barang"];
    $row = $db->get_row("SELECT * FROM tb_barang where id_barang='$kode_barang'");
    echo json_encode($row);
}else if($act=='simpan_transaksi')
{
    $_SESSION['barang_beli'][$_GET['ID']] = array(
        'jumlah' =>$_GET['jumlah'],'harga' =>$_GET['harga'] );

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
    foreach ($_SESSION['barang_beli'] as $key => $value) {
        $row = $db->get_row("select * from tb_barang  where id_barang='$key'");
        $total = $value['harga']*$value['jumlah'];
        $gt+=$total;
        $data.='<tr>
        <td>'.$key.'</td>
        <td>'.$row->nama_barang.'</td>
        <td>'.$value['harga'].'</td>
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


}else if($act=='hapus_transaksi')
{
    unset($_SESSION['barang_beli'][$_GET['ID']]);

    $data = array();
    $data=' <thead>
    <tr class="bg-info">
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
    foreach ($_SESSION['barang_beli'] as $key => $value) {
        $row = $db->get_row("select * from tb_barang  where id_barang='$key'");
        $total = $value['harga']*$value['jumlah'];
        $gt+=$total;
        $data.='<tr>
        <td>'.$key.'</td>
        <td>'.$row->nama_barang.'</td>
        <td>'.$value['harga'].'</td>
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


}else if($mod=='penjualan_tambah')
{
 $kode = $_POST['kode'];
 $tanggal = $_POST['tanggal'];

 if($kode==''){
    print_msg("Terdapat data kosong, Data bertanda * tidak boleh kosong!");
}
else
{
    $db->query("INSERT INTO tb_penjualan(no_faktur_penjualan,tanggal_penjualan,grandtotal) VALUES ('$kode','$tanggal','$_SESSION[total_pj]')");   
    foreach ($_SESSION['barang_beli'] as $key => $value) {
        $row = $db->get_row("select * from tb_barang where id_barang='$key'");
        $total = ($value['harga']*$value['jumlah']);
        $db->query("INSERT INTO tb_detail_penjualan(no_faktur_penjualan,id_barang,harga,jumlah,total) VALUES ('$kode','$row->id_barang','$value[harga]','$value[jumlah]','$total')");
    }
    unset($_SESSION['barang_beli']);
    unset($_SESSION['total_pj']);
    redirect_js("index.php?m=penjualan");
}    
}