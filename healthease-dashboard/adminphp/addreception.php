<?php
session_start();

include("connection.php");
include("../receptionmodule/functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['pass_word'];

    if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

        // Escape inputs to prevent SQL injection
        $user_name = mysqli_real_escape_string($con, $user_name);
        $password = mysqli_real_escape_string($con, $password);

        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Save to database
        $user_id = random_num(20);
        $query = "INSERT INTO reception (user_id, user_name, password) VALUES ('$user_id', '$user_name', '$hashed_password')";

        if (mysqli_query($con, $query)) {
            // Redirect to login page after successful registration
            header("Location: ../adminmodule/dashboard.php");
            die;
        } else {
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "Please enter some valid information";
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title>E-Hospital SignUP</title>
    <!--Font awesome stylesheet-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap stylesheet -->
    <link rel="stylesheet" href="../assets/css/customizeBootstrap.css">
    <!-- css stylesheet -->
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <div class="login-body">
        <div class="container position-relative">
            <div class="login-img-1">
                <img class="w-100 rounded-circle" src="../assets/img/log/log-1.png" alt="animation img">
            </div>
            <div class="login-img-2">
                <img class="w-100 rounded-circle" src="../assets/img/log/log-2.png" alt="animation img">
            </div>
            <div class="login-img-3">
                <img class="w-100 rounded-pill" src="../assets/img/log/log-3.png" alt="animation img">
            </div>
            <div class="login-img-4">
                <img class="w-100 rounded-circle" src="../assets/img/log/log-4.png" alt="animation img">
            </div>

            <div class="login-img-5">
                <img class="w-100 rounded-pill" src="../assets/img/log/log-5.png" alt="animation img">
            </div>

            <div class="d-center h-100vh">
                <div class="login-form">
                    <h5 class="tpc-2 mb-sm-30 mb-3 text-center"> E-Hospital <span class="fw-normal tsc-1"> Medical
                        </span></h5>
                    <form action="#" id="mainform" method="post">
                        <div class="mb-20">
                            <label class="mb-3 d-block para-1b fw-medium">Hospital:</label>
                            <input id="HospitalINP" type="text" name="user_name" class="login-input" placeholder="Your Hospital...">
                        </div>
                        <div class="mb-20">
                            <label class="mb-3 d-block para-1b fw-medium">Username:</label>
                            <input id="usernameINP" type="text" name="user_name" class="login-input" placeholder="Your email...">
                        </div>

                        <div>
                            <label class="mb-3 d-block para-1b fw-medium">Password</label>
                            <input id="passwordINP" type="password" name="pass_word" class="login-input" placeholder="Your password...">
                        </div>

                        <div class="my-sm-30 my-3 d-between">

                        </div>

                        <button type="submit" id="loginbtn" class="btn-1 heading-six w-100 mb-sm-30 mb-3 bgpc-2 tnc-10">Register User</button>

                    </form>
                    <div class="text-center">
                        <span class="para-1b fs-base">Already Registered ?<a href="../adminmodule/dashboard.php"
                                class="tpc-2"> Go To Dashboard</a></span>
                    </div>
                </div>
            </div>

        </div>
    </div>

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