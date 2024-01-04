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
                            <h2 class="pageheader-title">My Project</h2>
                        </div>
                        <div class="page-body">
                            <table id="myTable">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Employee Name</th>
                                        <th>Project Name</th>
                                        <th>Remarks Name</th>
                                        <th>File</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $project = mysqli_query($conn, "SELECT project.*,users.first_name,users.last_name  FROM `project` INNER JOIN users on users.id = project.employee_id where project.employee_id = $user_id ");
                                    $sl = 1;
                                    while ($fetch = mysqli_fetch_assoc($project)) {

                                    ?>
                                        <tr>
                                            <td><?= $sl ?></td>
                                            <td><?= $fetch['first_name'] . " " . $fetch['last_name'] ?></td>
                                            <td><?= $fetch['project_name'] ?></td>
                                            <td><?= $fetch['remarks'] == null ? '' : $fetch['remarks'] ?></td>
                                            <td><a href="project/<?= $fetch['project_file'] ?>" download="" class="btn btn-sm btn-outline-success">Download</a></td>
                                            <td><a href="project_response.php?id=<?= $fetch['id'] ?>" class="btn btn-xs btn-outline-primary">Response</a></td>
                                        </tr>
                                    <?php $sl++;
                                    }
                                    ?>
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