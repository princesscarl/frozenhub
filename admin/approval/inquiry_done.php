<?php
include '../connect.php';

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $update_query = "UPDATE application_table SET `status`= 'Done' WHERE `application_id`='$id'";
  $result = mysqli_query($conn,$update_query);

  if($result){
    echo "<script> alert('Mark as done.')</script> ";    
    header("location: index.php");      
}
else {
    echo "<script> alert('Error.')</script> ";
}

  
}
?>