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

  <title>Nofication - SSAPT </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../../assets/img/favicon.png" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Notification</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">New Annocuments</h5>
  
                <form class="row g-3 needs-validation" novalidate method="POST">
                    
                    <div class="col-12">
                      <label for="yourName" class="form-label">Title Annocuments</label>
                      <input type="text" name="title" class="form-control" id="yourName" required>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Message</label>
                      <input type="text" name="message" class="form-control" id="yourEmail" required>
                    </div>

                    <div class="col-12">
                      <label for="yourRole" class="form-label">Role</label>
                      <div class="input-group has-validation">
                        <select name="role"  class="form-control" id="yourRole">
                          <option selected> -- Choose your Status -- </option>
                          <option value="student">Student</option>
                          <option value="teacher">Teacher</option>
                        </select>
                        <div class="invalid-feedback">Please choose a role</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Creator</label>
                      <input type="text" name="creator" class="form-control" id="yourEmail" value='Admin' readonly>
                    </div>


                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="Add">Create Annocuments</button>
                    </div>
                   
                    <?php
                    //Connection in database
                    $conn = mysqli_connect("localhost","root","","school");

             

                    if(isset($_POST['Add'])){
                        
                        $title = $_POST['title'];
                        $message = $_POST['message'];
                        $role = $_POST['role'];
                        $creator = $_POST['creator'];



                            $send ="INSERT INTO `notifications`(`title`, `message`, `target_role`, `created_by`) VALUES ('$title','$message','$role','$creator')";

                            $query = mysqli_query($conn, $send);

                            if($query){
                                echo "<script> alert('Your are Upload'); </script>";
                                echo "<script> window.location.href ='index.php';</script>";
                            }else{
                                echo "<script> alert('Your are not Uploaded'); </script>";
                            }

                        }
                    ?>
                </form>
              </div>
            </div>
  
        </div>
      
      </div>
        
        
    

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SSAPT  </span></strong> All Rights Reserved
    </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../../assets/vendor/echarts/echarts.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../../assets/js/main.js"></script>

</body>

</html>