<?php
session_start();
    include "config/koneksi.php";
    if(!empty($_SESSION['username'])){
        @$user = $_SESSION['username'];
        @$level = $_SESSION['level'];
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Aplikasi Inventaris</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">
    <link rel="stylesheet" href="">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        /* Styling untuk footer */
        .footer {
            background-color: #337ab7; /* Warna biru */
            color: white;
            padding: 60px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 3px solid #22507a;
        }

        /* Styling untuk h1 dalam footer */
        .footer h1 {
            font-size: 24px;
            margin: 0;
        }

        /* Styling untuk teks hak cipta */
        .footer p {
            font-size: 14px;
            margin-top: 10px;
            opacity: 0.8;
        }
        </style>
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Aplikasi Inventaris</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <?php
                  if(@$level == "1"){
                    ?>
                        <li><a href="?p=list_barang">Daftar Inventaris</a></li>
                        <li><a href="?p=peminjaman">Peminjaman</a></li>
                        <li><a href="?p=pengembalian">Pengembalian</a></li>
                        <li><a href="?p=laporan">Laporan</a></li>
                        <li><a href="?p=pegawai">Pegawai</a></li>
                    <?php
                  }
              ?>
              <?php
                  if(@$level == "2"){
                    ?>
                        <li><a href="?p=peminjaman">Peminjaman</a></li>
                        <li><a href="?p=pengembalian">Pengembalian</a></li>
                    <?php
                  }
              ?>
              <?php
                  if(@$level == "3"){
                    ?>
                        <li><a href="?p=peminjaman">Peminjaman</a></li>
                    <?php
                  }
              ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(!empty($user)){
                  ?>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= $user ?> <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                          <li><a href="page/keluar.php">Keluar</a></li>
                      </ul>
                    </li>
                  <?php
                }
                ?>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container">

      <!-- Main component for a primary marketing message or call to action -->
      <?php

        if(!empty($_SESSION['username'])){
            $user = $_SESSION['username'];
            
        

        @$p = $_GET['p'];
            switch ($p) {
                case 'login':
                    include "page/login.php";
                    break;

                case 'list_barang':
                    include "page/list_barang.php";
                    break;

                case 'tambah_barang':
                    include "page/tambah_barang.php";
                    break;

                case 'edit_barang':
                    include "page/edit_barang.php";
                    break;

                case 'pegawai':
                    include "page/pegawai.php";
                    break;

                case 'tambah_pegawai':
                    include "page/tambah_pegawai.php";
                    break;

                case 'edit_pegawai':
                    include "page/edit_pegawai.php";
                    break;

                case 'peminjaman':
                    include "page/peminjaman.php";
                    break;

                case 'peminjaman1':
                    include "page/peminjaman1.php";
                    break;

                case 'pengembalian':
                    include "page/pengembalian.php";
                    break;

                case 'detail_pengembalian':
                    include "page/detail_pengembalian.php";
                    break;

                case 'laporan':
                    include "page/laporan.php";
                    break;

                case 'home':
                    include "page/home.php";
                    break;

                case 'hapus':
                    include "page/hapus.php";
                    break;
                
                default:
                    include "page/login.php";
                    break;
            }
        }else{
            include "page/login.php";
        }
      ?>


    </div> <!-- /container -->
    <!-- Footer -->
    <div class="footer">
        <h1 class="text-center">Copyright by Fadjar Setiawan XII RPL</h1>
        <p class="text-center">All rights reserved &copy; 2023</p>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>

<script type="text/javascript">
  $(document).on('click', '#cetak', function() {
    var tgl_awal = $("#tgl_awal").val();
    var tgl_sampai = $("#tgl_sampai").val();
    window.open('page/cetak_laporan.php?tgl_awal=' + tgl_awal + "&tgl_sampai=" + tgl_sampai, '_blank');
  });
</script>
