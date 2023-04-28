
<?php

session_start();
$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}
function cart_items()
{
    global $conn;
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $select_query = "SELECT * FROM cart_details JOIN user_details WHERE cart_details.user_id = user_details.user_id AND `email`='$email'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);

        if ($count_cart_items == 0) {
            $count_cart_items = 0;
            return $count_cart_items;
        } else {
            return $count_cart_items;
        }
    }
}


if(isset($_SESSION['email']))
{
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


  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      display: none;
    }
  </style>

</head>

<body style="font-family: 'Poppins', sans-serif; background-color: rgb(247, 247, 247);">
<!-- NAVBAR-->


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
        <a class="nav-link" href="#">Guest</a>
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
      <a class="nav-link" href="#">'.$firstName.'</a>
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
          <a class="nav-link" href="../index.php?cart"><i class="bi bi-cart-plus-fill" style="font-size:25px;">'; ?>
          
         <?php   echo cart_items();?>

         <?php
         echo' 
          </i></a>
        </li>
          ';} ?>

          <?php

        if(!isset($_SESSION['email'])){
          echo'
          <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-shopping-cart" style="font-size:20px"></i></a>
          
        </li>';}
        ?>

  </ul>

        </div>
        </div>
        </div>



       


<!-- NAVBAR-->

<?php

      $user_id = $_SESSION['user_id'];
                    $category_query="SELECT * FROM order_details WHERE`user_id` = $user_id AND `status` ='Pending' ORDER BY `date` DESC";
                    $result_category= mysqli_query($conn,$category_query);

                    $count = mysqli_num_rows($result_category);
                    if ($count == 0){
                      echo'<h1 class="text-center">No orders yet. Shop now!</h1>';
                      echo'<div class="container text-center">';
                      echo'<a href="./view_orders.php" class="btn btn-secondary m-2 py-2 border-0 text-decoration-none text-light">Back to orders</a>';
                      echo'<a href="../index.php?all_products" class="btn btn-secondary m-2 py-2 border-0 text-decoration-none text-light">Continue Shopping</a>';
                      echo'</div">';
                    }

                    else { 

echo'
<h1 class="text-center" id="reqsHeading" style="margin-bottom: 12px;padding-bottom: 8px;padding-top: 12px;">Orders</h1>
<a href="./view_orders.php" class="btn btn-secondary ml-5 p-2 py-2 border-0 text-decoration-none text-light mb-3">Pending</a>
<a href="./view_for_delivery.php" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">For Delivery</a>
<a href="./view_received_orders.php" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">Received</a>
<a href="./view_cancelled_orders.php" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">Cancelled</a>
<div class= "container-fluid" style="width: 90%; display: flex; justify-content: center;">

<table class="table">

    <thead>
        <tr>
          
            <th> Invoice</th>
            <th colspan ="2"> Items </th>
            <th> Date Ordered</th>
            <th> Total </th>
            <th> Status</th>
            <th> Action </th>
          
        </tr>
    </thead>
    <tbody>';


                    while($row = mysqli_fetch_assoc($result_category)) {

                      $order_id = $row['order_id'];
                      $invoice = $row['invoice'];
                      $date = $row['date'];
                      $items = $row['items'];
                      $status = $row['status'];
                      $total = $row['amount'];
            echo'
            <tr>
       
            <td>#'.$invoice.'</td>
            <td>'.$items .'</td>

            <td><a href="fetch_orders.php?order_id='.$order_id.'" class="text-decoration-none text-info">View items</a></td>
      
            <td>'. $date.'</td>
            <td>'.$total.'</td>

            <td>'.$status.'</td>
            <td> 
            <button class="btn btn-success">
            <a href="received.php?id='.$order_id.'" class="text-light text-decoration-none">Received</a></button>
          
            <button class="btn btn-warning">
            <a href="cancel.php?id='.$order_id.'" class="text-light text-decoration-none">Cancel</a></button>
            </td>

            ';
             
            }}?>    

      </tr>  
    </tbody>
        </table>
        </div>

        <footer style=" width: 90%; margin-top:10px; margin-bottom: 20px; margin-right: auto; margin-left: auto; background-color: #439D9E; border-radius: 5px;">
    <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2); margin-top:20px; margin-bottom: 20px;  border-radius: 5px;">
      © 2023 Copyright: <a class="text-white" href="https://Frozenhub.com/">Frozenhub.com</a>
    </div>
  </footer>

  <?php 
}
else{

  echo '<script>window.location.href = "./login.php";</script>';

}

?>





  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/faf8bee4ee.js" crossorigin="anonymous"></script>
  <script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>