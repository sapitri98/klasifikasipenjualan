<?php 
require_once'functions.php';
/** USER **/
if($act=='barang_tambah'){
   $kode = $_POST['kode'];
   $nama = $_POST['nama'];
   $jenis = $_POST['jenis'];
   $stok = $_POST['stok'];
   $panjang = $_POST['panjang'];
   $lebar = $_POST['lebar'];
   $tinggi = $_POST['tinggi'];
   $volume = $_POST['volume'];
   $harga = $_POST['harga'];
   $harga_meter = $_POST['harga_meter'];

   if($nama==''||$volume==''||$harga==''){
    print_msg("berisikan tanda * data tidak boleh kosong wajib diisi");
}  
else{
    $db->query("INSERT INTO tb_barang(id_barang,nama_barang,jenis_barang,stok,panjang,lebar,tinggi,volume,harga_barang,harga_meter) VALUES('$kode','$nama','$jenis','$stok','$panjang','$lebar','$tinggi','$volume','$harga','$harga_meter')");  
     echo json_encode(array("status" => TRUE));
}                    
}else if($act=='barang_ubah'){
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $stok = $_POST['stok'];
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $tinggi = $_POST['tinggi'];
    $volume = $_POST['volume'];
    $harga = $_POST['harga'];
    $harga_meter = $_POST['harga_meter'];

    if($nama==''||$volume==''||$harga==''){
        print_msg("berisikan tanda * data tidak boleh kosong wajib diisi");
    }  
    else{
        $db->query("update tb_barang set nama_barang='$nama',jenis_barang='$jenis',stok='$stok',panjang='$panjang',lebar='$lebar',tinggi='$tinggi',volume='$volume',harga_barang='$harga',harga_meter='$harga_meter' where id_barang='$kode' ");
       echo json_encode(array("status" => TRUE));
   }             
}