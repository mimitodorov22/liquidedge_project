<!-- Database connection -->
<?php include "./includes/db.php"; ?>

<!-- This function is used to start a new session or, resume an existing one -->
<?php session_start(); ?>

<!-- Header -->
<?php include "./includes/header.php"; ?>

<!-- Navigation -->
<?php include "./includes/navigation.php"; ?>


<?php
$error = "";
?>


<!-- Page content -->
<!-- Login -->
<div class="container">
    <section>
        <div class="container py-5">
            <h2 class="text-center mb-4">Sign in to LifeHub</h2>
            <div class="row">
                <div class="m-auto w-50">
                    <div class="form-wrap">
                        <form role="form" action="includes/sign_in.php" method="post" autocomplete="off">


                        <p class="text-center text-info"><?php echo $error; ?></p>

                            <div class="form-group">
                                <input name="username" type="text" class="form-control" placeholder="Enter ID Number">
                            </div>

                            <div class="form-group">
                                <input name="password" type="password" class="form-control" placeholder="Enter password">
                            </div>
                            <button class="btn btn-primary btn-custom btn-lg btn-block" name="login" type="submit">Sign In</button>

                        </form> <!-- search form -->
                        <!-- /.input-group -->
                    </div>
                </div>
            </div>
            <h6 class="text-center text-muted pt-4">New to LifeHub? <a href="registration.php">Create an Account. &rarr;</a></h6>
        </div>
    </section>
</div>

<?php include "./includes/footer.php"; ?>