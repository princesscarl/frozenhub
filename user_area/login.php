<?php
session_start();
include '../connect.php';

if(isset($_POST['submit-btn'])){
  
    $email = $_POST['email'];
    $password = $_POST ['password'];

    $select_query = "SELECT * FROM user_details WHERE email = '".$_POST["email"]."'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);

    if (mysqli_num_rows($result) > 0 ) {
      $row = mysqli_fetch_assoc($result);
      $passworddb = $row['password'];
   
    if($row_count>0)
        
        if(password_verify($password, $passworddb)){
            $_SESSION["email"] = $_POST["email"];
            $email = $_SESSION["email"];
            // echo $email;
            
echo "<script>
alert('Logging you in. Please wait...');
setTimeout(function(){
  window.location.href = '../index.php';
}, 1000);
setTimeout(function(){
  window.location.href = '../index.php';
}, 3000); // Additional fallback redirect after 6 seconds
</script>";
        }
        else{
            echo "<script> alert ('Password is wrong. Try again.') </script>";
          
        }}


    else{
        echo "<script> alert ('Email not found. Please register') </script>";
    }
}



if(isset($_POST['fp-submit'])){

  $email = $_POST['fp-email'];
  $password = $_POST['fp-password'];


  $select_query = "SELECT * FROM user_details WHERE email = '".$_POST["fp-email"]."'";
    $result = mysqli_query($conn, $select_query);

    if (mysqli_num_rows($result) > 0 ) {
      $hash = password_hash($password, PASSWORD_DEFAULT);
      $update = "UPDATE user_details SET `password`='$hash' WHERE email ='".$_POST["fp-email"]."'";
      $result = mysqli_query($conn,$update);
      echo "<script> alert ('Password changed!') </script>";
    }
    else{
      echo "<script> alert ('Email not found. Sorry') </script>";
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

    <title>Frozenhub - Login</title>
</head>
<body style="font-family: 'Poppins', sans-serif; background-color: rgb(247, 247, 247);">
<section style="width: 95%; margin-top:30px; margin-bottom: 30px; margin-right: auto; margin-left: auto;">
  <div class="container-fluid">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-lg-6" style="border-right: solid #E8E6E6 1px;">
      <a href="../index.php">
        <img src="../pictures/login.png"
          class="img-fluid" alt="Sample image" style="width: 91%;"></a>
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

          <!-- Email input -->
      <form method="POST">
          <div class="form-outline mb-4">
          <label class="form-label" for="form3Example3">Email address</label>
            <input type="email" id="form3Example3" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address" required>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
          <label class="form-label" for="form3Example4">Password</label>
            <input type="password" id="form3Example4" name="password" class="form-control form-control-lg" placeholder="Enter password" required>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              
            </div>
            <a href="#!" class="text-body" data-bs-toggle="modal" data-bs-target="#forgotpassword">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button name="submit-btn" type="submit" class="btn btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem; background-color: #008080; color:white; font-weight:bold;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                class="link-primary">Register</a></p>
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




<div class="modal fade" id="forgotpassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Forgot Password?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" name="fp-email" id="fp-email" placeholder="abcd@gmail.com">
</div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">New Password:</label>
            <input type="password" class="form-control" name="fp-password"  id="fp-password" placeholder="**********">
          </div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="fp-submit">Save</button>
      </div>
    </div>
  </div>
</div>
</form>
</html>


