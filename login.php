
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pk. Elang Perkasa</title>

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/local.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

    <!-- you need to include the shieldui css and js assets in order for the charts to work -->
    <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
    <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
    <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
    <style type="text/css">
       .login{
          width:350px;
          min-height:350px;
          border:#CCC solid 1px;
          background:white;
          padding:20px;
          margin:20px auto;
          box-shadow: 0 2px 7px rgba(0, 0, 0, 0.1);
        }
        .login h1{
          font-size:50px;
          color:#00FFFF;
          text-align:center;
        }
    
      /*.footer_copyright a {
          color: green;
        }*/
        .main-footer {
          background: black;
          padding: 15px;
          color: #444;
          border-top: 1px solid #d2d6de;
          height: 50px
        }
    </style>
</head>
<div class="login">

<body class="hold-transition login-page" style="background-color: white">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="row">
      <div class="col-lg-12">
    <div class="login-box-body">
       <p align="center"> <img src="img/logo.png" width="250"></p>
      <h2 align=" center">LOGIN</h2>
     <!--  <p class="login-box-msg">Sign in to start your session</p> -->
        <hr>
      
      <form action="?m=login" method="post" >
        <?php if($_POST) include "aksi.php";?>
        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input type="text" name="user" placeholder="Username"  class="form-control" required>
                        </div>
                    <br>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input type="password" name="pass" placeholder="Password"  class="form-control" required>
                        </div>
                  
        <!-- <div class="form-group has-feedback">
          <input type="text" class="form-control" placeholder="Username" name="user" autofocus >
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
          <input type="password"  class="form-control" placeholder="Password" name="pass">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div> -->
<!--         <div class="form-group has-feedback">
         <select class="form-control" name="level">
           <option>Pilih Role</option>
           <option>Admin</option>
           <option>Teknisi</option>
           <option>Team Leader</option>
           <option>Senior Manager</option>
         </select>
       </div> -->
       <br>
       <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-success btn-block">LOGIN</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
</div>
</div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


  <div class="footer-bottom">
    <div class="main-footer">
      <div style="visibility: visible; animation-name: zoomIn;" class="col-md-12 text-center wow zoomIn">
        <div class="footer_copyright">
          <p style="color: grey; font-size: 13px;">© 2021, Made with <img width="20" src="img/love1.png"> by Sapitri Anggraini for a better Elang Perkasa </p>
          <!-- <p> 2021 © Tugas Akhir</p>
          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">Sapitri Anggraini</a>
          </div> -->
        </div>
      </div>
    </div>
  </div>

<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
</body>
</html>