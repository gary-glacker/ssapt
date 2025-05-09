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

  <title>New Club - SSAPT </title>
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
          <li class="breadcrumb-item active">Add New Club</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
      <?php
            //connection
            $conn = mysqli_connect("localhost","root","","school");

           // $userid = $_SESSION['student'];

            $select ="SELECT * FROM `clubs`";
            $query = mysqli_query($conn,$select);

            while($row = mysqli_fetch_assoc($query)){
              
            ?>
        <div class="col-lg-4">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title"> Club Details </h5>
  
                <form class="row g-3 needs-validation" novalidate method="POST">

                    
                    <div class="col-12">
                      <label for="yourName" class="form-label">Club Name</label>
                      <input type="text" value="<?php echo $row['name']?>" class="form-control" id="yourName" required>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Club Description</label>
                      <textarea class="form-control" readonly><?php echo $row['description']?></textarea>

                    </div>
                </form>
              </div>
            </div>
  
        </div>
        <?php }?>
          <div class="col-lg-8 col-md-6">
          <div class="card">
                <div class="card-body">
                  <h5 class="card-title"> Club Request</h5>
    
                <div class="table">
                  <table class="table">
                    <tr>
                      <th>Username</th>
                      <th>Useremail</th>
                      <th>Action</th>
                    </tr>
                    <?php
                      //connection
                      $conn = mysqli_connect("localhost","root","","school");

                      $select ="SELECT * FROM `club_request`";
                      $query = mysqli_query($conn,$select);

                      while($row = mysqli_fetch_assoc($query)){
                      
                      ?>
                    <tr>
                      <td><?php echo $row['username'];?></td>
                      <td><?php echo $row['useremail'];?></td>
                      <td>
                        <a href="#" class="btn btn-success m-1">Approved</a>
                        <a href="delete_club.php?delete_id=<?php echo $row['id'];?>" class="btn btn-danger m-1">Delete</a>
                      </td>
                    </tr>
                    <?php }?>
                  </table>
                </div>
                </div>
              </div>
          </div>

      </div>
        
        
    

    </section>

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