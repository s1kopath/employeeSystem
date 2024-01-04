<?php
session_start();
if (isset($_SESSION['access'])) {
    $user_id = $_SESSION['id'];
    $user_name = $_SESSION['name'];
    $user_level = $_SESSION['level'];
    include 'partials/connection.php';
    include 'partials/header.php';
    include 'partials/sidebar.php';
    if (isset($_POST['Submit'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone_number = $_POST['phone_number'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $address = $_POST['address'];
        $created_at = date("Y-m-d H:i:S");
        $query = mysqli_query($conn, "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`phone_number`='$phone_number',`username`='$username',`email`='$email',`password`='$password',`address`='$address' WHERE `id`='$user_id'");
        if ($query) {
            echo "<script>alert('Data Updated !')</script>";
            echo "<script>document.location.href='';</script>";
        }
        else{
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
                            <h2 class="pageheader-title">Edit User Data</h2>
                        </div>
                        <form action="" method="post">
                            <?php 
                            $user = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `users` where id='$user_id'"));
                            ?>
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" value="<?= $user['first_name'] ?>" style="width:50%;" class="form-control" required name="first_name" id="first_name_id">
                                <span class="First-name text-danger"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" value="<?= $user['last_name'] ?>" style="width:50%;" class="form-control" required name="last_name" id="last_name_id">
                                <span class="Last-name"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Contact Number</label>
                                <input type="text" value="<?= $user['phone_number'] ?>" style="width:50%;" class="form-control" required name="phone_number" id="phone_number_id">
                                <span class="Phone-number"></span>
                            </div>
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" value="<?= $user['username'] ?>" style="width:50%;" class="form-control" required name="username" id="username_id">
                                <span class="Username"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" value="<?= $user['email'] ?>" style="width:50%;" class="form-control" required name="email" id="email_id">
                                <span class="Email"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" style="width:50%;" class="form-control" required minlength="4" name="password" id="password_id">
                                <span class="Password"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control" required id="address_id" style="width:50%;" cols="30" rows="5"><?= $user['address'] ?></textarea>
                                <span class="Address"></span>
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
    ?>
    </body>

    </html>
<?php
} else {
    echo "<script>document.location.href='login.php';</script>";
}
?>