<?php ob_start(); ?>

<?php include "admin_includes/header_admin.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "admin_includes/navigation_admin.php" ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">


                    <?php

                    if (isset($_SESSION['username'])) {

                        $username = $_SESSION['username'];

                        $query = "SELECT * FROM users WHERE username = '{$username}' ";
                        $select_user_profile = mysqli_query($connection, $query);

                        while ($row = mysqli_fetch_array($select_user_profile)) {

                            $user_id = $row['user_id'];
                            $username = $row['username'];
                            $user_email = $row['user_email'];
                            $user_password = $row['user_password'];
                            $user_firstname = $row['user_firstname'];
                            $user_lastname = $row['user_lastname'];
                            $user_phone = $row['user_phone'];
                            $user_birthdate = $row['user_birthdate'];
                            $user_bloodtype = $row['user_bloodtype'];
                            $user_disability = $row['user_disability'];
                            $user_image = $row['user_image'];
                            $user_role = $row['user_role'];
                        }
                    }

                    ?>


                    <?php

                    if (isset($_POST['edit_user'])) {

                        $user_firstname = $_POST['user_firstname'];
                        $user_lastname = $_POST['user_lastname'];
                        $username = $_POST['username'];
                        $user_role = $_POST['user_role'];
                        $user_email = $_POST['user_email'];
                        $user_phone = $_POST['user_phone'];
                        $user_birthdate = $_POST['user_birthdate'];
                        $user_bloodtype = $_POST['user_bloodtype'];
                        $user_disability = $_POST['user_disability'];
                        $user_password = $_POST['user_password'];

                        $query = "SELECT randSalt FROM users";
                        $select_randSalt_query = mysqli_query($connection, $query);

                        if (!$select_randSalt_query) {

                            die("QUERY FAILED" . mysqli_error($connection));
                        }

                        $row = mysqli_fetch_array($select_randSalt_query);
                        $salt = $row['randSalt'];
                        $hashed_password = crypt($user_password, $salt);


                        // Update profile information
                        $query = "UPDATE users SET ";
                        $query .= "user_firstname = '{$user_firstname}', ";
                        $query .= "user_lastname = '{$user_lastname}', ";
                        $query .= "username = '{$username}', ";
                        $query .= "user_role = '{$user_role}', ";
                        $query .= "user_email = '{$user_email}', ";
                        $query .= "user_phone = '{$user_phone}', ";
                        $query .= "user_birthdate = '{$user_birthdate}', ";
                        $query .= "user_bloodtype = '{$user_bloodtype}', ";
                        $query .= "user_disability = '{$user_disability}', ";
                        $query .= "user_password = '{$hashed_password}' ";
                        $query .= "WHERE username = '{$username}' ";


                        $edit_user_query = mysqli_query($connection, $query);
                        confirmQuery($edit_user_query);
                        echo "<p class='text-success'>Yor profile has been updated!</p>";
                    }

                    ?>

                    <h2 class="pb-3">Edit your profile</h2>


                    <form method="post" enctype="multipart/form-data">


                        <div class="form-group">
                            <label for="title">Firstname</label>
                            <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
                        </div>

                        <div class="form-group">
                            <label for="post_status">Lastname</label>
                            <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
                        </div>

                        <div class="form-group">
                            <label for="post_tags">ID Number</label>
                            <input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
                        </div>



                        <div class="form-group">
                            <label for="post_tags">User Role</label>

                            <select name="user_role" id="" class="form-control">
                                <?php
                                // Define the available user roles (replace with your logic)
                                $user_roles = ['patient', 'doctor', 'admin'];

                                // Pre-select the saved user role
                                $selected_role = $user_role;

                                // Loop through all available user roles
                                foreach ($user_roles as $role) {
                                    $selected = ($role === $selected_role) ? ' selected' : '';
                                    echo "<option value='$role'$selected>$role</option>";
                                }
                                ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="post_tags">Email</label>
                            <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
                        </div>


                        <div class="form-group">
                            <label for="post_number">Phone Number</label>
                            <input type="text" value="0<?php echo $user_phone; ?>" class="form-control" name="user_phone">
                        </div>


                        <div class="form-group">
                            <label for="post_tags">Birth Date</label>
                            <input type="date" value="<?php echo $user_birthdate; ?>" class="form-control" name="user_birthdate">
                        </div>



                        <div class="form-group">
                            <label for="post_tags">Blood Type</label>

                            <select name="user_bloodtype" id="" class="form-control">
                                <?php
                                // Define the available user roles (replace with your logic)
                                $user_bloodtypes = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];

                                // Pre-select the saved user role
                                $selected_bloodtype = $user_bloodtype;

                                // Loop through all available user roles
                                foreach ($user_bloodtypes as $bloodtype) {
                                    $selected = ($bloodtype === $selected_bloodtype) ? ' selected' : '';
                                    echo "<option value='$bloodtype'$selected>$bloodtype</option>";
                                }
                                ?>
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="post_tags">Disability</label>

                            <select name="user_disability" id="" class="form-control">

                                <option value="<?php echo $user_disability; ?>"><?php echo $user_disability; ?></option>

                                <?php

                                if ($user_disability == 'No') {

                                    echo "<option value='Yes'>Yes</option>";
                                } else {

                                    echo "<option value='No'>No</option>";
                                }

                                ?>
                            </select>
                        </div>






                        <div class="form-group">
                            <label for="post_tags">Password</label>
                            <input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
                        </div>



                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
                        </div>

                    </form>




                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "admin_includes/footer_admin.php" ?>