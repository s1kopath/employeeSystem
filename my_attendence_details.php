<?php
session_start();
if (isset($_SESSION['access'])) {
    $user_id = $_SESSION['id'];
    $user_name = $_SESSION['name'];
    $user_level = $_SESSION['level'];
    include 'partials/connection.php';
    include 'partials/header.php';
    include 'partials/sidebar.php';

    $month = $_GET['month'];
    $year = $_GET['year'];

    if ($month == '01') {
        $monthTitle = "January " . $year;
    } elseif ($month == '02') {
        $monthTitle = "February " . $year;
    } elseif ($month == '03') {
        $monthTitle = "March " . $year;
    } elseif ($month == '04') {
        $monthTitle = "Aprill " . $year;
    } elseif ($month == '05') {
        $monthTitle = "May " . $year;
    } elseif ($month == '06') {
        $monthTitle = "June " . $year;
    } elseif ($month == '07') {
        $monthTitle = "July " . $year;
    } elseif ($month == '08') {
        $monthTitle = "August " . $year;
    } elseif ($month == '09') {
        $monthTitle = "September " . $year;
    } elseif ($month == '10') {
        $monthTitle = "October " . $year;
    } elseif ($month == '11') {
        $monthTitle = "November " . $year;
    } else {
        $monthTitle = "December " . $year;
    }
?>

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h1 class="pageheader-title">
                                Attendance of <?= $monthTitle ?>
                            </h1>
                        </div>
                        <div class="container">
                            <table id="myTable">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Date</th>
                                        <th>Attendance</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sl = 1;
                                    if ($month== date('m') && $year == date('Y')) {
                                        $totalDays = date('d');
                                    } else {
                                        $totalDays = cal_days_in_month(CAL_GREGORIAN,$month,$year);
                                    }

                                    for ($i=0; $i < $totalDays; $i++) { 
                                        if (strlen($i)==1) {
                                            $date = $year . '-' . $month . '-0' . $i + 1;
                                        } else {
                                            $date = $year . '-' . $month . '-' . $i + 1;
                                        }
                                        $dayofweek = date('D', strtotime($date));
                                        if ($dayofweek == 'Fri') {
                                            continue;
                                        }
                                        $raw = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `attendance_details` WHERE `date` = '$date' and `user_id` = $user_id"));
                                        if (!$raw) {
                                            $query = mysqli_query($conn, "INSERT INTO `attendance_details`(`user_id`, `date`, `month`, `year`, `is_present`) VALUES ('$user_id','$date','$month','$year','0')");
                                        }
                                    }

                                    $attendance_info = mysqli_query($conn, "SELECT * from `attendance_details` where `user_id` = '$user_id' and `month` = '$month' and `year` = '$year' ORDER BY `date` asc");
                                    while ($fetch = mysqli_fetch_assoc($attendance_info)) {
                                    ?>
                                        <tr>
                                            <td><?= $sl ?></td>
                                            <td><?= $fetch['date'] ?></td>
                                            <td class="<?= $fetch['is_present'] ? 'text-success' : 'text-danger' ?>">
                                                <?= $fetch['is_present'] ? 'Present' : 'Absent' ?>
                                            </td>
                                        </tr>
                                    <?php $sl++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php
    include 'partials/footer.php';
    ?>
    </body>

    </html>
<?php

} else {
    echo "<script>document.location.href='login.php';</script>";
}
?>