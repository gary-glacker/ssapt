<?php
session_start();

if(!isset($_SESSION['users'])){
    ?>
      <script>
        window.location.href = '../../teacher.php';
      </script>
   <?php 
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title> Club Overview - SSAPT </title>
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
          <li class="breadcrumb-item"><a href="manager_student.php">Club</a></li>
          <li class="breadcrumb-item active">Join Club</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
       
    <div class="col-lg-4">

    <?php
            //connection
            $conn = mysqli_connect("localhost","root","","school");

           // $userid = $_SESSION['student'];

            $select ="SELECT * FROM `clubs`";
            $query = mysqli_query($conn,$select);

            while($row = mysqli_fetch_assoc($query)){
              
            ?>
          <!-- Card with an image on top -->
          <div class="card">
           <a href="club_overview.php?club_id=<?php echo $row['id']?>" class="btn">
            <img src="../../assets/img/club.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row['name']?></h5>
              <p class="card-text"><?php echo $row['description']?></p>
            </div>
           </a>
          </div><!-- End Card with an image on top -->
         <?php }?>

        </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>SSAPT  </span></strong>. All Rights Reserved
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