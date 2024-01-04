<?php
session_start();
if (isset($_SESSION['access'])) {
    $user_id = $_SESSION['id'];
    $user_name = $_SESSION['name'];
    $user_level = $_SESSION['level'];
    include 'partials/connection.php';
    include 'partials/header.php';
    include 'partials/sidebar.php';
?>

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Employee Management System</h2>
                            <br>
                            <br>
                            <?php if ($user_level == 'admin' || $user_level == 'manager') { ?>
                                <div class="row col-md-12">
                                    <?php 
                                        $total_users = mysqli_fetch_assoc(mysqli_query($conn,"SELECT count(id) as ids FROM `users`"));

                                        $total_leave_taken = mysqli_fetch_assoc(mysqli_query($conn,"SELECT sum(leave_days) as taken FROM `employee_leave` where is_approve =1"));

                                        $paidSalary = mysqli_fetch_assoc(mysqli_query($conn,"SELECT sum(total_salary) as ttl_sal FROM `attendence`"));
                                    ?>
                                    <div class="card col-md-4">
                                        
                                        <div class="card-body text-primary">
                                            Total Users : <?= $total_users['ids'] ?>
                                        </div>
                                    </div>
                                    <div class="card col-md-4">
                                        
                                        <div class="card-body text-success">
                                           Total Leave Taken : <?= $total_leave_taken['taken'] ?> days
                                        </div>
                                    </div>
                                    <div class="card col-md-4">
                                        <div class="card-body text-danger">
                                            Total Salary Paid : <?= $paidSalary['ttl_sal'] ?> tk/-
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php
    include 'partials/footer.php';?>
    </body>

</html>
<?php
} else {
    echo "<script>document.location.href='login.php';</script>";
}
?>