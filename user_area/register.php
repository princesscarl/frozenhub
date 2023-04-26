<?php 
session_start();
include '../connect.php';
if(isset($_POST['submit-btn'])){
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile_number'];
    $address = $_POST['address'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirm_password'];


    $emailquery = "SELECT * FROM user_details WHERE email = '$email'";
    $result_email = mysqli_query($conn, $emailquery);
    $count = mysqli_num_rows($result_email);

    if($count > 0){

        echo "<script> alert('Email is already in use. Please try another one.')</script> ";
    }
    else{
        if ($password != $confirmpassword){

            echo "<script> alert('Passwords do not match.')</script> ";
        }

        else{
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $insert_user = "INSERT INTO `user_details`(`fname`, `lname`, `email`, `password`, `user_address`, `user_province`, `user_city`, `user_zip`, `user_mobile`) VALUES ('$firstName', '$lastName', '$email', '$hash', '$address', '$province', '$city', '$zip', '$mobile')";

            $result = mysqli_query ($conn, $insert_user);

            if($result){
            echo "<script> alert('Successfully registered.')</script> ";    
            $_SESSION["email"] = $_POST["email"];
            $email = $_SESSION["email"];
            header("Location: ../index.php");      
        }
    }
       
    }
    }
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="images/x-icon" href="https://lh4.googleusercontent.com/jvr_qqBAp9zQzSBzcTX51PygZYcNud6Kj6aBp4XxHeWVzYBIt0AWBGagulBvcnWdhB0=w2400" />

  <link rel="stylesheet" href="style.css">

  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://kit.fontawesome.com/faf8bee4ee.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/faf8bee4ee.js" crossorigin="anonymous"></script>
  <script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>

    <title>Frozenhub - Register</title>


    
  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      display: none;
    }
  </style>
</head>
<body style="font-family: 'Poppins', sans-serif; background-color: rgb(247, 247, 247);">
<section style="width: 95%; margin-top:30px; margin-bottom: 30px; margin-right: auto; margin-left: auto;">
  <div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-lg-6" style="border-right: solid #E8E6E6 1px;">
        <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEOQrtES5zI9uck9Eib1zx7TYRa8mWInjfIlPV5P5HWLsMSQEuAfpz1XZWxyvOlz_pwdIM2J3Wn1C73GPkCs1Y0PN9c9X=s2560"
          class="img-fluid" alt="Sample image" style="width: 91%;">
      </div>
      <div class="col-md-9 col-lg-6">
          <div class="d-flex align-items-center justify-content-center" style="margin:auto; width:50%;">
            <p class="lead fw-normal mb-0 me-3">Sign in with</p>
            <button type="button" class="btn btn-floating mx-1" style="background-color: #008080; color:white">
              <i class="fab fa-facebook-f"></i>
            </button>

            <button type="button" class="btn btn-floating mx-1" style="background-color:#008080; color:white">
              <i class="fab fa-twitter"></i>
            </button>

            <button type="button" class="btn btn-floating mx-1" style="background-color: #008080; color:white">
              <i class="fab fa-linkedin-in"></i>
            </button>
          </div>

          <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0">Or</p>
          </div>





        
      <form method="POST">
        <!-- FIRST NAME-->
      <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">First Name</label>
            <input type="text" id="form3Example3" name="fname" class="form-control form-control-lg" placeholder="Enter you first name"required>
          </div>


             <!-- LAST NAME-->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Last Name</label>
            <input type="text" id="form3Example3" name="lname" class="form-control form-control-lg" placeholder="Enter your last name" required>
          </div>

   <!-- -->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Email</label>
            <input type="email" id="form3Example3" name="email" class="form-control form-control-lg" placeholder="Enter your email address" required>
          </div>

                   <!-- MOBILE-->
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Mobile Number</label>
            <input type="number" id="form3Example3" name="mobile_number" class="form-control form-control-lg" placeholder="Enter your mobile number" required>
          </div>

          
                   <!-- ADDRESS-->
                   <div class="form-outline mb-4 ">
          <label class="form-label" for="form3Example3">Address</label>
            <input type="text" id="form3Example3" name="address" class="form-control form-control-lg" placeholder="Enter your address"required>
          </div>
          
                   <!-- PROVINCE-->
                   <div class="form-outline mb-4 d-flex">
          <label class="form-label" for="form3Example3"></label>
            <input type="text" id="form3Example3" name="province" class="form-control form-control-lg" placeholder="Province"required>
        
          
                   <!-- CITY-->
               
          <label class="form-label" for="form3Example3"></label>
            <input type="text" id="form3Example3" name="city" class="form-control form-control-lg" placeholder="City"required>
        
          
                   <!-- ZIP-->
                  
          <label class="form-label" for="form3Example3"></label>
            <input type="number" id="form3Example3" name="zip" class="form-control form-control-lg" placeholder="ZIP" required/>
          </div>




          
          <!-- Password input -->
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Password</label>
            <input type="password" id="form3Example4" name="password" class="form-control form-control-lg" placeholder="Enter password" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4"> Confirm Password</label>
            <input type="password" id="form3Example4" name="confirm_password" class="form-control form-control-lg" placeholder="Enter password" />
          </div>



          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="text-body">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button name="submit-btn" type="submit" class="btn btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #008080; color:white; font-weight:bold;">Register</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Have an account? <a href="login.php"
                class="link-primary">Login.</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</body>

<footer class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between mb-md-0 py-4 px-4 px-xl-5"
style="width:100%; background-color:#008080">
    <!-- Copyright -->
    <div class="text-white">
      Copyright © 2023. Frozenhub. All rights reserved.
    </div>
    <!-- Copyright -->

    <!-- Right -->
    <div class="mb-md-0">
      <a href="#!" class="text-white me-4">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="#!" class="text-white me-4">
        <i class="fab fa-google"></i>
      </a>
      <a href="#!" class="text-white">
        <i class="fab fa-linkedin-in"></i>
      </a>
    </div>
    <!-- Right -->
</footer>
</html>


