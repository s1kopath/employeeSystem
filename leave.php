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
        if (isset($_POST['update_leave'])) {
            $leave_id = $_POST['leave_id'];
            $is_approve = $_POST['is_approve'];
            if ($is_approve == 1) {
                $is_approve = 0;
            } else {
                $is_approve = 1;
            }
            $query2 = mysqli_query($conn, "UPDATE `employee_leave` SET `is_approve`='$is_approve' WHERE `id`='$leave_id'");
            if ($query2) {
                echo "<script>alert('Data Updated')</script>";
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
                                <h2 class="pageheader-title">Leave Details <span><a href="create_leave.php" class="btn btn-xs btn-outline-success">Add Leave</a></span></h2>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $leave_tbl = mysqli_query($conn, "SELECT employee_leave.*,users.first_name, users.last_name FROM `employee_leave` inner join users on users.id = employee_leave.emp_id");
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
                                                <td>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="leave_id" value="<?= $fetch['id'] ?>">
                                                        <input type="hidden" name='is_approve' value="<?= $fetch['is_approve'] ?>">
                                                        <input type="submit" name="update_leave" class="btn btn-xs btn-outline-<?= $fetch['is_approve'] == 1 ? 'danger' : 'primary' ?>" value="<?= $fetch['is_approve'] == 1 ? 'Cancel' : 'Approve' ?>">
                                                    </form>
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