<?php ob_start(); ?>

<?php include "header_patient.php"; ?>

<div id="wrapper">

  <?php include "navigation_patient.php" ?>


  <div id="page-wrapper">

    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12">


          <?php
          // Check if user is logged in
          if (isset($_SESSION['username'])) {

            $username = $_SESSION['username'];

            // Retrieve user ID
            $query = "SELECT user_id FROM users WHERE username = '$username'";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) === 1) {
              $row = mysqli_fetch_assoc($result);
              $user_id = $row['user_id'];

              // Check if emergency contact already exists
              $check_existing_contact_query = "SELECT * FROM emergency_contact WHERE user_id = '$user_id'";
              $existing_contact_result = mysqli_query($connection, $check_existing_contact_query);

              // Handle form submission
              if (isset($_POST['save_emergency_contact'])) {
                $contact_firstname = mysqli_real_escape_string($connection, $_POST['contact_firstname']);
                $contact_lastname = mysqli_real_escape_string($connection, $_POST['contact_lastname']);
                $contact_phone = mysqli_real_escape_string($connection, $_POST['contact_phone']);
                $contact_email = mysqli_real_escape_string($connection, $_POST['contact_email']);
                $contact_relation = mysqli_real_escape_string($connection, $_POST['contact_relation']);

                if (mysqli_num_rows($existing_contact_result) > 0) {
                  // Update existing contact details
                  $update_query = "UPDATE emergency_contact 
                                    SET contact_firstname = '$contact_firstname', 
                                        contact_lastname = '$contact_lastname', 
                                        contact_phone = '$contact_phone',
                                        contact_email = '$contact_email',
                                        contact_relation = '$contact_relation'
                                    WHERE user_id = '$user_id'";
                  $update_result = mysqli_query($connection, $update_query);
                  if ($update_result) {
                    $message = "<strong class='text-success'>Emergency contact details updated successfully!</strong>";
                  } else {
                    $message = "<strong class='text-danger'>Failed to update emergency contact details! Please try again.</strong>";
                  }
                } else {
                  // Insert new emergency contact
                  $query = "INSERT INTO emergency_contact (user_id, contact_firstname, contact_lastname, contact_phone, contact_email, contact_relation) ";
                  $query .= "VALUES ('{$user_id}', '{$contact_firstname}', '{$contact_lastname}', '{$contact_phone}',  '{$contact_email}', '{$contact_relation}')";

                  $contact_query = mysqli_query($connection, $query);
                  if (!$contact_query) {
                    die("QUERY FAILED" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
                  } else {
                    $message = "<strong class='text-success'>Emergency contact details saved successfully!</strong>";
                  }
                }
              } else {
                $message = "";
              }
            } else {
              $message = "<strong class='text-danger'>Oops! An error occurred while retrieving user information.</strong>";
            }

            // Free the result sets
            mysqli_free_result($result);
            if (isset($existing_contact_result)) {
              mysqli_free_result($existing_contact_result);
            }
          } else {
            $message = "";
          }

          

          ?>

                    <h2>Emergency Contact Information</h2>

                    <form method="post" enctype="multipart/form-data">
                        <h6 class="text-center"><?php echo $message; ?></h6>
                        <div class="form-group">
                            <label for="contact_firstname">First Name:</label>
                            <input type="text" class="form-control" value="<?php echo $contact_firstname; ?>" name="contact_firstname" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_lastname">Last Name:</label>
                            <input type="text" class="form-control" value="<?php echo $contact_lastname; ?>" name="contact_lastname" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_phone">Phone Number:</label>
                            <input type="text" class="form-control" value="<?php echo $contact_phone; ?>" name="contact_phone" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_email">Email Address:</label>
                            <input type="email" class="form-control" value="<?php echo $contact_email; ?>" name="contact_email" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_relation">Relationship:</label>
                            <input type="text" class="form-control" value="<?php echo $contact_relation; ?>" name="contact_relation" required>
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name="save_emergency_contact" value="Save Emergency Contact">
                        </div>
                    </form>

                    <?php
                    // } else {
                    //     echo "<p class='text-warning'>Oops! An error occurred while retrieving user information.</p>";
                    // }

                    // mysqli_free_result
                    ?>




                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->
    <?php include "footer_patient.php" ?>