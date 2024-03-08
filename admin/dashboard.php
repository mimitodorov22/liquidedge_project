<?php include "admin_includes/header_admin.php"; ?>

<?php include "admin_includes/navigation_admin.php"; ?>

<?php

$query = "SELECT * FROM users";
$select_all_users = mysqli_query($connection, $query);
$user_count = mysqli_num_rows($select_all_users);

$query = "SELECT * FROM users WHERE user_role = 'admin'";
$select_all_admins = mysqli_query($connection, $query);
$admin_count = mysqli_num_rows($select_all_admins);

$query = "SELECT * FROM users WHERE user_role = 'patient'";
$select_all_patients = mysqli_query($connection, $query);
$patient_count = mysqli_num_rows($select_all_patients);

$query = "SELECT * FROM users WHERE user_role = 'doctor'";
$select_all_doctors = mysqli_query($connection, $query);
$doctor_count = mysqli_num_rows($select_all_doctors);



?>



<h1 class="h2">Dashboard</h1>

<div class="row my-4">
    <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
        <div class="card">
            <h5 class="card-header">Total Users</h5>
            <div class="card-body">
                <h5 class="card-title"><?php echo $user_count ?></h5>
                <a href="users.php"> 
                        <span class="pull-left">View All Users</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
        <div class="card">
            <h5 class="card-header">Admins</h5>
            <div class="card-body">
                <h5 class="card-title"><?php echo $admin_count ?></h5>
                <a href="users.php">
                        <span class="pull-left">View Admins</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
        <div class="card">
            <h5 class="card-header">Doctors</h5>
            <div class="card-body">
                <h5 class="card-title"><?php echo $doctor_count ?></h5>
                <a href="users.php">
                        <span class="pull-left">View Doctors</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
        <div class="card">
            <h5 class="card-header">Patients</h5>
            <div class="card-body">
                <h5 class="card-title"><?php echo $patient_count ?></h5>
                <a href="users.php">
                        <span class="pull-left">View Patients</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>



<!-- <div class="row">
    <div class="col-12 col-xl-12 mb-4 mb-lg-0">
        <div class="card">
            <h5 class="card-header">Latest transactions</h5>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Order</th>
                                <th scope="col">Product</th>
                                <th scope="col">Customer</th>
                                <th scope="col">Total</th>
                                <th scope="col">Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">17371705</th>
                                <td>Volt Premium Bootstrap 5 Dashboard</td>
                                <td>johndoe@gmail.com</td>
                                <td>€61.11</td>
                                <td>Aug 31 2020</td>
                                <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                            </tr>
                            <tr>
                                <th scope="row">17370540</th>
                                <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                <td>jacob.monroe@company.com</td>
                                <td>$153.11</td>
                                <td>Aug 28 2020</td>
                                <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                            </tr>
                            <tr>
                                <th scope="row">17371705</th>
                                <td>Volt Premium Bootstrap 5 Dashboard</td>
                                <td>johndoe@gmail.com</td>
                                <td>€61.11</td>
                                <td>Aug 31 2020</td>
                                <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                            </tr>
                            <tr>
                                <th scope="row">17370540</th>
                                <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                <td>jacob.monroe@company.com</td>
                                <td>$153.11</td>
                                <td>Aug 28 2020</td>
                                <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                            </tr>
                            <tr>
                                <th scope="row">17371705</th>
                                <td>Volt Premium Bootstrap 5 Dashboard</td>
                                <td>johndoe@gmail.com</td>
                                <td>€61.11</td>
                                <td>Aug 31 2020</td>
                                <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                            </tr>
                            <tr>
                                <th scope="row">17370540</th>
                                <td>Pixel Pro Premium Bootstrap UI Kit</td>
                                <td>jacob.monroe@company.com</td>
                                <td>$153.11</td>
                                <td>Aug 28 2020</td>
                                <td><a href="#" class="btn btn-sm btn-primary">View</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="#" class="btn btn-block btn-light">View all</a>
            </div>
        </div>
    </div> -->
    
</div>

<?php include "admin_includes/footer_admin.php" ?>