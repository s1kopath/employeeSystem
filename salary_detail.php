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
        $salary_id = $_GET['sal_id'];
?>
        <style>
            div {
                font-size: 15px;
            }
        </style>

        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Employee Salary Detail</h2>
                            </div>
                            <div class="page-body">
                                <?php
                                $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT users.*,salary.total_salary,salary.bonus,salary.working_days,salary.id as salary_id ,salary.join_date,salary.expire_date,salary.medical_allowance,salary.house_rent,salary.travel_allowance,salary.basic_salary,salary.deduction_rate, salary.provident_fund, salary.professional_tax FROM users LEFT JOIN salary on users.id = salary.employee_id where salary.status='active' and salary.id = $salary_id"));
                                // print_r($user);
                                ?>
                            </div>
                            <div>
                                Employee Name: <?= $user['first_name'] . ' ' . $user['last_name'] ?>
                            </div>
                            <div>
                                Designation: <?= $user['role'] ?>
                            </div>
                            <div>
                                Contact: <?= $user['phone_number'] ?>
                            </div>
                            <div>
                                Address: <?= $user['address'] ?>
                            </div>
                            <div>
                                Email: <?= $user['email'] ?>
                            </div>
                            <div>
                                Joining Date: <?= $user['join_date'] ?>
                            </div>
                            <hr>
                            <br>
                            <br>
                            <table id="myTable">
                                <thead>
                                    <tr>
                                        <th>Medical Allowance</th>
                                        <th>House Rent</th>
                                        <th>Travel Allowance</th>
                                        <th>Basic Salary</th>
                                        <th>Working Days</th>
                                        <th>Gross Salary</th>
                                        <th>Bonus</th>
                                        <th>Provident Fund</th>
                                        <th>Tax</th>
                                        <th>Net Salary</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $user['medical_allowance'] ?> tk/-</td>
                                        <td><?= $user['house_rent'] ?> tk/-</td>
                                        <td><?= $user['travel_allowance'] ?> tk/-</td>
                                        <td><?= $user['basic_salary'] ?> tk/-</td>
                                        <td><?= $user['working_days'] ?> days</td>
                                        <td><?= $user['total_salary'] ?> tk/-</td>
                                        <td><?= $user['bonus'] ?> tk/-</td>
                                        <td><?= $user['provident_fund'] ?> tk/-</td>
                                        <td><?= $user['professional_tax'] ?> tk/-</td>
                                        <td><?= $user['total_salary'] - $user['provident_fund'] - $user['professional_tax'] ?> tk/-</td>
                                    </tr>
                                </tbody>
                            </table>
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
                                <h1 class="text-center">You Have no authorization to this page.</h1>
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