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

  <title>New Student - SSAPT </title>
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
          <li class="breadcrumb-item"><a href="manager_student.php">Help Center</a></li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Help Center</h5>
  
                <form class="row g-3 needs-validation" novalidate method="POST">
                    
                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Name</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Please, enter your full name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Your Email</label>
                      <input type="email" name="name" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Please, enter your full name!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Your WhatsApp Number</label>
                      <input type="phone" name="email" class="form-control" id="yourPhone" required>
                      <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourRole" class="form-label">Help Category</label>
                      <div class="input-group has-validation">
                        <select name="role"  class="form-control" id="yourRole">
                          <option selected> -- Choose category -- </option>
                          <option value="Account-Issues">Account Issues</option>
                          <option value="">System Issues</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-12">
                      <p class="ps-5 pe-5 pt-2 pb-2">Dear Our User this part of system that you can get support for our team service,
                        please let know your problem?
                      </p>
                    </div>

                    <div class="col-12">
                      <div class="row">
                            
                   <button class="btn btn-primary col-3 ms-3" type="button" onclick="sendWhatsAppMessageCommunity()">Contact Us via WhatsApp Community</button>
                   <button class="btn btn-primary col-3 ms-3" type="button" onclick="sendWhatsAppMessage()">Contact Us via WhatsApp</butt
                  on>
                  </div>
                    </div>
                
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

  <!-- filepath: c:\xampp\htdocs\SSAPT\Dashboard\Admin\help.php -->
<script>
  function sendWhatsAppMessageCommunity() {
    // Get form data
    const name = document.getElementById('yourName').value;
    const email = document.getElementById('yourEmail').value;
    const phone = document.getElementById('yourPhone').value;
    const category = document.getElementById('yourRole').value;

    // Validate form inputs
    if (!name || !phone || category === "-- Choose category --") {
      alert("Please fill out all fields before sending the message.");
      return;
    }

    // Construct the WhatsApp message
    const message = `Hello, my name is ${name}.\n
                     My email address is ${email}.\nI
                     My phone number is ${phone}.\nI
                     need help with the following category: ${category}.`;

    // Encode the message for the URL
    const encodedMessage = encodeURIComponent(message);

    // Open WhatsApp Web with the pre-filled message
   // const whatsappUrl = `https://wa.me/250791723030?text=${encodedMessage}`;
    // Replace 'GROUP_ID' with your actual WhatsApp group ID
    const groupId = "C5WXHZ7EMlO6vgSihQfMsK"; // Example: "1234567890@g.us"
    const whatsappUrl = `https://chat.whatsapp.com/${groupId}?text=${encodedMessage}`;

    window.open(whatsappUrl, '_blank');
  }
  function sendWhatsAppMessage() {
    // Get form data
    const name = document.getElementById('yourName').value;
    const email = document.getElementById('yourEmail').value;
    const phone = document.getElementById('yourPhone').value;
    const category = document.getElementById('yourRole').value;

    // Validate form inputs
    if (!name || !phone || category === "-- Choose category --") {
      alert("Please fill out all fields before sending the message.");
      return;
    }

    // Construct the WhatsApp message
    const message = `Hello, my name is ${name}.\n
                     My email address is ${email}.\nI
                     My phone number is ${phone}.\nI
                     need help with the following category: ${category}.`;

    // Encode the message for the URL
    const encodedMessage = encodeURIComponent(message);

    // Open WhatsApp Web with the pre-filled message
   const whatsappUrl = `https://wa.me/250791723030?text=${encodedMessage}`;
    // // Replace 'GROUP_ID' with your actual WhatsApp group ID
    // const groupId = "C5WXHZ7EMlO6vgSihQfMsK"; // Example: "1234567890@g.us"
    // const whatsappUrl = `https://chat.whatsapp.com/${groupId}?text=${encodedMessage}`;

    window.open(whatsappUrl, '_blank');
  }
</script>



</body>

</html>