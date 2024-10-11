<?php
                    $server = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "ayurvedik_hospital";

                    $conn = mysqli_connect($server,$username,$password,$database);
                    if(!$conn){
                        echo "connection failed";
                     }
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/img/logo.png" type="image/x-icon">
    <title>Admin Devices | HealthEase </title>
    <!--Font awesome stylesheet-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <a class="d-flex align-items-center" href="../dashboard.php">
                            <img src="../assets/img/logo.png" alt="logo">
                            <img class="ms-10 show-item lp-2" src="../assets/img/logo-body.png" alt="logo">
                        </a>
                    </div>
                    <div class="py-20 bb-2 bt-1">
                        <a class="sidebar-user" href="javascript:void(0)">
                            <img class="rounded-circle" src="../assets/img/admin.png" alt="admin">
                            <span class="para-1b show-item ms-10">Reception</span>
                        </a>
                    </div>
                </div>
                <div class="side-menu">
                    <ul>
                        <li>
                            <a href="receptiondash.php">
                                <i class="fa-solid fa-gauge-high"></i>
                                <span class="show-item">Dashboard</span>
                            </a>
                        </li>
                        <li class="active">
                            <a href="#">
                                <i class="fa-solid fa-laptop-medical"></i>
                                <span class="show-item">Device</span>
                            </a>
                        </li>
                        <li>
                            <a href="doctor.php">
                                <i class="fa-solid fa-laptop-medical"></i>
                                <span class="show-item">Doctors</span>
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
                <span class="show-item"> Log Out </span>
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

                <a href="#" target="_blank">
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
                    Reception
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
                <div class="page-title justify-content-end">
                    <!-- <h3>Device</h3> -->
                    <ul class="d-flex align-items-center gap-20">
                        <li class="bc-item"><a class="para-1b" href="../dashboard.html">Dashboard</a></li>
                        <li class="bc-item">Device</li>
                    </ul>
                </div>

                <div class="list-body">
                    <div class="list-title d-between bgnc-10 br-trl-sm px-30 py-3">
                        <span class="heading-five tpc-2">Device</span>
                        <button class="btn-2 para-1b" id="showFilter"> <i
                                class="fa-solid fa-sliders"></i>Filter</button>
                    </div>
                    <!-- pop up filter box start -->
                    <div class="filter-list bgnc-10 ">
                        <div class="px-30 pt-3 pb-30">
                            <form action="#" class="d-between gap-30 mb-30">
                                <div class="w-100">
                                    <label class="para-1b d-block tnc-1 mb-10">Name</label>
                                    <input class="form-control px-xxl-30 py-xxl-20 p-lg-20 p-3" type="text"
                                        placeholder="Your name">
                                </div>
                                <div class="w-100">
                                    <label class="para-1b d-block tnc-1 mb-10">Email</label>
                                    <input class="form-control px-xxl-30 py-xxl-20 p-lg-20 p-3" type="email"
                                        placeholder="Your email">
                                </div>
                                <div class="w-100">
                                    <label class="para-1b d-block tnc-1 mb-10">Phone</label>
                                    <input class="form-control px-xxl-30 py-xxl-20 p-lg-20 p-3" type="number"
                                        placeholder="Your number">
                                </div>
                            </form>
                            <button class="btn-2">Submit</button>
                        </div>
                    </div>
                    <!-- pop up filter box end -->

                    <table class="list-table" id="itemTable">
                    <table class="tab-1">
                        <tr class="head">
                            <th class="col-1">Sr no.</th>
                            <th class="col-2">Particular</th>
                            <th class="col-3">Area Sq.m</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Total constructed area of Hospital</td>
                            <td>6246.72</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Hospital Administration desk</td>
                            <td>156.49</td>

                        </tr>
                        <?php
                            $sql = "SELECT * FROM `table5_data`";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr><td>" . $row["sr no"] . "</td><td>" . $row["Particulars"] . "</td><td>" . $row["Area"] . "</td></tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>0 results</td></tr>";
                            }
                        ?>
                    </table>
                    </table>

                </div>

            </div>
            <!-- main content end -->

            <!-- footer start  -->
            <footer>
                <div class="container-fluid">
                    <span class="para-1b fs-base text-center text-sm-start d-block ">Copyright © <span
                            class="currentYear"></span> HealthEase Medical. All
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