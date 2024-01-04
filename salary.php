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
                                <h1 class="pageheader-title">Employee Salary
                                    <span>
                                        <a href="create_salary.php" class="btn btn-xs btn-outline-success">Add New</a>
                                    </span>
                                </h1>
                            </div>
                            <div class="container">
                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Gross Salary</th>
                                            <th>Festival Bonus</th>
                                            <th>Working Days</th>
                                            <th>Joining Date</th>
                                            <th>Expire Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $all_users = mysqli_query($conn, "SELECT users.*,salary.total_salary,salary.bonus,salary.working_days,salary.id as salary_id ,salary.join_date,salary.expire_date FROM users LEFT JOIN salary on users.id = salary.employee_id where salary.status='active'");
                                        $sl = 0;
                                        while ($fetch = mysqli_fetch_assoc($all_users)) {
                                            $sl++;
                                            $full_name = $fetch['first_name'] . ' ' . $fetch['last_name'];
                                            $total_salary = $fetch['total_salary'];
                                            $id = $fetch['salary_id'];
                                            $emp_id = $fetch['id'];
                                            $bonus = $fetch['bonus'];
                                            $email = $fetch['email'];
                                            $working_days = $fetch['working_days'];
                                            $address = $fetch['address'];
                                            $expire_date = date("d-m-Y", strtotime($fetch['expire_date']));
                                            $join_date = date("d-m-Y", strtotime($fetch['join_date']));
                                        ?>
                                            <tr>
                                                <td><?= $sl ?></td>
                                                <td><?= $full_name ?></td>
                                                <td><?= $email ?></td>
                                                <td><?= $total_salary ?> tk/-</td>
                                                <td><?= $bonus ?> tk/-</td>
                                                <td><?= $working_days ?></td>
                                                <td><?= $join_date ?></td>
                                                <td><?= $expire_date ?></td>
                                                <td><a href="salary_detail.php?sal_id=<?= $id ?>&&id=<?= $emp_id ?>" class="btn btn-xs btn-outline-info">Details</a></td>
                                            </tr>
                                        <?php } ?>
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