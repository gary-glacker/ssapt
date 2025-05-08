<?php

session_start();

if(!isset($_SESSION['account'])){

    ?>
      <script>
        window.location.href = '../../index.php';
      </script>
   <?php 
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Users Profile - SSAPT  </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="../../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- heade section start -->
      
  <?php 
    include ("components/header.php");
    ?>

  <!-- header section ends -->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
      <?php
            //connection
            $conn = mysqli_connect("localhost","root","","school");

            $userid = $_SESSION['account'];

            $select ="SELECT * FROM `users` WHERE `email` ='$userid'";
            $query = mysgitqli_query($conn,$select);

            while($row = mysqli_fetch_assoc($query)){
              
            ?>
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="../../assets/img/profile-img.jpeg" alt="Profile" class="rounded-circle">
              <h2><?php echo $row['name'];?></h2>
              <h3><?php echo $row['email'];?></h3>
            </div>
          </div>
          
        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['name'];?></div>
                  </div>


                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8"><?php echo $row['email'];?></div>
                  </div>
                  
                </div>



                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form method="POST"
                  >
                    <div class="row mb-3">
                      <label for="file" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="file" type="file" class="form-control" id="file" value="">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="name" type="text" class="form-control" id="fullName" value="<?php echo $row['name'];?>">
                      </div>
                    </div>


                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo $row['email'];?>">
                      </div>
                    </div>



                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="update">Save Changes</button>
                    </div>

                    <?php 
                      //connection
                        $conn = mysqli_connect("localhost","root","","school");

                        if(isset($_POST['update'])){

                          $name = $_POST['name'];
                          $email = $_POST['email'];                          

                          $select ="UPDATE `users` SET `name`='$name',`email`='$email' WHERE `email` ='$userid'";

                          $query = mysqli_query($conn, $select);

                          if($query){
                             echo "<script>alert('your are update your profile');</script>";
                             echo "<script>window.location.href='index.php';</script>";  
                          }else{
                            echo "<script>alert('your are not update your profile');</script>";
                          }

                        }
                    ?>

                    
                  </form><!-- End Profile Edit Form -->

                </div>

  

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form method="POST">

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="text" class="form-control" readonly value="<?php echo $row['password'];?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="npw" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="rpw" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary" name="change">Change Password</button>
                    </div>

                    <?php 
                      //connection
                        $conn = mysqli_connect("localhost","root","","school");

                        if(isset($_POST['change'])){

                          $npw = $_POST['npw'];
                          $rpw = $_POST['rpw'];  
                          
                          if($npw == $rpw){

                            $select ="UPDATE `users` SET `password`='$rpw' WHERE `email` ='$userid'";

                          $query = mysqli_query($conn, $select);

                          if($query){
                             echo "<script>alert('your are update your Password');</script>";
                             echo "<script>window.location.href='index.php';</script>";  
                          }else{
                            echo "<script>alert('your are not update your Password');</script>";
                          }
                          }else{
                            echo "<script>alert('your Password is not Match');</script>";
                          }

                          

                        }
                    ?>

                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
        <?php } ?>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SSAPT  </span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>