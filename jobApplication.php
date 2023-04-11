<?php
include 'connect.php';

if(isset($_POST["submit"])) {


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phoneNum = $_POST['phoneNum'];
$address = $_POST['address'];
$interview = $_POST['interview'];
$jobTitle = $_POST['jobTitle'];
$comName = $_POST['comName'];
$comAddress = $_POST['comAddress'];


$insert_applicant_query = "INSERT INTO `job_table`
(`firstName`, `lastName`, `email`, `phoneNum`, `address`, `interview`, `jobTitle`, `comName`, `comAddress`,`status`) 
VALUES ('$firstname', '$lastname', '$email', '$phoneNum', '$address','$interview','$jobTitle', '$comName', '$comAddress', 'Pending')";

$result_applicant = mysqli_query($conn, $insert_applicant_query);

if($result_applicant){
  echo "<script> alert ('Thank you for inquiry.') </script>";
}

else{
  echo "<script> alert ('Sorry, something went wrong.') </script>";
}
}
?>