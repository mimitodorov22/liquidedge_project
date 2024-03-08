<?php ob_start(); ?>

<?php include "admin_includes/header_admin.php" ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "admin_includes/navigation_admin.php" ?>

    <div id="page-wrapper">
        <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">


            <?php
                    
                    if(isset($_GET['source'])) {

                        $source = $_GET['source'];

                    } else {

                        $source = '';
                    }

                    switch($source) {

                        case 'add_user';
                            include "admin_includes/add_user.php";
                            break;

                        case 'profile';
                            include "admin_includes/profile.php";
                            break;

                        case 'edit_user';
                            include "admin_includes/edit_user.php";
                            break;

                        default:

                        include "admin_includes/view_all_users.php";

                        break;
                    }
                    
                    ?>

        </div>
    </div>
</div>
</div>
        

<?php include "admin_includes/footer_admin.php" ?>