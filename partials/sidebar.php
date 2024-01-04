<body>
    <div class="dashboard-main-wrapper">
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="dashboard.php">
                    <?php
                    // if ($user_level == 'employee') {
                    //     echo "Employee D.board";
                    // } elseif ($user_level == 'manager') {
                    //     echo "Manager D.board";
                    // } else {
                    //     echo "Admin D.board";
                    // }
                    ?>
                    Techneo360
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"> <?= $user_name ?></h5>
                                </div>
                                <a class="dropdown-item" href="account.php"><i class="fas fa-user mr-2"></i>Account</a>

                                <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <?php if ($user_level == 'admin' || $user_level == 'manager') { ?>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>User Setup<span class="badge badge-success">6</span></a>
                                    <div id="submenu-1" class="collapse submenu">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="user_list.php">Create New User</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="employee.php">Employee List</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="manager.php">Manager List</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="attendence.php" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Attendence</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="leave.php" aria-controls="submenu-6"><i class="fab fa-fw fa-wpforms"></i>Leave Management</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="salary.php" aria-controls="submenu-5"><i class="fab fa-fw fa-wpforms"></i>Salary</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="due_salary.php" aria-controls="submenu-6"><i class="fab fa-fw fa-wpforms"></i>Due Salary</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="paid_salary.php" aria-controls="submenu-7"><i class="fab fa-fw fa-wpforms"></i>Paid Salary</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="project.php" aria-controls="submenu-8"><i class="fab fa-fw fa-wpforms"></i>Project</a>
                                </li>
                            <?php
                            }
                            ?>
                            <li class="nav-item ">
                                <a class="nav-link" href="my_attendence.php" aria-controls="submenu-9"><i class="fab fa-fw fa-wpforms"></i>My Attendance</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="my_salary.php" aria-controls="submenu-10"><i class="fab fa-fw fa-wpforms"></i>My Salary</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="my_leave.php" aria-controls="submenu-11"><i class="fab fa-fw fa-wpforms"></i>My Leave</a>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="my_project.php" aria-controls="submenu-12"><i class="fab fa-fw fa-wpforms"></i>My Project</a>
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>