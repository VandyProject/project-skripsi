<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Sistem Informasi Klasifikasi - Menggunakan Algoritma k-NN</title>
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
                <!-- <div class="logo-src">
                </div> -->
                <div class="header__pane ml-auto">
                    <div>
                    </div>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="index2.php?page=form-prediction" class="nav-link">
                                <i class="nav-link-icon fa fa-edit"> </i>
                                Klasifikasi
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a href="index2.php" class="nav-link">
                                <span class="fa fa-book"> Tentang Aplikasi</span>
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <button type="button" class="btn-shadow p-1 btn btn-primary" data-toggle="modal" data-target="#exampleModal1" title="Log in">
                                <i class="fa fa-key"> Log In</i>
                            </button>
                        </li>
                    </ul>
                </span>
            </div>    
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                    </div>
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="index2.php?page=form-prediction" class="nav-link">
                                <span class="fa fa-edit"> Klasifikasi</span>
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a href="index2.php?page=analytic" class="nav-link">
                                <span class="fa fa-database"> Hasil Analisa</span>
                            </a>
                        </li>
                        <li class="btn-group nav-item">
                            <a href="index2.php" class="nav-link">
                                <span class="fa fa-book"> Tentang Aplikasi</span>
                            </a>
                        </li>
                    </ul>        
                </div>
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
                                    <!-- <div class="widget-heading">
                                        Login to
                                    </div>
                                    <div class="widget-subheading">
                                        Admin
                                    </div> -->
                                </div>
                                <div class="widget-content-right header-user-info ml-3">
                                <button type="button" class="btn-shadow p-6 btn btn-primary" data-toggle="modal" data-target="#exampleModal" title="Log Out">
                                        <i class="pe-7s-power"> Login</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>    
                
                    <div class="app-header__mobile-menu">
                        <div>
                        
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
                    </div>  
                    
                <div class="app-main">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                            </div>
                                <section class="content">
                                    <?php
                                        $page = (isset($_GET['page']))? $_GET['page'] : "main";
                                        switch ($page) {

                                        case 'aksi-login': include "./login/aksi-login.php"; break;
                                        case 'form-prediction': include "./users/form.php"; break;
                                        case 'prediction': include "klasifikasi.php"; break;
                                        case 'hasil-klasifikasi': include "./users/hasil.php"; break;
                                        case 'analytic': include "./users/matrix.php"; break;


                                        default : include 'dashboardcopy.php';  

                                        }
                                    ?>

                                </section>
                            </div>
                        </div>
                        
                            </div>
                    
                </div>
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>    
    <script type="text/javascript" src="./assets/scripts/main.js"></script>
    <script src="assets/js/sweet/sweetalert2.all.min.js "></script>
    <script type="text/javascript">
        $(".angka").on("keyup", function(){
            var valid = /^d{0,15}(.d{0,2})?$/.test(this.value),
            val = this.value;
    
            if(!valid){
            console.log("Invalid input!");
            this.value = val.substring(0, val.length - 1);
            }
        });
    </script>
</html>
<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex2="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Please Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data" action="index2.php?page=aksi-login&op=in">
                            <div class="position-relative form-group"><label class="">Username</label>
                                <input name="username" id="username" placeholder="Enter Your Username" type="input" class="form-control"></div>
                            <div class="position-relative form-group"><label for="exampleEmail" class="">Password</label>
                                <input name="password" id="password" type="password" placeholder="Enter Your Password" type="input" class="form-control"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Log In</button>
                    </div>
                        </form>
                </div>
            </div>
        </div>
        <!-- Akhir Modal        -->
        <!-- <div class="modal fade" id="exampleModal" tabindex2="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </div> -->