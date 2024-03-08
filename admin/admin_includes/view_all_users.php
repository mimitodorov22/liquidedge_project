<?php ob_start(); ?>

<form class="form-inline" method="post">
    <table class="table table-bordered table-hover">

        <div class="col-xs-4 form-group mb-4">
            <label class="pr-4" for=""><strong>View User Roles:</strong></label>
            <select class="form-control mr-2" name="user_role" id="user_role">
                <option value="all">All Users</option>
                <option value="admin">Admins</option>
                <option value="doctor">Doctors</option>
                <option value="patient">Patients</option>
            </select>
            <input type="submit" name="filter" class="btn btn-primary" value="Filter">

            <!-- <?php include "search_users.php"; ?> </div> -->
        </div>

        <thead>
            <tr>
                <th>Id</th>
                <th>Id Number</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>D.O.B</th>
                <th>Blood Type</th>
                <th>Disability</th>
                <th>Role</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php

            // Filter based on user role

            $user_role = isset($_POST['user_role']) ? $_POST['user_role'] : 'all';

            if ($user_role === 'all') {
                $query = "SELECT * FROM users";
            } else {
                $query = "SELECT * FROM users WHERE user_role = '$user_role'";
            }

            $select_users = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_users)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                $user_password = $row['user_password'];
                $user_firstname = $row['user_firstname'];
                $user_lastname = $row['user_lastname'];
                $user_email = $row['user_email'];
                $user_phone = $row['user_phone'];
                $user_birthdate = $row['user_birthdate'];
                $user_bloodtype = $row['user_bloodtype'];
                $user_disability = $row['user_disability'];
                $user_image = $row['user_image'];
                $user_role = $row['user_role'];

                echo "<tr>";
            ?>

            <?php
                echo "<tr>";
                echo "<td>$user_id</td>";
                echo "<td>$username</td>";
                echo "<td>$user_firstname</td>";
                echo "<td>$user_lastname</td>";
                echo "<td>$user_email</td>";
                echo "<td>0$user_phone</td>";
                echo "<td>$user_birthdate</td>";
                echo "<td>$user_bloodtype</td>";
                echo "<td>$user_disability</td>";
                echo "<td>$user_role</td>";

                echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete');\" href='users.php?delete={$user_id}'>Delete</a></td>";
            echo "</tr>";
            }


            ?>
        </tbody>
    </table>
</form>


<?php

if (isset($_GET['delete'])) {

    $the_user_id = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
    $delete_query = mysqli_query($connection, $query);

    // deletes instantly and refreshes the page automatically
    header("Location: users.php");
}


?>