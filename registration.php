<!-- Database connection -->
<?php include "./includes/db.php"; ?>

<!-- Header -->
<?php include "./includes/header.php"; ?>

<!-- Navigation -->
<?php include "./includes/navigation.php"; ?>


<!-- save user (register) details in database -->
<?php
$password_error = "";

if (isset($_POST['submit'])) {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $bloodtype = $_POST['bloodtype'];
    $disability = $_POST['disability'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    //password confirmation check
    if($password != $cpassword) {

        $password_error = "<strong class='text-danger'>Password Conformation Error! Reconfirm Password</strong>";

    } else {

        $password_error = "";

    }


    //cannot leave fields empty
    if (!empty($username) && !empty($email) && !empty($password)) {

        $firstname = mysqli_real_escape_string($connection, $firstname);
        $lastname = mysqli_real_escape_string($connection, $lastname);
        $birthdate = mysqli_real_escape_string($connection, $birthdate);
        $phone = mysqli_real_escape_string($connection, $phone);
        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $bloodtype = mysqli_real_escape_string($connection, $bloodtype);
        $disability = mysqli_real_escape_string($connection, $disability);
        $password = mysqli_real_escape_string($connection, $password);

        $query = "SELECT randSalt FROM users";
        $select_randSalt_query = mysqli_query($connection, $query);

        if (!$select_randSalt_query) {
            die("QUERY FAILED!" . mysqli_error($connection));
        }

        $row = mysqli_fetch_assoc($select_randSalt_query);

        $salt = $row['randSalt'];

        //encrypt password
        $password = crypt($password, $salt);




        $query = "SELECT COUNT(*) FROM users WHERE username = '{$username}'";
        $check_username_query = mysqli_query($connection, $query);
        $result = mysqli_fetch_array($check_username_query);
        
        if ($result[0] > 0) {
            // Username already exists
            $message = "<strong class='text-danger'>User already taken. Please choose a different one.</strong>";
        } else {
            // Continue with registration process as you already have


        $query = "INSERT INTO users (user_firstname, user_lastname, user_birthdate, user_phone, username, 
        user_email, user_bloodtype, user_disability, user_password, user_role) ";
        $query .= "VALUES('{$firstname}','{$lastname}','{$birthdate}','{$phone}','{$username}', 
        '{$email}', '{$bloodtype}','{$disability}', '{$password}', 'patient' )";
        
        $register_user_query = mysqli_query($connection, $query);
        if (!$register_user_query) {
            die("QUERY FAILED" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
        }}

        $message = "<strong class='text-success'>Your registration has been submitted</strong>";
    } else {

        $message = "<strong class='text-danger'>Fields cannot be empty! Try Again.</strong>";
    }
} else {

    $message = "";
}
        


?>

<!-- Page content -->
<div class="container">
    <section id="login">
        <div class="container py-5">
            <div class="row">
                <div class="m-auto w-50">
                    <div class="form-wrap">
                        <h2 class="text-center mb-4">Register</h2>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">

                            <!-- Call the message to display here -->
                            <p class="text-center text-info"><?php echo $message; ?></p>

                            <div class="form-group">
                                <label for="firstname" class=""><strong>Name</strong></label>
                                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name" required>
                            </div>

                            <div class="form-group">
                                <label for="lastname" class="sr-only">Lastname</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" required>
                            </div>

                            <div class="form-group">
                                <label for="birthdate" class=""><strong>Birth Date</strong></label>
                                <input type="date" name="birthdate" id="birthdate" class="form-control" placeholder="" required>
                            </div>

                            <div class="form-group">
                                <label for="phone" class=""><strong>Phone</strong></label>
                                <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone number" required>
                            </div>

                            <div class="form-group">
                                <label for="username" class=""><strong>ID</strong></label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Identity number" required>
                            </div>

                            <div class="form-group">
                                <label for="email" class=""><strong>Email</strong></label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com" required>
                            </div>

                            <div class="form-group">
                                <label for="bloodtype" class=""><strong>Blood Type</strong></label>
                                <select name="bloodtype" id="" class="form-control">
                                    <option selected="true" disabled="disabled" >select</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="disability" class=""><strong>Do you have any disabilities?</strong></label>
                                <select name="disability" id="" class="form-control">
                                    <option selected="true" disabled="disabled" >select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="password" class=""><strong>Password</strong></label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password" required>
                            </div>

                            <p class="text-center text-info"><?php echo $password_error; ?></p>
                            <div class="form-group">
                                <label for="cpassword" class="sr-only"><strong>Confirm Password</strong></label>
                                <input type="password" name="cpassword" class="form-control" placeholder="Confirm password" required>
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-custom btn-lg btn-block" value="Register">
                        </form>
                    </div>
                </div>
            </div>
            <h6 class="text-center text-muted pt-4">Already have an account? <a href="login.php">Sign in &rarr;</a></h6>
        </div>
    </section>


    <?php include "./includes/footer.php"; ?>