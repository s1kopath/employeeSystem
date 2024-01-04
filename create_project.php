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
        if (isset($_POST['add_project'])) {
            $employee_id = $_POST['employee_id'];
            $date = $_POST['date'];
            $project_name = $_POST['project_name'];

            $target_dir = "project/";
            $temp = explode(".", $_FILES["project_file"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);

            $target_file = $target_dir . $newfilename;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
            }
            // Check file size
            if ($_FILES["project_file"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
            }
            if (move_uploaded_file($_FILES["project_file"]["tmp_name"], $target_file)) {

                $file = $_FILES["project_file"]["tmp_name"];

                $insert_sql = mysqli_query($conn, "INSERT INTO `project`(`employee_id`, `project_name`, `date`, `project_file`) VALUES ('$employee_id','$project_name','$date','$newfilename')");

                if($insert_sql){
                    echo "<script>alert('Data Stored')</script>";
                    echo "<script>document.location.href='';</script>";
                }
                else{
                    echo "<script>alert('Opps! Data not found')</script>";
                    echo "<script>document.location.href='';</script>";
                }
            }
            else{
                echo "<script>alert('Opps! Data not found')</script>";
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
                                <h2 class="pageheader-title">Add Project Details</h2>
                            </div>
                            <div class="page-body">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <label for="">Select Employee</label>
                                    <select style="width: 230px;" class="form-control" name="employee_id" required id="">
                                        <?php
                                        $employee = mysqli_query($conn, "SELECT * FROM `users` where role !='admin'");
                                        while ($fetch = mysqli_fetch_assoc($employee)) {
                                        ?>
                                            <option value="<?= $fetch['id'] ?>"><?= $fetch['first_name'] . ' ' . $fetch['last_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <label for="">Project Name</label>
                                    <input type="text" name="project_name" class="form-control" style="width: 230px;" required id="">
                                    <label for="">Start Date</label>
                                    <input type="date" name="date" class="form-control" style="width: 230px;" required id="">

                                    <label for=""></label>
                                    <input type="file" name="project_file" class="form-control" style="width: 230px;" required id="">
                                    <input type="submit" name="add_project" id="" value="Add" class="btn btn-xs btn-outline-primary">
                                </form>
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