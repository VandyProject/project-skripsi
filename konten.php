<?php
// error_reporting(0);
// session_start();
// if(!isset($_SESSION['username'])){
//     echo "<script type='text/javascript'>
//    window.location.replace('index.php');
//   </script>";
// }
// if($_SESSION['hak_akses']!="Admin"){
//     die("<b>Oops!</b> Access Failed.
//         <p>Anda Bukan Admin.</p>
//         <button type='button' onclick=location.href='index.php'>Back</button>");
// }
// if(isset($_SESSION["username"])){ // jika ada sesi
            
//             // jika tidak ada aktivitas pada browser 
//             // selama 15 menit, maka
//             if((time() - $_SESSION["last_login_time"]) > 5000){// 900 = 15 * 60

//                 // akan diarahkan kehalaman logout.php
//                 header("location: login/logout.php");
//             } else {
//                 // jika ada aktivitas update waktu
//                 $_SESSION["last_login_timestamp"] = time();
//             }
//         } else {
//             header("location:login.php");
//         } 
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Dashboard Admin </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Sistem Informasi Klasifikasi Masa Studi Mahasiswa Menggunakan Algoritma k-NN Berbasis Data Mining dan Website">
    <meta name="msapplication-tap-highlight" content="no">
    
    <script src="assets/js/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link rel="stylesheet" href="assets/sweet/sweetalert2.css">
    <link href="./main.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/DataTables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/b-1.7.1/b-html5-1.7.1/fc-3.3.3/fh-3.1.9/r-2.2.9/sc-2.0.4/sl-1.3.3/datatables.min.css"/>
 
</head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <!-- <div class="logo-src"></div> -->
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <li class="btn-group nav-item">
                        <a href="login/logout.php" title="Log Out" type="button" class="btn-shadow p-1 btn btn-primary">
                            <i class="pe-7s-power"> Log Out</i>
                            </a>
                        </li>
                </span>
            </div>    
            <div class="app-header__content">
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <!-- <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <img width="42" class="rounded-circle" src="assets/images/avatars/user.png" alt="">
                                        </a> -->
                                    </div>
                                </div>
                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        <!-- <?php echo $_SESSION['nama'] ?> -->
                                    </div>
                                    <!-- <div class="widget-subheading">
                                        Admin
                                    </div> -->
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                    <a href="" class="btn-shadow p-1 btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal123" title="Log Out">
                                        <i class="pe-7s-power"> Log Out</i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>    
        <!-- Modal -->
        <div class="modal fade" id="exampleModal123" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                    </div>
                    <div class="modal-body">
                        <h4><center><i>Anda yakin ingin keluar dari aplikasi ini ?</i></center></h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        <a href="login/logout.php" type="button" class="btn btn-primary">Ya</a>
                    </div>
                </div>
            </div>
        </div>
<!-- Akhir Modal -->    
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example" title="Log Out">
                                <i class="pe-7s-power"> Log Out</i>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>    <div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <!-- <li class="app-sidebar__heading">Data Set</li> -->
                                <li>
                                    <a href="konten.php?page=train-data">
                                        <i class="metismenu-icon pe-7s-server"></i>
                                        Training Data
                                    </a>
                                <li>
                                    <a href="konten.php?page=test-data">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Test Data
                                    </a>
                                </li>
                                <!-- <li class="app-sidebar__heading">Hasil Perhitungan</li> -->
                                <!-- <li>
                                    <a href="konten.php?page=normalisasi-data">
                                        <i class="metismenu-icon pe-7s-eyedropper">
                                        </i>Normalisasi
                                    </a>
                                </li> -->
                                <!-- <li>
                                    <a href="konten.php?page=distance-data">
                                        <i class="metismenu-icon pe-7s-note">
                                        </i>Euclidean Distance
                                    </a>
                                </li> -->
                                <li>
                                    <a href="konten.php?page=evaluation-data">
                                        <i class="metismenu-icon pe-7s-graph2">
                                        </i>Hasil Analisa
                                    </a>
                                </li>
                                <!-- <li class="app-sidebar__heading">Profil</li> 
                             <li>
                                    <a href="konten.php?page=users-data">
                                        <i class="metismenu-icon pe-7s-users">
                                        </i>Settings
                                    </a>
                                 </li>
                                <li class="app-sidebar__heading">Help Center</li> -->
                                <li>  
                                    <a href="konten.php">
                                        <i class="metismenu-icon pe-7s-portfolio">
                                        </i>Tentang Aplikasi
                                    </a>
                                </li>                              
                            </ul>
                        </div>
                    </div>
                </div>    
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                            </div>
                                <section class="content">
                                    <?php
                                        $page = (isset($_GET['page']))? $_GET['page'] : "main";
                                        switch ($page) {

                                        case 'train-data': include "./tabel/training-data.php"; break;
                                        case 'test-data': include "./tabel/test-data.php"; break;
                                        case 'normalisasi-data': include "./tabel/normalisasi-data.php"; break;
                                        case 'evaluation-data': include "./tabel/confusion-matrix.php"; break;
                                        case 'distance-data': include "./tabel/distance.php"; break;

                                        case 'add-data': include "./tabel/form.php"; break;
                                        case 'impor-train-data': include "./import/impor-latih.php"; break;
                                        case 'impor-test-data': include "./import/impor-uji.php"; break;

                                        case 'normalisasi': include "normalisasi.php"; break;
                                        case 'hitung-knn': include "hitung-knn.php"; break;

                                        case 'users-data': include "./aksi-user/data-user.php"; break;
                                        case 'input-data': include "./aksi-user/input-user.php"; break;
                                        case 'hapus-user': include "./aksi-user/delete-user.php"; break;
                                        case 'edit-data': include "./aksi-user/ganti-akun.php"; break;
                                        case 'aktivasi-data': include "./aksi-user/activated-user.php"; break;
                                        case 'deactivate-data': include "./aksi-user/deactivate-user.php"; break;



                                        default : include 'isi-admin.php';  

                                        }
                                    ?>

                                </section>
                            </div>
                      
                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>    
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
    <script src="assets/DataTables/datatables.min.js"></script>
    <script src="assets/js/sweet/sweetalert2.all.min.js "></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/b-1.7.1/b-html5-1.7.1/fc-3.3.3/fh-3.1.9/r-2.2.9/sc-2.0.4/sl-1.3.3/datatables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.datatab').DataTable( {
                scrollY:        '50vh',
                scrollCollapse: true,
                responsive :false,
                fixedColumns: true,
                paging: false,

            } );
        } );
    </script>
</html>
<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Data Training Anda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="konten.php?page=impor-train-data">
                            <div class="position-relative form-group">
                                <label for="userfile" class="">File Excel</label><input name="userfile" id="userfile" type="file" class="form-control-file">
                                    <small class="form-text text-muted">File excel yang diupload adalah <i>format 97-2003 workbook (.xls)</i>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">
                        <i class="fa fa-upload"></i> Upload File</button>
                        <!-- <a href="export.php" class="btn btn-secondary show-toastr-example"><i class="fa fa-download"></i> Unduh Template</a> -->
                    </div>
                        </form>
                </div>
            </div>
        </div>
<!-- Akhir Modal --> 

<!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Data Testing Anda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="konten.php?page=impor-test-data">
                            <div class="position-relative form-group">
                                <label for="userfile" class="">File Excel</label><input name="userfile" id="userfile" type="file" class="form-control-file">
                                    <small class="form-text text-muted">File excel yang diupload adalah <i>format 97-2003 workbook (.xls)</i> 
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button name="submit" type="submit" class="btn btn-primary">
                        <i class="fa fa-upload"></i> Upload File</button>
                        <!-- <a href="export.php" class="btn btn-secondary show-toastr-example"><i class="fa fa-download"></i> Unduh Template</a> -->
                    </div>
                        </form>
                </div>
            </div>
        </div>
<!-- Akhir Modal -->
<?php
include "koneksi.php";
$sqlTotal = mysql_query("SELECT COUNT(*) as jumlah_total FROM data_latih");
$rowTotal = mysql_fetch_array($sqlTotal);
$getTotal = $rowTotal['jumlah_total'];
?>
<!-- Modal -->
        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Masukkan Nilai k</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="hitung-knn.php">
                            <div class="position-relative form-group"><label class="">Jumlah k</label>
                                <input name="jumlah" id="jumlah" placeholder="Masukkan nilai k" type="input" class="form-control"></div>
                                <small class="form-text text-muted">Masukkan Nilai k antara 1 s/d <?php echo $getTotal;?></small>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button name="submit" value="submit" onclick="submit()" class="btn btn-primary">Proses</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
<!-- Akhir Modal --> 

