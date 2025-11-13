<?php
error_reporting(0);
session_start();
include 'includes/lib.inc.php';
include APP_ROOT . "/includes/class.inc.php";
include APP_ROOT . "/includes/auth.inc.php";
$jp = new jcore();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon1.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>SDN 3 Wadas</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="assets/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
    <script src="assets/plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-42.jpg">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        ADMIN
                    </a>
                </div>
                <ul class="nav">
                    <li>
                        <a href="index.php">
                            <i class="pe-7s-users"></i>
                            <p>Siswa</p>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?page=seleksi">
                            <i class="pe-7s-comment"></i>
                            <p>Seleksi</p>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?page=cetakhasil">
                            <i class="pe-7s-print"></i>
                            <p>Hasil Seleksi</p>
                        </a>
                    </li>

                    <li>
                        <a href="index.php?page=admin">
                            <i class="pe-7s-add-user"></i>
                            <p>Admin</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-default navbar-fixed">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="logout.php">
                                    Log out
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>


            <div class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="content">

                            <?php
                            switch ($_REQUEST[page]) {
                                case "admin":
                                    include "admin.php";
                                    break;
                                case "seleksi":
                                    include "seleksi.php";
                                    break;
                                case "cetakhasil":
                                    include "cetakhasil.php";
                                    break;
                                case "hasil":
                                    include "hasil.php";
                                    break;
                                default:
                                    include ('siswa.php');
                                    break;
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>


            <footer class="footer">
                <div class="container-fluid">

                    <p class="copyright pull-right">
                        &copy; 2024 <a href="#">Dimas Satria Perdana</a>
                    </p>
                </div>
            </footer>

        </div>
    </div>


</body>

<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
<script src="assets/js/chartist.min.js"></script>
<script src="assets/js/bootstrap-notify.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="assets/js/light-bootstrap-dashboard.js"></script>
<script src="assets/js/demo.js"></script>

</html>