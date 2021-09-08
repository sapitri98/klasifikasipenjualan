<?php
include 'functions.php';
if(empty($_SESSION['login']))
  header("location:login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pk. Elang Perkasa</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="assets/datatables/css/dataTables.bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/datatables/js/dataTables.bootstrap.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>

    <style type="text/css">
        .main-footer {
          background: transparent;
          padding: 15px;
          color: #444;
          border-top: 1px solid #d2d6de;
          height: 50px
        }
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Pk. Elang Perkasa</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                 <?php if ($_SESSION['login']) : ?>
                     <?php if ($_SESSION['level']=='admin') : ?>
                 <li><a href="?m=barang"><span class="glyphicon glyphicon-list"></span> Barang</a></li>
               <!--  <li><a href="?m=atribut"><span class="glyphicon glyphicon-th-large"></span> Atribut</a></li>
                 <li><a href="?m=nilai"><span class="glyphicon glyphicon-th"></span> Nilai Atribut</a></li> --> 
                 <li><a href="?m=dataset"><span class="glyphicon glyphicon-star"></span> Dataset</a></li>
                 <li><a href="?m=pembelian"><span class="glyphicon glyphicon-star"></span> Pembelian</a></li>
                 <li><a href="?m=penjualan"><span class="fa fa-briefcase"></span> Penjualan</a></li>
                 <li><a href="?m=grafik_penjualan"><span class="fa fa-area-chart"></span> Grafik Penjualan</a></li>
                 <li><a href="?m=laporan_penjualan"><span class="fa fa-print"></span> Laporan Penjualan</a></li>
                 
                 <li><a href="?m=hitung"><span class="glyphicon glyphicon-cog"></span> KNN</a></li>
                 <li><a href="?m=hitung_kmeans"><span class="glyphicon glyphicon-time"></span>  K Means</a></li>
                 <li><a href="?m=test_coding"><span class="glyphicon glyphicon-time"></span>  Test Coding</a></li>
                 
                 <!-- <li><a href="?m=password"><span class="glyphicon glyphicon-lock"></span> Password</a></li> -->
                 <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                 <?php else:?>
                    
                 <li><a href="?m=barang"><span class="glyphicon glyphicon-list"></span> Barang</a></li>
                 <li><a href="?m=pembelian"><span class="glyphicon glyphicon-star"></span> Pembelian</a></li>
                 <li><a href="?m=penjualan"><span class="glyphicon glyphicon-star"></span> Penjualan</a></li>
                 <li><a href="?m=laporan_penjualan"><span class="fa fa-print"></span> Laporan Penjualan</a></li>
                 <li><a href="?m=grafik_penjualan"><span class="fa fa-print"></span> Grafik Penjualan</a></li>
                 

                 <li><a href="aksi.php?act=logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                 <?php endif;?>
                 <?php else : ?>
                 <!-- <li><a href="?m=hitung"><span class="glyphicon glyphicon-calendar"></span> Konsultasi</a></li> -->
                 <!-- <li><a href="?m=login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
                 <?php endif ?>
             </ul>
         </div>
     </nav>

     <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <?php
    if (file_exists($mod . '.php'))
      include $mod . '.php';
    else
      include 'home.php';
    ?>
            </div>
        </div>
    </div>
</div>
<!-- /#wrapper -->

   <!--  <footer class="footer bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>Copyright &copy; <?= date('Y') ?> Sapitri Anggraini</p>
                </div>
                <div class="col-md-6">
                  
                </div>
            </div>
        </div>
    </footer>
 -->
<!-- <div class="footer-bottom">
    <div class="main-footer">
      <div style="visibility: visible; animation-name: zoomIn;" class="col-md-12 text-center wow zoomIn">
        <div class="footer_copyright">
          <p style="color: grey; font-size: 13px;">© 2021, Made with <img width="20" src="img/love1.png"> by Sapitri Anggraini for a better Elang Perkasa </p>
        </div>
      </div>
    </div>
  </div> -->
</body>
</html>
