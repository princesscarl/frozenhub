<?php

 session_start(); 
 $conn = mysqli_connect('localhost','root','','frozenhub');
 if (!$conn){
     die("Connection Failed. " . mysqli_connect_error());
 }



if(!isset($_SESSION['email'])){
    header("Location: ../index.php");
}
else{


 if(isset($_POST["submit-btn"])) {     
    $currentpassword = $_POST["currentpass"];
    $newpassword = $_POST['newpass'];
    $confirmpassword = $_POST['confirmpass'];

    
    //QUERY for DATABASE
    $passwordquery="SELECT * FROM `user_details` WHERE `email` ='".$_SESSION['email']."'";
    $passwordresult= mysqli_query($conn,$passwordquery);
    $count=mysqli_num_rows($passwordresult);
    
    if ($count==1) {
        while($row = mysqli_fetch_assoc($passwordresult)) {

        //Data from Database
            $fetchpassword = $row['password']; 

            if(!password_verify($currentpassword, $fetchpassword)){
                header("Location: change_password.php?error=invalidcurrentpassword");

            }elseif ($newpassword==$currentpassword){
                header("Location: change_password.php?error=samepassword");

            }else if(password_verify($currentpassword, $fetchpassword)) {

                if ($newpassword != $confirmpassword) {
                    header("Location: change_password.php?error=invalidconfirmpassword");
                }
            
                if($newpassword == $confirmpassword) {
                   $password_raw = $_POST['newpass']; //same in line 8
                   $hash = password_hash($password_raw, PASSWORD_DEFAULT);

                   $updatequery = "UPDATE `user_details` SET `password`='".$hash."' WHERE `email` ='".$_SESSION['email']."'";
                   $updateresult= mysqli_query($conn,    $updatequery);
                   header("Location: change_password.php?success=passwordchanged");
                }
                
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
  <title>Frozenhub</title>
  <link rel="icon" type="images/x-icon" href="https://lh4.googleusercontent.com/jvr_qqBAp9zQzSBzcTX51PygZYcNud6Kj6aBp4XxHeWVzYBIt0AWBGagulBvcnWdhB0=w2400" />

  <link rel="stylesheet" href="../style.css">

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

  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      display: none;
    }
  </style>

</head>

<body style="font-family: 'Poppins', sans-serif; background-color: rgb(247, 247, 247);">


<div class="navigation">
  <section class="header mt-3">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-9">
          <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" width="100%" height="auto">
        
        </div>
      </div>
    </div>
  </section>

  <div class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">

          <li class="nav-item">
            <a class="nav-link" href="../index.php">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../index.php?all_products">All Products</a>
              <a class="dropdown-item" href="../index.php?all_promos">All Promos</a>
            </div>


          <li class="nav-item">
            <a class="nav-link" href="../hub.php #Announcement">Announcement</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="../hub.php #aboutUs">About Us</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact Us</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../inquiries.php #appform">Join Us - Franchise</a>
              <a class="dropdown-item" href="../feedback.php #feedback">Product Feedback</a>
              <a class="dropdown-item" href="../complaints.php #complaints">Complaints</a>
              <a class="dropdown-item" href="../job_application.php #jobApp">Job Application</a>
            </div>
          </li>

        

<!--           
          <li class="nav-item">
            <a class="nav-link">LOGOUT</a>
          </li> -->


          <?php 
    if(!isset($_SESSION['email'])){
    echo'
      <li class="nav-item">
        <a class="nav-link" href="#">Welcome Guest</a>
      </li>';
    }

    elseif(isset($_SESSION['email'])){
      $email = $_SESSION['email'];

      $name_query = "SELECT * FROM user_details WHERE `email` = '$email'";
      $result = mysqli_query($conn, $name_query);
     
  
      if (mysqli_num_rows($result) == 0) {
  
          } else {
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['user_id'];
            $firstName = $row['fname'];
            $_SESSION['user_id'] = $user_id;
      }
  
      echo'<li class="nav-item">
      <input type="text" hidden name="user_id" ='
      .$_SESSION['user_id'].'>
      </form>
      <a class="nav-link" href="#">Welcome '.$firstName.'</a>
    </li>
';
    }?>

<?php if(isset($_SESSION['email'])){
            echo'
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="../user_area/edit_account.php">Edit Account</a>
            <a class="dropdown-item" href="../user_area/view_orders.php">View Orders</a>
            <a class="dropdown-item" href="../user_area/change_password.php">Change Password</a>
            <a class="dropdown-item" href="../user_area/logout.php">Logout</a>
          </div>
          </li>
          ';
          } ?>


          <?php if (!isset($_SESSION['email'])) {
            echo '
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="./user_area/login.php">Login</a>
              <a class="dropdown-item" href="./user_area/register.php">Register</a>
            </div>
            </li>
          ';
          } ?>




<?php if (isset($_SESSION['email'])) {
              echo'
     <li class="nav-item">
          <a class="nav-link" href="../index.php?cart"><i class="fa fa-shopping-cart" style="font-size:20px"></i></a>
        </li>';}

        elseif(!isset($_SESSION['email'])){
          echo'
          <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-shopping-cart" style="font-size:20px"></i></a>
          
        </li>';}
        ?>

  </ul>

        </div>
        </div>
        </div>



       



<!-- END OF NAVBAR -->
<div style="width: 90%; margin-top:30px; margin-bottom: 30px; margin-right: auto; margin-left: auto;">
<div class=" col-lg-12 mb-3">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Change Password</div>
                <div class="card-body">
                    <form method="POST">
        
                    <div style="width:50%">
                    <?php 
                            if(isset($_GET['error'])){
                                if($_GET['error'] == 1){
                                    echo '<p class="error">Invalid current and confirm password!<br>Please try again.</p>';
                                } else if ($_GET['error'] == 'invalidcurrentpassword'){
                                    echo '<p class="alert alert-danger mt-3">Invalid  current password!<br>Please try again.</p>';
                                } else if ($_GET['error'] == 'invalidconfirmpassword'){
                                    echo '<p class="alert alert-danger mt-3">Invalid confirm password!<br>Please try again.</p>';
                                } else if ($_GET['error'] == 'samepassword'){
                                echo '<p class="alert alert-danger mt-3">You currently used that password!<br>Please choose again.</p>';
                                }

                                    }
                                
                                    if (isset($_GET['success'])) {
                                        if ($_GET['success'] == 'passwordchanged') {
                                            echo '<p class="alert alert-success">You have successfully changed your password!</p>';
                                        }
                                    }
                                  
                       
                        ?>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3 d-flex">
                            <!-- Form Group (first name)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputFirstName"> Current Password</label>
                                <input class="form-control" id="inputFirstName"  type="password" name="currentpass">
                               
                                <label class="small mb-1" for="inputLastName">New Password</label>
                                <input class="form-control" id="inputLastName"  type="password" name="newpass">
                                
                                <label class="small mb-1" for="inputOrgName">Confirm Password</label>
                                <input class="form-control" id="inputOrgName"  type="password" name="confirmpass">
                               
                            </div>

                            </div>
            
                          
                        </div>
                        </div>
                 
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="submit" name="submit-btn">Save changes</button>




                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php     
} ?>












</body>
</html>