<nav class="navbar navbar-inverse navbar-light bg-light p-3 border">
  <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 justify-content-between">
    <a class="navbar-brand" href="#">My <strong>LifeHub</strong></a>
    <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  </div>
  
  <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">

    <div class="dropdown">
      <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
        Hello, <?php

                if (isset($_SESSION['firstname'])) {

                  echo $_SESSION['firstname'];
                }
                ?>
      </button>
      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <li><a class="dropdown-item" href="patient_profile.php">Profile</a></li>
        <li><a class="dropdown-item" href="http://localhost/liquidedge_project/login.php">Sign out</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row" style="height: 90vh;">
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse border-right pt-3">
      <div class="position-sticky">
        <ul class="nav flex-column">


          <li class="nav-item">
            <a class="nav-link" href="patient_dashboard.php"><i class="fa fa-regular fa-clipboard" style="margin-right: 20px;"></i> Dashboard</a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="patient_profile.php"><i class="fa fa-regular fa-user" style="margin-right: 20px;"></i> Edit profile</a>
          </li>



          <li class="nav-item">
            <a class="nav-link" href="emergency_contact.php"><i class="fa fa-regular fa-user" style="margin-right: 20px;"></i> Emergency Contact</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="h.php"><i class="fa fa-regular fa-user" style="margin-right: 20px;"></i> t</a>
          </li>

        </ul>
      </div>
    </nav>





    <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">