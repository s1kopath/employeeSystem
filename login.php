<?php
if (isset($_POST['login'])) {
    require_once("partials/connection.php");
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $user = mysqli_query($conn, "SELECT * FROM `users` where email='$email' && password='$password'");
    if (mysqli_num_rows($user) != 0) {
        while ($fetch = mysqli_fetch_assoc($user)) {
            $user_id = $fetch['id'];
            $user_name = $fetch['username'];
            $user_contact = $fetch['phone_number'];
            $user_address = $fetch['address'];
            $user_level = $fetch['role'];
        }
        session_start();
        $_SESSION['name'] = $user_name;
        $_SESSION['id'] = $user_id;
        $_SESSION['contact'] = $user_contact;
        $_SESSION['address'] = $user_address;
        $_SESSION['level'] = $user_level;
        $_SESSION['access'] = 1;

        $today = date('Y-m-d');
        $month = date('m');
        $year = date('Y');

        $raw = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `attendance_details` WHERE `date` = '$today' and `user_id` = $user_id"));

        if (!$raw) {
            $query = mysqli_query($conn, "INSERT INTO `attendance_details`(`user_id`, `date`, `month`, `year`) VALUES ('$user_id','$today','$month','$year')");
        }

        echo "<script>document.location.href='dashboard.php';</script>";
    } else {
        echo "<script>document.location.href='login.php';</script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><h1><a style="color: #5969ff">User Login</a></h1><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <input class="form-control form-control-lg" type='email' placeholder="email" name='email' autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                    </div>
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>