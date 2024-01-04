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
        if (isset($_POST['add_leave'])) {
            $start_date = $_POST['start_date'];
            $monthYear = date('Y-m', strtotime($start_date));
            $date = $monthYear . '-%';
            $reason = $_POST['reason'];
            $days = $_POST['days'];
            $end_date = date('Y-m-d', strtotime($start_date . ' +' . $days . ' day'));
            $employee_id = $_POST['employee_id'];
            $existing = mysqli_fetch_assoc(mysqli_query($conn, "SELECT sum(leave_days) as lv_day FROM `employee_leave` WHERE start_date LIKE '$date' and is_approve ='1' and emp_id = '$employee_id'"));
            if (is_null($existing)) {
                $existing['lv_day'] = 0;
            }
            $check_leave = $days - $existing['lv_day'];
            // echo "<script>alert('".$check_leave."')</script>";
            if ($check_leave == $days) {
                $query = mysqli_query($conn, "INSERT INTO `employee_leave`(`emp_id`, `start_date`, `end_date`, `reason`, `leave_days`) VALUES ('$employee_id','$start_date','$end_date','$reason','$days')");
                if ($query) {
                    echo "<script>alert('Data Stored !')</script>";
                } else {
                    echo "<script>alert('Data Not Found !')</script>";
                }
                echo "<script>window.location.href=''</script>";
            } else {
                echo "<script>alert('Sorry. This Employee Has Taken " . $existing['lv_day'] . " days Already')</script>";
                echo "<script>window.location.href=''</script>";
            }
        }
?>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Leave Application</h2>
                            </div>
                            <div class="page-body">
                                <form action="" method="post">
                                    <label for="">Leave Date</label>
                                    <input type="date" required name="start_date" style="width: 150px;" class="form-control" id="">
                                    <label for="">Leave Reason</label>
                                    <textarea name="reason" required class="form-control" style="width: 150px;" id="" cols="10" rows="5"></textarea>
                                    <label for="">Leave Days</label>
                                    <select name="days" class="form-control" style="width: 150px;" required id="">
                                        <option value="1">1 Day</option>
                                        <option value="2">2 Day</option>
                                        <option value="3">3 Day</option>
                                    </select>
                                    <label for="">Select Employee</label>
                                    <select class="form-control" name="employee_id" style="width: 150px;" id="">
                                        <?php
                                        $qry = mysqli_query($conn, "SELECT * FROM `users`");
                                        while ($fetch = mysqli_fetch_assoc($qry)) {
                                        ?>
                                            <option value="<?= $fetch['id'] ?>"><?= $fetch['first_name'] . " " . $fetch['last_name'] ?></option>
                                        <?php  }
                                        ?>
                                    </select>
                                    <br>
                                    <input type="submit" class="btn btn-success" name="add_leave" id="add_leave" value="Add Leave">
                                </form>
                                <hr>
                                <br>
                                <br>
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