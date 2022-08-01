<?php
//Mulai Sesion
session_start();
if (isset($_SESSION["ses_username"]) == "") {
  header("location: login.php");
} else {
  $data_id = $_SESSION["ses_id"];
  $data_nama = $_SESSION["ses_nama"];
  $data_user = $_SESSION["ses_username"];
  $data_level = $_SESSION["ses_level"];
}

//KONEKSI DB
include "config.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="assets/images/2.png" type="image/ico" />

  <title> Sistem Informasi Masjid Falahuddarain</title>
  <link rel="icon" href="assets/images/1.png">
  <!-- Bootstrap -->
  <link href="assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="assets/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="assets/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="assets/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="assets/css/custom.min.css" rel="stylesheet">
  <link href="assets/css/new.css" rel="stylesheet">
</head>
<body style="background-image: url(assets/images/1.png);">
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <center>
              &nbsp; <a href="index.php" style="color:#fff;"><span>
                  <font size="4.95" color="white" face="Helvetica Neue">Sistem Informasi Masjid Falahuddarain</font>
                </span></a>
            </center>
          </div>
          <div class="clearfix"></div>


          <br />
          <?php
          if ($data_level == "Administrator") {
          ?>
            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
                  </li>
                  </li>
                  <li><a><i class="fa fa-dollar"></i> Keuangan <span class="fa fa-chevron-down"></span></a>
                    <ul class="list">
                      <li>
                        <a href="index.php?page=tampil1" class="text"><i class="fa fa-check"></i>Data Pemasukan Keuangan</a>
                    </li>
                      <li>
                        <a href="index.php?page=tampil2" class="text"><i class="fa fa-check"></i>Data Pengeluaran Keuangan</a>
                      </li>
                      <li>
                        <a href="index.php?page=tampil3" class="text"><i class="fa fa-check"></i>Rekap Keuangan</a>
                      </li>
                      <li>
                        <a href="index.php?page=laporan" class="text"><i class="fa fa-check"></i>Laporan Rekap Keuangan</a>
                      </li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i> Pengguna <span class="fa fa-chevron-down"></span></a>
                    <ul class="list">
                      <li><a href="index.php?page=tampil4" class="text"><i class="fa fa-check"></i>Data Pengguna</a>
                    </li>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

        </div>
      </div>
    <?php
          } elseif ($data_level == "Bendahara") {
    ?>
      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
          <ul class="nav side-menu">
            <li><a href="index.php"><i class="fa fa-home"></i> Home <span class="fa fa-chevron"></span></a>
            </li>
            </li>
            <li><a><i class="fa fa-dollar"></i> Keuangan <span class="fa fa-chevron-down"></span></a>
              <ul class="list">

                <li>
                  <a href="index.php?page=tampil1" class="text"><i class="fa fa-check"></i>Data Pemasukan Keuangan</a>
                </li>
                <li>
                  <a href="index.php?page=tampil2" class="text"><i class="fa fa-check"></i>Data Pengeluaran Keuangan</a>
                </li>
                <li>
                  <a href="index.php?page=tampil3" class="text"><i class="fa fa-check"></i>Rekap Keuangan</a>
                </li>
                <li>
                  <a href="index.php?page=laporan" class="text"><i class="fa fa-check"></i>Laporan Rekap Keuangan</a>
                </li>
              </ul>
            </li>
            </li>
          </ul>
        </div>
      </div>
      <!-- /sidebar menu -->

    </div>
  </div>
<?php
          }
?>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <nav class="nav navbar-nav">
      <ul class=" navbar-right">
        <li class="nav-item dropdown open">
          <a href="#" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
            <b> Selamat Datang, <?php echo $_SESSION['ses_nama']  ?></b>
          </a>
          <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
          </div>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- /top navigation -->

<!-- page content - HALAMAN UTAMA ISI DISINI -->
<div class="right_col" role="main">
  <?php
  $queries = array();
  parse_str($_SERVER['QUERY_STRING'], $queries);
  error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  switch ($queries['page']) {
    case 'tampil1':
      # code...
      include 'tampil.php';
      break;
    case 'tampil2':
      # code...
      include 'tampil2.php';
      break;
    case 'tambah1':
      # code...
      include 'tambah.php';
      break;
    case 'tambah2':
      # code...
      include 'tambah2.php';
      break;
    case 'tampil3':
      # code...
      include 'tampil3.php';
      break;
    case 'tampil4':
      # code...
      include 'tampil4.php';
      break;
    case 'tambah3':
      # code...
      include 'tambah3.php';
      break;
    case 'edit_km':
      # code...
      include 'edit.php';
      break;
    case 'edit_km_save':
      # code...
      include 'edit.php';
      break;
    case 'edit_km2':
      #code...
      include 'edit2.php';
      break;
    case 'edit_km2_save':
      # code...
      include 'edit2.php';
      break;
    case 'edit_pm':
      # code...
      include 'edit3.php';
      break;
    case 'edit_pm_save':
      # code...
      include 'edit3.php';
      break;
    case 'laporan':
      # code...
      include 'laporan.php';
      break;
    default:
      #code...
      include 'home.php';
      break;
  }
  ?>
</div>
<!-- /page content -->

<!-- footer content -->
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    Sistem Informasi Masjid
  </div>
  <strong><a></a>.</strong>
</footer>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="assets/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="assets/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="assets/nprogress/nprogress.js"></script>
<!-- bootstrap-progressbar -->
<script src="assets/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
<!-- iCheck -->
<script src="assets/iCheck/icheck.min.js"></script>
<!-- Skycons -->
<script src="assets/skycons/skycons.js"></script>
<!-- Custom Theme Scripts -->
<script src="assets/js/custom.min.js"></script>


</body>

</html>