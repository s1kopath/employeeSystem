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
                            <h2 class="pageheader-title">My Leave Details</h2>
                        </div>
                        <div class="card card-body">
                            <table id="myTable">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Name</th>
                                        <th>Leave Reason</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Approve Info</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $leave_tbl = mysqli_query($conn, "SELECT employee_leave.*,users.first_name, users.last_name FROM `employee_leave` inner join users on users.id = employee_leave.emp_id where employee_leave.emp_id = $user_id");
                                    $sl = 1;
                                    while ($fetch = mysqli_fetch_assoc($leave_tbl)) {
                                        $full_name = $fetch['first_name'] . ' ' . $fetch['last_name'];
                                    ?>
                                        <tr>
                                            <td><?= $sl ?></td>
                                            <td><?= $full_name ?></td>
                                            <td><?= $fetch['reason'] ?></td>
                                            <td><?= $fetch['start_date'] ?></td>
                                            <td><?= $fetch['end_date'] ?></td>
                                            <td><?= $fetch['is_approve'] == 1 ? 'Approved' : 'Pending' ?></td>
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