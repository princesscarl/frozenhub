<?php
session_start();

$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}


if(isset($_GET['id'])){
  $id = $_GET['id'];
  $user_id = $_SESSION['user_id'];
  $update_query = "UPDATE order_details SET `status`= 'Approved' WHERE `order_id`='$id'";
  $result = mysqli_query($conn,$update_query);
if($result){
  header("location: ../index.php?view_approved");    
}
}
?>