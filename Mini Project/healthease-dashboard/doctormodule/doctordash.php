<?php
session_start();
$_SESSION;

include("../adminphp/connection.php");
include("functions.php");

$user_data = check_login($con);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../assets/img/logo.png" type="image/x-icon">
    <title>Doctor Home | HealthEase </title>
    <!--Font awesome stylesheet-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- bootstrap stylesheet -->
    <link rel="stylesheet" href="../assets/css/customizeBootstrap.css">
    <!-- css stylesheet -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="body-bg">

    <!-- main body  -->

    <!-- preloader  -->
    <div id='preloader'>
        <svg id='loader-1' height='210' width='550' xmlns='http://www.w3.org/2000/svg'
            xmlns:xlink='http://www.w3.org/1999/xlink'>
            <path id='loader-2' stroke='#DE6262' fill='none' stroke-width='2' stroke-linejoin='round'
                d='M0,90L250,90Q257,60 262,87T267,95 270,88 273,92t6,35 7,-60T290,127 297,107s2,-11 10,-10 1,1 8,-10T319,95c6,4 8,-6 10,-17s2,10 9,11h210' />
        </svg>
    </div>

    <!-- sidebar start -->
    <div class="sidebar">
        <div class="sidebar-wrapper">
            <div>
                <i class="fa-solid fa-x hide-menubar" id="hide-menubar"></i>
                <div class="p-xl-20 p-10 ">
                    <div class="logo pb-20">
                        <a class="d-flex align-items-center" href="#">
                            <img src="../assets/img/logo.png" alt="logo">
                            <img class="ms-10 show-item lp-2" src="../assets/img/logo-body.png" alt="logo">
                        </a>
                    </div>
                    <div class="py-20 bb-2 bt-1">
                        <a class="sidebar-user" href="javascript:void(0)">
                            <img class="rounded-circle" src="../assets/img/doctor.png" alt="Doctor">
                            <span class="para-1b show-item ms-10">Welcome, Mr. <?php echo $user_data['user_name']; ?></span>
                        </a>
                    </div>
                </div>
                <div class="side-menu">
                    <ul>
                        <li class="active">
                            <a href="#">
                                <i class="fa-solid fa-gauge-high"></i>
                                <span class="show-item">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="docinfo.html">
                                <i class="fa-solid fa-laptop-medical"></i>
                                <span class="show-item">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a href="addbed.html">
                                <i class="fa-solid fa-bed"></i>
                                <span class="show-item">Bed records</span>
                            </a>
                        </li>
                        <li>
                            <a href="patient.html">
                                <i class="fa-solid fa-bed-pulse"></i>
                                <span class="show-item"> Patient </span>
                            </a>
                        </li>
                        <li>
                            <a href="addpatient.html">
                            <i class="fa-solid fa-bed-pulse"></i>   
                                <span class="show-item">Add-Patient</span>
                            </a>
                        </li>
                        <li>
                            <a href="editpatient.html">
                            <i class="fa-solid fa-bed-pulse"></i>
                                <span class="show-item">Edit-Patient</span>
                            </a>
                        </li>
                        <li>
                            <a href="discharge.html">
                                <i class="fa-solid fa-file-prescription"></i>
                                <span class="show-item">Discharge-Patient</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <button class="log-out">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <a href="logout.php" class="show-item">Log Out</a>
            </button>

        </div>
    </div>
    <!-- sidebar end  -->

    <!-- main content & top header start  -->
    <main class="content-wrapper">

        <!-- header section start  -->
        <header>
            <div class="d-flex align-items-center gap-xl-30 gap-3">

                <button class="toggle-menu btn">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>

                <a href="https://health-ease-gamma.vercel.app/" target="_blank">
                    <i class="fa-solid fa-globe me-10"></i>
                    <span class="fs-base header-item-hide">Go to website</span>
                </a>
            </div>

            <div class="d-flex align-items-center gap-sm-4 gap-3">

                <div class="health-ease">
                    <i class="fa-regular fa-hospital me-xl-10 he-icon"></i>
                    E-Hospital
                </div>


                <div class="account">
                    <img class="me-xl-10" src="../assets/img/patient.png" alt="patient">
                    Mr. <?php echo $user_data['user_name']; ?>
                </div>

                <div class="language ">
                    <img class="lang-flag header-item-hide" src="../assets/img/flag.png" alt="flag">
                    IN
                </div>
            </div>
        </header>
        <!-- header section end  -->

        <!-- content section start   -->
        <div class="main-content">
            <!-- main content start -->
            <div>
                <div class="page-title">
                    <h3>Dashboard</h3>
                    <ul class="d-flex align-items-center gap-20">
                        <li class="bc-item">Dashboard</li>
                    </ul>
                </div>

                <div class="row g-xxl-4 g-lg-3 gy-3 mb-4">
                    <div class="col-lg-4 col-md-6">
                        <div class="card-box">
                            <div>
                                <span class="para-1b d-block mb-1">Appointments</span>
                                <span class="para-bq d-block">499</span>
                            </div>
                            <div class="card-box-icon bgpc-1">
                                <img src="../assets/img/icon/calender.png" alt="calender">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-box">
                            <div>
                                <span class="para-1b d-block mb-1">Revenue</span>
                                <span class="para-bq d-block">$582,618.80</span>
                            </div>
                            <div class="card-box-icon bgc-3">
                                <img src="../assets/img/icon/price.png" alt="price">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-box">
                            <div>
                                <span class="para-1b d-block mb-1">Today's Earning</span>
                                <span class="para-bq d-block">$0.00</span>
                            </div>
                            <div class="card-box-icon bgc-4">
                                <img src="../assets/img/icon/coin.png" alt="coin">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-box">
                            <div>
                                <span class="para-1b d-block mb-1">Today Appointments</span>
                                <span class="para-bq d-block">0</span>
                            </div>
                            <div class="card-box-icon bgc-4">
                                <img src="../assets/img/icon/calender-2.png" alt="calender">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-box">
                            <div>
                                <span class="para-1b d-block mb-1">Tomorrow Appointments</span>
                                <span class="para-bq d-block">0</span>
                            </div>
                            <div class="card-box-icon bgpc-1">
                                <img src="../assets/img/icon/calender.png" alt="calender">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="card-box">
                            <div>
                                <span class="para-1b d-block mb-1">Upcoming Appointments</span>
                                <span class="para-bq d-block">8</span>
                            </div>
                            <div class="card-box-icon bgc-3">
                                <img src="../assets/img/icon/calender.png" alt="calender">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row g-xxl-4 g-lg-3 gy-3">
                    <div class="col-xxl-8 col-lg-7">
                        <div class="bgnc-10 br-sm monthly-user">
                            <span class="d-block para-bq text-center">Monthly Registered Users</span>
                            <!-- Monthly Registered Users chart  -->
                            <canvas id="monthlyUserChart"></canvas>
                        </div>
                    </div>

                    <div class="col-xxl-4 col-lg-5 col-md-8 col-sm-10 mx-auto">
                        <div class="p-xl-30 p-3 bgnc-10 br-sm">
                            <div class="d-between gap-1 mb-30">
                                <span class="d-block para-bq">Monthly Earning</span>

                                <ul class="tab-btn" id="pills-tab" role="tablist">
                                    <li role="presentation">
                                        <button class="nav-link para-1b fs-base active" id="weekly-tab"
                                            data-bs-toggle="pill" data-bs-target="#weekly" role="tab"
                                            aria-controls="weekly" aria-selected="true">Weekly</button>
                                    </li>
                                    <li role="presentation">
                                        <button class="nav-link para-1b fs-base" id="monthly-tab" data-bs-toggle="pill"
                                            data-bs-target="#monthly" role="tab" aria-controls="monthly"
                                            aria-selected="false">Monthly</button>
                                    </li>
                                </ul>
                            </div>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="weekly" role="tabpanel"
                                    aria-labelledby="weekly-tab">

                                    <div class="d-between mb-30">
                                        <div class="">
                                            <span class="d-block para-1b fs-base mb-10">This Week</span>
                                            <span class="para-bq fs-4xl d-block mb-10">$29.5</span>
                                            <span class="para-1b d-block"> <span class="tsc-1"> -31.08% </span> From
                                                Previous week</span>
                                        </div>
                                        <div class="earning-icon">
                                            <img class="w-100" src="../assets/img/earning.png" alt="earning">
                                        </div>
                                    </div>

                                    <div class="d-between chart-br">
                                        <div class="report-chart">
                                            <!-- 1st 15 days Analytics -->
                                            <canvas class="earning-report" id="ffd"></canvas>
                                            <span class="d-block mt-14 text-center">1st 15 days Analytics</span>
                                        </div>
                                        <div class="report-chart">
                                            <!-- last 15 days Analytics -->
                                            <canvas class="earning-report" id="lfd"></canvas>
                                            <span class="d-block mt-14 text-center">last 15 days Analytics</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                                    <div class="d-between mb-30">
                                        <div class="">
                                            <span class="d-block para-1b fs-base mb-10">This Month</span>
                                            <span class="para-bq fs-4xl d-block mb-10">$229.655</span>
                                            <span class="para-1b d-block"> <span class="tsc-1"> -81.08% </span> From
                                                Previous month</span>
                                        </div>
                                        <div class="earning-icon">
                                            <img class="w-100" src="../assets/img/earning.png" alt="earning">
                                        </div>
                                    </div>

                                    <div class="d-between chart-br">
                                        <div class="report-chart">
                                            <!-- 1st 15 days Analytics -->
                                            <canvas class="earning-report" id="ffda"></canvas>
                                            <span class="d-block mt-14 text-center">1st 15 days Analytics</span>
                                        </div>
                                        <div class="report-chart">
                                            <!-- last 15 days Analytics -->
                                            <canvas class="earning-report" id="lfda"></canvas>
                                            <span class="d-block mt-14 text-center">last 15 days Analytics</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main content end -->

            <!-- footer start  -->
            <footer>
                <div class="container-fluid">
                    <span class="para-1b fs-base text-center text-sm-start d-block ">Copyright © <span class="currentYear"></span> HealthEase Medical. All
                        rights reserved.</span>
                </div>
            </footer>
            <!-- footer end  -->
        </div>
        <!-- content section end   -->
    </main>
    <!-- main content & top header end  -->

    <!-- jquery -->
    <script src="../assets/js/plugin/jquery-3.7.0.min.js"></script>
    <!-- bootstrap js  -->
    <script src="../assets/js/plugin/bootstrap.min.js"></script>
    <!-- nice select  -->
    <script src="../assets/js/plugin/jquery.nice-select.min.js"></script>
    <!-- chart js  -->
    <script src="../assets/js/plugin/cdn.jsdelivr.net_npm_chart.js"></script>
    <!-- plugin customize js  -->
    <script src="../assets/js/pluginCustomization.js"></script>


    <!-- main js  -->
    <script src="../assets/js/main.js"></script>
</body>

</html>