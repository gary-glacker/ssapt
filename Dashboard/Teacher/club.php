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
        <div class="col-lg-6">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">New Club</h5>
  
                <form class="row g-3 needs-validation" novalidate method="POST">

                    
                    <div class="col-12">
                      <label for="yourName" class="form-label">Club Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Club Description</label>
                      <input type="text" name="description" class="form-control" id="yourEmail" required>

                    </div>

         
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="create">Create Account</button>
                    </div>
                   
                    <?php
                    //Connection in database
                    $conn = mysqli_connect("localhost","root","","school");

             

                    if(isset($_POST['create'])){
                        
                        $name = $_POST['name'];
                        $description = $_POST['description'];


                            $create ="INSERT INTO `clubs`(`name`, `description`) VALUES ('$name','$description')";

                            $query = mysqli_query($conn, $create);

                            if($query){
                                echo "<script> alert('Your are register New club'); </script>";
                                echo "<script> window.location.href ='club.php';</script>";
                            }else{
                                echo "<script> alert('Your are not register club'); </script>";
                            }

                        }
                    ?>
                </form>
              </div>
            </div>
  
        </div>
        
          <div class="col-lg-6 col-md-6">
          <div class="card">
                <div class="card-body">
                  <h5 class="card-title">New Club</h5>
    
                <div class="table">
                  <table class="table">
                    <tr>
                      <th>Club ID</th>
                      <th>Club Name</th>
                      <th>Action</th>
                    </tr>
                    <?php
                      //connection
                      $conn = mysqli_connect("localhost","root","","school");

                      $select ="SELECT * FROM `clubs`";
                      $query = mysqli_query($conn,$select);

                      while($row = mysqli_fetch_assoc($query)){
                      
                      ?>
                    <tr>
                      <td><?php echo $row['id'];?></td>
                      <td><?php echo $row['name'];?></td>
                      <td>
                        <a href="?user_id=<?php echo $row['id'];?>" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#basicModal">Update</a>
                        <a href="delete_club.php?delete_id=<?php echo $row['id'];?>" class="btn btn-danger m-1">Delete</a>
                      </td>
                    </tr>
                    <?php }?>
                  </table>
                </div>
                </div>
              </div>
          </div>
          <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Update Club</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    <form class="row g-3 needs-validation" novalidate method="POST">
                    <?php
                      //connection
                      $conn = mysqli_connect("localhost","root","","school");

                      $select ="SELECT * FROM `clubs`";
                      $query = mysqli_query($conn,$select);

                      while($row = mysqli_fetch_assoc($query)){
                      
                      ?>
                    
                    <div class="col-12">
                      <label for="yourName" class="form-label">Club Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" value="<?php echo $row['name'];?>">
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Club Description</label>
                      <input type="text" name="description" class="form-control" id="yourEmail" value="<?php echo $row['description'];?>">

                    </div>
                     <?php } ?>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="update">Create Account</button>
                    </div>
                   
                    <?php
                    //Connection in database
                    $conn = mysqli_connect("localhost","root","","school");

             

                    if(isset($_POST['update'])){
                        
                        $name = $_POST['name'];
                        $description = $_POST['description'];


                            $create ="UPDATE `clubs` SET `name`='$name',`description`='$description' WHERE ";

                            $query = mysqli_query($conn, $create);

                            if($query){
                                echo "<script> alert('Your are register New club'); </script>";
                                echo "<script> window.location.href ='club.php';</script>";
                            }else{
                                echo "<script> alert('Your are not register club'); </script>";
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