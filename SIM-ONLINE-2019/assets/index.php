<?php
 session_start();
 if (isset($_SESSION['ses_username'])=="") {
 echo"<meta http-equiv='refresh' content='0;url=login.php'>";
 }else{
 $data_username = $_SESSION["ses_username"];
 $data_status = $_SESSION["ses_status"];
 }
//  $koneksi = mysqli_connect("localhost","id9966066_localhost","ngehek12345","id9966066_simbada5");
 $koneksi = mysqli_connect("localhost","root","","simbada1"); 
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SI SIM ONLINE 2019</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="?halaman=beranda">
                        SIM ONLINE
                    </a>
                </li>
                <?php
                    if ($data_status=="operator"){
                ?>
                <li>
                    <a href="?halaman=beranda">Beranda</a>
                </li>
                <li>
                    <a href="?halaman=permohonan_tambah">Data Permohonan</a>
                </li>
                <li>
                    <a href="?halaman=pribadi_tambah">Data Pribadi</a>
                </li>
                <!-- <li>
                    <a href="?halaman=cetak_permohonan">Cetak Pendaftaran</a>
                </li> -->
                <?php
                    } elseif ($data_status=="admin"){
                ?>
                <li>
                    <a href="?halaman=cek_pendaftaran">Cek Pendaftaran</a>
                </li>
                <li>
                    <a href="?halaman=cetak_sim">Cetak SIM</a>
                </li>
                <li>
                    <a href="?halaman=akun_pengguna">Akun Pengguna</a>
                </li>
                <li>
                    <a href="laporan_sim.php">Laporan SIM</a>
                </li>
                <?php
                    }
                ?>
                <li>
                    <a href="login.php" onclick="return confirm('Apakah
                    anda yakin ingin keluar ?')">Log Out</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <?php
                            if(isset($_GET['halaman'])){
                                $hal = $_GET['halaman'];
                                switch($hal){
                                    case 'beranda';
                                        include 'beranda.php';
                                    break;
                                    case 'permohonan_tambah';
                                        include 'permohonan_tambah.php';
                                    break;
                                    case 'pribadi_tambah';
                                        include 'pribadi_tambah.php';
                                    break;
                                    case 'cetak_permohonan';
                                        include 'cetak_permohonan.php';
                                    break;
                                    case 'pembuatan_sim';
                                        include 'pembuatan_sim.php';
                                    break;
                                    case 'cetak_sim';
                                        include 'cetak_sim.php';
                                    break;
                                    case 'akun_pengguna';
                                        include 'akun_pengguna.php';
                                    break;
                                    case 'laporan_sim';
                                        include 'laporan_sim.php';
                                    break;
                                    case 'tambah_sim';
                                        include 'tambah_sim.php';
                                    break;
                                    case 'pengguna_tambah';
                                        include 'pengguna_tambah.php';
                                    break;
                                    case 'pengguna_ubah';
                                        include 'pengguna_ubah.php';
                                    break;
                                    case 'sim_dicetak';
                                        include 'sim_dicetak.php';
                                    break;
                                    case 'cek_pendaftaran';
                                        include 'cek_pendaftaran.php';
                                    break;
                                    case 'ubah_sim';
                                        include 'ubah_sim.php';
                                    break;
                                    default:
                                        echo "<center><h3>ERROR!!</h3></center>";
                                    break;
                                }
                            }else{
                                include 'beranda.php';
                            }
                            
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
