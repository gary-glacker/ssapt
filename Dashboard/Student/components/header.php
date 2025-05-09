<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="../../assets/img/logo.png" alt="">
    <span class="d-none d-lg-block">SSAPT</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

    <li class="nav-item dropdown">

      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
        <i class="bi bi-bell"></i>
        <?php
            //connection
            $conn = mysqli_connect("localhost","root","","school");

            $userid = $_SESSION['student'];

            $select ="SELECT COUNT(*)AS notify FROM `notifications` WHERE `target_role`='student' ";
            $query = mysqli_query($conn,$select);

            while($row = mysqli_fetch_assoc($query)){
              
            ?>
        <span class="badge bg-primary badge-number"><?php echo $row['notify'];?></span>
      </a><!-- End Notification Icon -->
       <?php }?>
      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
        <li class="dropdown-header">
          You have  new notifications
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <?php
            //connection
            $conn = mysqli_connect("localhost","root","","school");

            $userid = $_SESSION['student'];

            $select ="SELECT * FROM `notifications` WHERE `target_role`='student'";
            $query = mysqli_query($conn,$select);

            while($row = mysqli_fetch_assoc($query)){
              
            ?>
        <li class="notification-item">
          <i class="bi bi-bell text-success"></i>
          <div>
            <h4><?php echo $row['title'];?></h4>
            <p><?php echo $row['message'];?></p>
            <p><?php echo $row['created_at'];?></p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>
      <?php }?>


      </ul><!-- End Notification Dropdown Items -->

    </li><!-- End Notification Nav -->



    <li class="nav-item dropdown pe-3">
    <?php
            //connection
            $conn = mysqli_connect("localhost","root","","school");

            $userid = $_SESSION['student'];

            $select ="SELECT * FROM `student` WHERE `email` ='$userid'";
            $query = mysqli_query($conn,$select);

            while($row = mysqli_fetch_assoc($query)){
              
            ?>

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="../../assets/img/profile-img.jpeg" alt="Profile" class="rounded-circle">
        <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $row['name'];?></span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
        <li class="dropdown-header">
          <h6><?php echo $row['name'];?></h6>
          <span><?php echo $row['role'];?></span>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
           <?php }?>

           <li>
          <a class="dropdown-item d-flex align-items-center" href="profile.php">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Log Out</span>
          </a>
        </li>

      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed " href="club.php">
      <i class="bi bi-people"></i>
      <span>Join Club </span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="report.php">
      <i class="bi bi-question-circle"></i>
      <span>Report</span>
    </a>
  </li><!-- End F.A.Q Page Nav -->



</ul>

</aside><!-- End Sidebar-->