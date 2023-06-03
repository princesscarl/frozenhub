<?php

session_start();

$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $update_query = "UPDATE order_details SET `status`= 'For Delivery' WHERE `order_id`='$id'";
  $result = mysqli_query($conn,$update_query);
  if($result){
    header("location: ../index.php?view_delivery");    
  }
  }
?>