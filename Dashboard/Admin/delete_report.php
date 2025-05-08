<?php

// connect with databse

$conn = mysqli_connect('localhost','root','','school');

if(isset($_GET['delete_id'])){

  $delete_data=$_GET['delete_id'];
}

 $sql = "DELETE FROM `report` WHERE `id`='$delete_data'";

  $query =mysqli_query($conn,$sql);

  if($query){
    echo "<script>alert('delete successful')</script>";
    echo "<script> window.location.href ='report.php'</script>";

  }else{
    echo "<script> alert('delete operation not perform')</script>";
    echo "<script> window.location.href ='report.php';</script>";

  }