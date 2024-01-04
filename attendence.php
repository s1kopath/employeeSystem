<?php
session_start();
if (isset($_SESSION['access'])) {
    $user_id = $_SESSION['id'];
    $user_name = $_SESSION['name'];
    $user_level = $_SESSION['level'];
    include 'partials/connection.php';
    include 'partials/header.php';
    include 'partials/sidebar.php';
    if ($user_level != 'employee') {
?>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h1 class="pageheader-title">Monthly Attendance
                                    <span>
                                        <a href="create_attendance.php" class="btn btn-xs btn-outline-success">Add New</a>
                                    </span>
                                </h1>
                            </div>
                            <div class="container">
                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Month Detail</th>
                                            <th>Total Working Days</th>
                                            <th>Attended</th>
                                            <th>Absent</th>
                                            <th>Net Salary</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sl = 1;
                                        $attendance_info = mysqli_query($conn, "SELECT users.*,attendence.*,users.id as user_id FROM users INNER JOIN attendence ON attendence.employee_id = users.id ORDER BY attendence.id DESC");
                                        while ($fetch = mysqli_fetch_assoc($attendance_info)) {
                                            $full_name = $fetch['first_name'] . ' ' . $fetch['last_name'];
                                            $month = "";
                                            if ($fetch['month'] == '01') {
                                                $month = "January " . $fetch['year'];
                                            } elseif ($fetch['month'] == '02') {
                                                $month = "February " . $fetch['year'];
                                            } elseif ($fetch['month'] == '03') {
                                                $month = "March " . $fetch['year'];
                                            } elseif ($fetch['month'] == '04') {
                                                $month = "Aprill " . $fetch['year'];
                                            } elseif ($fetch['month'] == '05') {
                                                $month = "May " . $fetch['year'];
                                            } elseif ($fetch['month'] == '06') {
                                                $month = "June " . $fetch['year'];
                                            } elseif ($fetch['month'] == '07') {
                                                $month = "July " . $fetch['year'];
                                            } elseif ($fetch['month'] == '08') {
                                                $month = "August " . $fetch['year'];
                                            } elseif ($fetch['month'] == '09') {
                                                $month = "September " . $fetch['year'];
                                            } elseif ($fetch['month'] == '10') {
                                                $month = "October " . $fetch['year'];
                                            } elseif ($fetch['month'] == '11') {
                                                $month = "November " . $fetch['year'];
                                            } else {
                                                $month = "December " . $fetch['year'];
                                            }
                                        ?>
                                            <tr>
                                                <td><?= $sl ?></td>
                                                <td><?= $full_name ?></td>
                                                <td><?= $month ?></td>
                                                <td><?= $fetch['working_day'] ?></td>
                                                <td><?= $fetch['attended'] ?></td>
                                                <td><?= $fetch['absent'] ?></td>
                                                <td><?= $fetch['total_salary'] - $fetch['provident_fund'] - $fetch['professional_tax'] ?></td>
                                                <td><a href="edit_attendance.php?id=<?= $fetch['id'] ?>" class="btn btn-xs btn-outline-info">Edit</a></td>
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
    } else { ?>
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h1>You Have no authorization to this page.</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </body>

    </html>
<?php

} else {
    echo "<script>document.location.href='login.php';</script>";
}
?>