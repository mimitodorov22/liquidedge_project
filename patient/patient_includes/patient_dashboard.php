<?php include "header_patient.php"; ?>

<?php include "navigation_patient.php"; ?>




<div class="container">

    <div class="dash-body" style="margin-top: 15px">
        <table width="100%" style=" border-spacing: 0;margin:0;padding:0;">


            <tr>
                <td colspan="4">


                    <table class="card doctor-header" style="border: none;width:95%;background-image: url(img/b3.jpg);">
                        <tr>
                            <td style="padding: 30px 30px 80px 30px">
                                <h1>
                                    Welcome back <?php

                                                    if (isset($_SESSION['firstname'])) {

                                                        echo $_SESSION['firstname'];
                                                    }
                                                    ?>!
                                </h1>
                                <strong>We are happy to have you back. </strong>
                                <p>What can we help you with?</p>
                                <br>
                                <br>

                            </td>
                        </tr>
                    </table>


                </td>
            </tr>
            </td>

            <td>

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
                
                
                            <div class="row my-4">
                   
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Doctors</h5>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $doctor_count ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
                        <div class="card">
                            <h5 class="card-header">Patients</h5>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $patient_count ?></h5>
                            </div>
                        </div>
                    </div>
                </div>



                <h4>Your Upcoming Booking</h4>
                    <div class="abc scroll" style="height: 250px;padding: 0;margin: 0;">
                        <table width="85%" class="sub-table scrolldown">
                            <thead>

                                <tr>
                                    <th class="table-headin">


                                        Appoint. Number

                                    </th>
                                    <th class="table-headin">


                                        Session Title

                                    </th>

                                    <th class="table-headin">
                                        Doctor
                                    </th>
                                    <th class="table-headin">

                                        Sheduled Date & Time

                                    </th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                // $nextweek = date("Y-m-d", strtotime("+1 week"));
                                // $sqlmain = "select * from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join patient on patient.pid=appointment.pid inner join doctor on schedule.docid=doctor.docid  where  patient.pid=$userid  and schedule.scheduledate>='$today' order by schedule.scheduledate asc";
                                // //echo $sqlmain;
                                // $result = $database->query($sqlmain);

                                // if ($result->num_rows == 0) {
                                //     echo '<tr>
                                //                     <td colspan="4">
                                //                     <br><br><br><br>
                                //                     <center>
                                //                     <img src="../img/notfound.svg" width="25%">
                                                    
                                //                     <br>
                                //                     <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Nothing to show here!</p>
                                //                     <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Channel a Doctor &nbsp;</font></button>
                                //                     </a>
                                //                     </center>
                                //                     <br><br><br><br>
                                //                     </td>
                                //                     </tr>';
                                // } else {
                                //     for ($x = 0; $x < $result->num_rows; $x++) {
                                //         $row = $result->fetch_assoc();
                                //         $scheduleid = $row["scheduleid"];
                                //         $title = $row["title"];
                                //         $apponum = $row["apponum"];
                                //         $docname = $row["docname"];
                                //         $scheduledate = $row["scheduledate"];
                                //         $scheduletime = $row["scheduletime"];

                                //         echo '<tr>
                                //                         <td style="padding:30px;font-size:25px;font-weight:700;"> &nbsp;' .
                                //             $apponum
                                //             . '</td>
                                //                         <td style="padding:20px;"> &nbsp;' .
                                //             substr($title, 0, 30)
                                //             . '</td>
                                //                         <td>
                                //                         ' . substr($docname, 0, 20) . '
                                //                         </td>
                                //                         <td style="text-align:center;">
                                //                             ' . substr($scheduledate, 0, 10) . ' ' . substr($scheduletime, 0, 5) . '
                                //                         </td>

                
                                                       
                                //                     </tr>';
                                //     }
                                // }

                                ?>

                            </tbody>

                        </table>
                    </div>







            </td>
            </tr>
        </table>
        </td>
        <tr>
            </table>
    </div>
</div>












<?php include "footer_patient.php" ?>