<?php 
 include 'functions.php';
?>
<!doctype html>
<html>

<head>
    <title>Cetak Laporan</title>
     <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>

<body onload="window.print()">
     <div class="panel-group">
      <div class="panel panel-primary">
        <div class="panel-heading"><p align="center"><b>Print Laporan Penjualan</b></p></div>
        <div class="panel-body">
          <table class="table">
            <tr>
            <td><p align="center">
                   <img src="img/logo.png" height="30"><br> 
                   <!--  <font size="2px"><b>PK. ELANG PERKASA</b></font><br> -->Jl. Pondok Bambu Batas No.3, Rt.4/RW.12, Pd. Bambu, Kec. Duren Sawit, Kota Jakarta Timur, DKI Jakarta 13430</p><hr></td>
            </tr>
          </table>
    <div class="wrapper">
        <?php
       

        if (is_file($mod . '_cetak.php'))
            include $mod . '_cetak.php';
        ?>
    </div>
</body>

</html>