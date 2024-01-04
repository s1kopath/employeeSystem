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
        if (isset($_POST['add_attendance'])) {
            $cnt = count($_POST['working_days']);
            // echo "<script>alert('$cnt')</script>";
            for ($i = 0; $i < $cnt; $i++) {
                $employee_id = $_POST['employee_id'][$i];
                $month = $_POST['month'];
                $year = $_POST['year'];
                $working_day = $_POST['working_days'][$i];
                $absent = $_POST['absent'][$i];
                $total_salary = $_POST['total_salary'][$i];
                $attended = $_POST['attended'][$i];
                $provident_fund = $_POST['provident_fund'][$i];
                $professional_tax = $_POST['professional_tax'][$i];

                $query = mysqli_query($conn, "INSERT INTO `attendence`(`employee_id`, `month`, `year`, `working_day`, `absent`, `total_salary`, `attended`, `provident_fund`, `professional_tax`) VALUES ('$employee_id','$month','$year','$working_day','$absent','$total_salary','$attended','$provident_fund','$professional_tax')");
                
            }
            
            if ($cnt > 0) {
                echo "<script>alert('Data Stored !')</script>";
                echo "<script>document.location.href='';</script>";
            } else {
                echo "<script>alert('Error ! Data not found')</script>";
                echo "<script>document.location.href='';</script>";
            }
        }
?>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Add Attendance</h2>
                            </div>
                            <div class="page-body">
                                <form action="" method="post">
                                    <label for="">Month</label>
                                    <select name="month_id" style="width: 150px;" id="month_id" class="form-control">
                                        <option disabled>--Select Month--</option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">Aprill</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                    <label for="">Year</label>
                                    <select class="form-control" style="width: 150px;" name="year_id" id="year_id">
                                        <option disabled>--Select Year--</option>
                                        <option value="<?= date("Y") ?>"><?= date("Y") ?></option>
                                        <option value="<?= date("Y", strtotime('+1 year')) ?>"><?= date("Y", strtotime('+1 year')) ?></option>
                                    </select>
                                    <br>
                                    <input type="submit" name="create_form" id="create_form" value="Generate Attendance">
                                </form>
                                <br>
                                <br>
                                <?php
                                if (isset($_POST['create_form'])) {
                                    
                                    $year = $_POST['year_id'];
                                    $month = $_POST['month_id'];
                                    $info = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(employee_id) as ttl FROM `attendence` where month = $month AND year = $year"));
                                    if ($info['ttl'] < 1 || $info['ttl'] == null) {
                                        echo '<form action="" method="post">';

                                        include 'partials/attendance_table.php';

                                        echo '<input type="submit" class="btn btn-sm btn-outline-success" name="add_attendance" id="" value="Add">';
                                    } else {
                                        echo "Already Attendance Added for this Month";
                                    }
                                }
                                ?>
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