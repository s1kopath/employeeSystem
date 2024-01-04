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
                                <h1 class="pageheader-title">Employee List
                                    <span>
                                        <a href="create_user.php" class="btn btn-xs btn-outline-success">Add New</a>
                                    </span>
                                </h1>
                            </div>
                            <div class="container">
                                <table id="myTable">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Name</th>
                                            <th>Contact Number</th>
                                            <th>User Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Address</th>
                                            <th>Account Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $all_users = mysqli_query($conn, "SELECT * from users where role='employee'");
                                        $sl = 0;
                                        while ($fetch = mysqli_fetch_assoc($all_users)) {
                                            $sl++;
                                            $full_name = $fetch['first_name'] . ' ' . $fetch['last_name'];
                                            $contact = $fetch['phone_number'];
                                            $id = $fetch['id'];
                                            $username = $fetch['username'];
                                            $email = $fetch['email'];
                                            $role = $fetch['role'];
                                            $address = $fetch['address'];
                                            $created_at = date("d-m-Y H:i:s", strtotime($fetch['created_at']));
                                        ?>
                                            <tr>
                                                <td><?= $sl ?></td>
                                                <td><?= $full_name ?></td>
                                                <td><?= $contact ?></td>
                                                <td><?= $username ?></td>
                                                <td><?= $email ?></td>
                                                <td><?= $role ?></td>
                                                <td><?= $address ?></td>
                                                <td><?= $created_at ?></td>
                                                <td><a href="edit_user.php?id=<?= $id ?>" class="btn btn-xs btn-outline-info">Edit</a></td>
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