<?php

$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $update_query = "UPDATE order_details SET `status`= 'Cancelled' WHERE `order_id`='$id'";
  $result = mysqli_query($conn,$update_query);
  header("location: view_cancelled_orders.php");    
}
?>