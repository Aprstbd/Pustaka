<?php
session_start();
if (empty($_SESSION['login'])) {
    header("location:login.php");
    exit(); 
}
define('pustaka',1);
include'koneksi.php';
$data_buku = mysqli_query($koneksi,"SELECT * FROM buku");
$data_anggota = mysqli_query($koneksi,"SELECT * FROM anggota");
$data_user = mysqli_query($koneksi,"SELECT * FROM user");
 
// menghitung data barang
$jumlah_buku = mysqli_num_rows($data_buku);
$jumlah_user = mysqli_num_rows($data_user);
$jumlah_anggota = mysqli_num_rows($data_anggota);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perpustakaan</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script>
        $("ul > li").hover(
            function() {
                $(this).addClass('active-menu');
            },
            function() {
                $(this).removeClass('active-menu');
            }
        );
        $("ul > li").click(function() {
            $(this).toggleClass('active-menu');
        });
    </script>

    <!--    <script type="text/javascript">
        $(document).ready(function() {
            $('ul li a').click(function() {
                $('li a').removeClass("active-menu");
                $(this).addClass("active-menu");
            });
        });
    </script> -->
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Apri Setia Budi</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Hari ini Tanggal : <?php
                                        include "koneksi.php";
                                        $tgal = date("Y-m-d");
                                        function_exists('tgl');
                                        echo tgl($tgal); ?> &nbsp; <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>

        <?php
        $aktif = "";
        $aktif = isset($_GET['page']) ? $_GET['page'] : '';
        ?>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/Profil.JPG" class="user-image img-responsive" />
                    </li>


                    <li>
                        <a class="<?php if ($aktif == "") echo "active-menu"; ?>" href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="<?php if ($aktif == "lap_anggota") echo "active-menu"; ?>" href="?page=lap_anggota"><i class="fa fa-user fa-3x"></i> Data Anggota</a>
                    </li>

                    <li>
                        <a class="<?php if ($aktif == "lap_buku") echo "active-menu"; ?>" href="?page=lap_buku"><i class="fa fa-book fa-3x"></i> Data Buku</a>
                    </li>
                    <li>
                        <a class="<?php if ($aktif == "lap_transaksi") echo "active-menu"; ?>" href="?page=lap_transaksi"><i class="fa fa-bar-chart-o fa-3x"></i> Data Transaksi</a>
                    </li>
                    <li>
                        <a class="<?php if ($aktif == "lap_user") echo "active-menu"; ?>" href="?page=lap_user"><i class="fa fa-users fa-3x"></i> Manajemen user</a>
                     </li>
                    





                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php
                $page = "";
                $page = isset($_GET['page']) ? $_GET['page'] : '';
                $aksi = isset($_GET['aksi']) ? $_GET['aksi'] : '';

                if ($page == Null) {

                ?>


                    <div class="row">
                        <div class="col-md-12">
                            <h2>Admin Dashboard</h2>
                            <h5>Selamat Datang <b> Apri Setia Budi</b> 2010031802021 </h5>
                        </div>
                    </div>

                    <?php

                    $bk = mysqli_fetch_array(mysqli_query($koneksi, "SELECT SUM(jml_buku) as buku1 FROM buku"));
                    ?>
                    <!-- /. ROW  -->
                    <hr />
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="panel panel-back noti-box">
                                <span class="icon-box bg-color-red set-icon">
                                    <i class="fa fa-book"></i>
                                </span>
                                <div class="text-box">
                                    <p class="main-text"> <?= $jumlah_buku;?> Data</p>
                                    <p class="text-muted">Buku</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="panel panel-back noti-box">
                                <span class="icon-box bg-color-green set-icon">
                                    <i class="fa fa-user"></i>
                                </span>
                                <div class="text-box">
                                    <p class="main-text"><?= $jumlah_anggota?> Data</p>
                                    <p class="text-muted">Anggota</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-6">
                            <div class="panel panel-back noti-box">
                                <span class="icon-box bg-color-blue set-icon">
                                    <i class="fa fa-users"></i>
                                </span>
                                <div class="text-box">
                                    <p class="main-text"><?=$jumlah_user?> Data</p>
                                    <p class="text-muted">User</p>
                                </div>
                            </div>
                        </div>

                <?php
                } elseif ($page == "anggota") {
                    include "anggota.php";

                } elseif ($page == "lap_anggota") {
                    include "lap_anggota.php";

                } elseif ($page == "update_anggota") {
                    include "update_anggota.php";

                } elseif ($page == "hapus_anggota") {
                    include "hapus_anggota.php";

                } elseif ($page == "buku") {
                    include "buku.php";

                } elseif ($page == "lap_buku") {
                    include "lap_buku.php";

                } elseif ($page == "update_buku"){
                    include "update_buku.php";

                } elseif ( $page == "hapus_buku"){
                    include "hapus_buku.php";

                } elseif ($page == "transaksi") {
                    include "transaksi.php";

                } elseif ($page == "lap_transaksi") {
                    include "lap_transaksi.php ";

                
                } elseif ($page == "update_transaksi") {
                    include "update_transaksi.php";

                } elseif ($page == "hapus_transaksi") {
                    include "hapus_transaksi.php";

               
                } elseif ($page == "kembali") {
                    include "kembali.php";

                } elseif ($page == "user") {
                    include "user.php";

                } elseif ($page == "lap_user") {
                    include "lap_user.php";
                } elseif ($page == "update_user"){
                    include "update_user.php";
                } elseif ( $page == "hapus_user"){
                    include "hapus_user.php";
                }
                ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTables-example').dataTable();
        });
    </script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>

</body>

</html>