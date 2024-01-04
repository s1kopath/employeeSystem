<?php
session_start();
if (isset($_SESSION['access'])) {
    $user_id = $_SESSION['id'];
    $user_name = $_SESSION['name'];
    $user_level = $_SESSION['level'];
    include 'partials/connection.php';
    include 'partials/header.php';
    include 'partials/sidebar.php';
    $project_id =  $_GET['id'];
    if (isset($_POST['update_project'])) {
        $remarks = $_POST['remarks'];
        $query = mysqli_query($conn, "UPDATE `project` SET `remarks`='$remarks' WHERE `id`='$project_id'");
        if ($query) {
            echo "<script>alert('Data Stored')</script>";
            echo "<script>document.location.href='my_project.php';</script>";
        } else {
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
                        <?php
                        $project = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `project` where id = $project_id"));
                        ?>
                        <div class="page-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="">Project Name</label>
                                <input type="text" value="<?= $project['project_name'] ?>" readonly name="project_name" class="form-control" style="width: 230px;" required id="">
                                <label for="">Start Date</label>
                                <input type="date" value="<?= $project['date'] ?>" name="date" class="form-control" readonly style="width: 230px;" required id="">

                                <label for="">Remarks</label>
                                <textarea required name="remarks" id="" class="form-control" style="width: 230px;" cols="30" rows="5"><?= $project['remarks'] ?></textarea>
                                <input type="submit" name="update_project" id="" value="Update" class="btn btn-xs btn-outline-primary">
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
    ?>
    </body>

    </html>
<?php
} else {
    echo "<script>document.location.href='login.php';</script>";
}
?>