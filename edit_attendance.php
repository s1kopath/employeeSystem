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
        $attendance_id = $_GET['id'];
        if (isset($_POST['update_attendence'])) {
            $employee_id = $_POST['employee_id'];
            $month = $_POST['month'];
            $year = $_POST['year'];
            $working_day = $_POST['working_day'];
            $absent = $_POST['absent'];
            $total_salary = $_POST['total_salary'];
            $attended = $_POST['attended'];
            $query = mysqli_query($conn, "UPDATE `attendence` SET `employee_id`='$employee_id',`month`='$month',`year`='$year',`working_day`='$working_day',`absent`='$absent',`total_salary`='$total_salary',`attended`='$attended' WHERE `id`='$attendance_id'");
            if ($query) {
                echo "<script>alert('Data Stored !')</script>";
                echo "<script>document.location.href='attendence.php';</script>";
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
                                <h2 class="pageheader-title">Update Attendance</h2>
                            </div>
                            <div class="page-body card card-body">
                                <?php
                                $fetch = mysqli_fetch_assoc(mysqli_query($conn, "SELECT attendence.*, users.first_name, users.last_name, salary.id as salId, salary.total_salary as ttl_salary, attendence.total_salary as totl_salary, salary.deduction_rate FROM `attendence` INNER JOIN users on users.id = attendence.employee_id INNER JOIN salary ON attendence.employee_id = salary.employee_id where attendence.id = $attendance_id AND salary.status='active';"));
                                // echo print_r($fetch);
                                ?>
                                <h2><?= $fetch['first_name'] . ' ' . $fetch['last_name'] ?> Attendnce Detail</h2>
                                <form action="" method="POST">
                                    <label for="">Month</label>
                                    <input type="text" readonly class="form-control" value="<?= $fetch['month'] ?>" name="month" id="">
                                    <label for="">Year</label>
                                    <input type="text" class="form-control" readonly value="<?= $fetch['year'] ?>" name="year" id="">
                                    <label for="">Total Working Days</label>
                                    <input type="text" class="form-control" readonly name="working_day" value="<?= $fetch['working_day'] ?>" id="working_days_<?= $attendance_id ?>">
                                    <label for="">Attended</label>
                                    <input type="number" class="form-control" required name="attended" oninput="return checkAttended(this.value,<?= $attendance_id ?>);" onblur="return checkAttended(this.value,<?= $attendance_id ?>);" min="0" value="<?= $fetch['attended'] ?>" max="<?= $fetch['working_day'] ?>" id="attended_<?= $attendance_id ?>">
                                    <label for="">Total Absent</label>
                                    <input type="text" class="form-control" readonly value="<?= $fetch['absent'] ?>" name="absent" min="0" id="absent_<?= $attendance_id ?>">

                                    <input type="hidden" class="form-control" name="" value="<?= $fetch['deduction_rate'] ?>" id="deduct_<?= $attendance_id ?>">
                                    <input type="hidden" class="form-control" name="" id="salary_<?= $attendance_id ?>" value="<?= $fetch['ttl_salary'] ?>">

                                    <label for="">Gross Salary</label>
                                    <input type="text" class="form-control" value="<?= $fetch['totl_salary'] ?>" readonly name="total_salary" id="total_salary_<?= $attendance_id ?>">

                                    <label for="">Provident Fund</label>
                                    <input type="text" class="form-control" value="<?= $fetch['provident_fund'] ?>" readonly id="provident_fund_<?= $attendance_id ?>">

                                    <label for="">Tax</label>
                                    <input type="text" class="form-control" value="<?= $fetch['professional_tax'] ?>" readonly id="professional_tax_<?= $attendance_id ?>">

                                    <label for="">Net Salary</label>
                                    <input type="text" class="form-control" value="<?= $fetch['totl_salary'] - $fetch['provident_fund'] - $fetch['professional_tax'] ?>" readonly id="net_salary_<?= $attendance_id ?>">

                                    <input type="hidden" name="employee_id" id="employee_id" value="<?= $fetch['employee_id'] ?>">

                                    <input type="submit" name="update_attendence" id="" class="btn btn-outline-danger" value="Update Attendence">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <script>
            function checkAttended(val, id) {
                let attn = val;
                let elmid = id;
                let work = document.querySelector('#working_days_' + elmid).value;
                if (attn > work) {
                    document.querySelector('#attended_' + elmid).value = work;
                } else {
                    let deduct = document.querySelector('#deduct_' + elmid).value;
                    let salary = document.querySelector('#salary_' + elmid).value;
                    let fund = document.querySelector('#provident_fund_' + elmid).value;
                    let tax = document.querySelector('#professional_tax_' + elmid).value;
                    let abs = parseInt(work) - parseInt(attn);
                    let newsal = parseInt(salary) - (parseInt(abs) * parseInt(deduct));
                    let netSal = parseInt(newsal)-parseInt(fund) - parseInt(tax);
                    if (isNaN(newsal) || attn == 0) {
                        newsal = 0;
                        netSal = 0;
                    }
                    if (isNaN(abs)) {
                        abs = work;
                        // document.querySelector('#attended_'+elmid).value=0;
                    }

                    document.querySelector('#total_salary_' + elmid).value = newsal;
                    document.querySelector('#net_salary_' + elmid).value = netSal;
                    document.querySelector('#absent_' + elmid).value = abs;
                    // console.log(`${newsal}`);
                }
            }
        </script>
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