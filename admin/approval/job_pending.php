<?php
include '../connect.php';

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $update_query = "UPDATE job_table SET `status`= 'Pending' WHERE `job_id`='$id'";
  $result = mysqli_query($conn,$update_query);

  if($result){
    echo "<script> alert('Mark as done.')</script> ";    
    header("location: ../index.php?jobs");      
}
else {
    echo "<script> alert('Error.')</script> ";
   
}

  
}
?>