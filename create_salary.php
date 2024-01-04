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
        if (isset($_POST['Submit'])) {
            $employee_id = $_POST['employee_id'];
            $medical_allowance = $_POST['medical_allowance'];
            $house_rent = $_POST['house_rent'];
            $travel_allowance = $_POST['travel_allowance'];
            $basic_salary = $_POST['basic_salary'];
            $working_days = $_POST['working_days'];
            $bonus = $_POST['bonus'];
            $provident_fund = $_POST['provident_fund'];
            $professional_tax = $_POST['professional_tax'];
            $total_salary = $_POST['total_salary'];
            $deduction_rate = round(((int)$total_salary) / 30);
            $expire_date = date("Y-m-d", strtotime($_POST['expire_date']));
            $prev_query = mysqli_fetch_assoc(mysqli_query($conn, "SELECT count(id) as ids FROM `salary` where status='active' and employee_id='$employee_id'"));

            if ($prev_query['ids'] > 0) {
                mysqli_query($conn, "UPDATE `salary` SET status='cancel' WHERE `employee_id`='$employee_id'");
            }
            $query = mysqli_query($conn, "INSERT INTO `salary`(`employee_id`, `expire_date`, `total_salary`, `medical_allowance`, `house_rent`, `travel_allowance`, `basic_salary`, `working_days`, `deduction_rate`, `status`, `bonus`,`provident_fund`,`professional_tax`) VALUES ('$employee_id','$expire_date','$total_salary','$medical_allowance','$house_rent','$travel_allowance','$basic_salary','$working_days','$deduction_rate','active','$bonus', '$provident_fund','$professional_tax')");
            if ($query) {
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
                                <h2 class="pageheader-title">Create Salary</h2>
                            </div>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="">Employee</label>
                                    <select class="form-control" name="employee_id" style="width: 50%;" id="">
                                        <option disabled>---SELECT Employee---</option>
                                        <?php
                                        $users = mysqli_query($conn, "Select * from users");
                                        while ($user = mysqli_fetch_assoc($users)) {
                                            $fullName = $user['first_name'] . ' ' . $user['last_name'];
                                            $user_id = $user['id']; ?>
                                            <option value="<?= $user_id ?>"><?= $fullName ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Medical Allowance</label>
                                    <input type="number" onblur="calculateSalary();" style="width:50%;" class="form-control" required name="medical_allowance" id="medical_allowance_id">
                                    <span class="medical_allowance_id-err"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">House Rent</label>
                                    <input type="number" onblur="calculateSalary();" style="width:50%;" class="form-control" required name="house_rent" id="house_rent_id">
                                </div>
                                <div class="form-group">
                                    <label for="">Travel Allowance</label>
                                    <input type="number" onblur="calculateSalary();" style="width:50%;" class="form-control" required name="travel_allowance" id="travel_allowance_id">
                                    <span class="travel_allowance"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Basic Salary</label>
                                    <input type="number" onblur="calculateSalary();" style="width:50%;" class="form-control" required name="basic_salary" id="basic_salary_id">
                                    <span class="Email"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Working Days</label>
                                    <input type="number" min="1" max="28" style="width:50%;" class="form-control" required name="working_days" id="working_days_id">
                                    <span class="working_days"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Bonus</label>
                                    <input type="number" name="bonus" class="form-control" style="width: 50%;" required id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Expiry Date</label>
                                    <input type="date" name="expire_date" class="form-control" style="width: 50%;" required id="expire_date_id">
                                </div>
                                <div class="form-group">
                                    <label for="">Provident Fund</label>
                                    <input type="number" min="0" name="provident_fund" placeholder="" class="form-control" style="width: 50%;" required id="provident_fund_id">
                                </div>
                                <div class="form-group">
                                    <label for="">Tax</label>
                                    <input type="number" name="professional_tax" class="form-control" placeholder="" min="0" style="width: 50%;" required id="professional_tax_id">
                                </div>
                                <div class="form-group">
                                    <label for="">Gross Salary</label>
                                    <input type="number" readonly name="total_salary" class="form-control" style="width: 50%;" required id="total_salary_id">
                                </div>
                                <input type="submit" name="Submit" id="" class="btn btn-sm btn-outline-success">
                            </form>
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
    <script>
        function calculateSalary() {
            let med = document.querySelector('#medical_allowance_id').value;
            let house = document.querySelector('#house_rent_id').value;
            let travel = document.querySelector('#travel_allowance_id').value;
            let basic = document.querySelector('#basic_salary_id').value;
            let ttl = document.querySelector('#total_salary_id');
            let sum = 0;
            sum = parseFloat(med) + parseFloat(house) + parseFloat(travel) + parseFloat(basic);
            if (isNaN(sum)) {
                sum = 0;
            }
            ttl.value = sum;
            console.log(sum);
        }
    </script>

    </html>
<?php
} else {
    echo "<script>document.location.href='login.php';</script>";
}
?>