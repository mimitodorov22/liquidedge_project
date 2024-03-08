<?php

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


        $query = "INSERT INTO users (user_firstname, user_lastname, user_birthdate, user_phone, username, 
        user_email, user_bloodtype, user_disability, user_password, user_role) ";
        $query .= "VALUES('{$firstname}','{$lastname}','{$birthdate}','{$phone}','{$username}', 
        '{$email}', '{$bloodtype}','{$disability}', '{$password}', 'patient' )";
        
        $register_user_query = mysqli_query($connection, $query);
        if (!$register_user_query) {
            die("QUERY FAILED" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
        }

        $message = "<strong class='text-success'>User has been created!</strong><a class='btn btn-primary float-right' href='./users.php'>View All Users &rarr;</a>";
    } else {

        $message = "<strong class='text-danger'>Fields cannot be empty! Try Again.</strong>";
    }
} else {

    $message = "";
}

?>


<h2>Add new user</h2>
<form action="" method="post" enctype="multipart/form-data" class="pt-2">

<!-- Call the message to display here -->
<p class="text-info"><?php echo $message; ?></p>

<div class="form-group">
    <label for="firstname" class=""><strong>Name</strong></label>
    <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First Name">
</div>

<div class="form-group">
    <label for="lastname" class="sr-only">Lastname</label>
    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name">
</div>

<div class="form-group">
    <label for="birthdate" class=""><strong>Birth Date</strong></label>
    <input type="date" name="birthdate" id="birthdate" class="form-control" placeholder="">
</div>

<div class="form-group">
    <label for="phone" class=""><strong>Phone</strong></label>
    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone number">
</div>

<div class="form-group">
    <label for="username" class=""><strong>ID</strong></label>
    <input type="text" name="username" id="username" class="form-control" placeholder="Identity number">
</div>

<div class="form-group">
    <label for="email" class=""><strong>Email</strong></label>
    <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
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
    <input type="password" name="password" id="key" class="form-control" placeholder="Password">
</div>

<input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-custom btn-lg btn-block" value="Add User">
</form>