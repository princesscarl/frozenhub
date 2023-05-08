<?php session_start ();?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Frozenhub</title>

  <!-- CSS-->
  <link rel="stylesheet" href="style.css">
  
  <!-- ICON-->
  <link rel="icon" type="images/x-icon" href="https://lh4.googleusercontent.com/jvr_qqBAp9zQzSBzcTX51PygZYcNud6Kj6aBp4XxHeWVzYBIt0AWBGagulBvcnWdhB0=w2400">
 

  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <!-- <link rel="stylesheet" href="https://kit.fontawesome.com/faf8bee4ee.css" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  
  <!-- <script src='action.js'></script> -->
  
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <!-- <script src="https://kit.fontawesome.com/faf8bee4ee.js" crossorigin="anonymous"></script> -->
  <script src="https://scripts.sirv.com/sirvjs/v3/sirv.js"></script>
  <script src="action.js"></script>


<script>
$(document).ready(function() {
  $('.view_more_button').click(function() {
    var fullDescription = $(this).prev('.description').find('.full_description');
    if (fullDescription.is(':hidden')) {
      fullDescription.show();
      $(this).text('View Less');
    } else {
      fullDescription.hide();
      $(this).text('View More');
    }
  });
});
</script>



<style>
.home{
  margin-left: 80px;
}


@media screen and (max-width: 1260px) {
  .home{
    margin-left: 70px;

  }
}


@media screen and (max-width: 1080px) {
  .home{
    margin-left: 60px;

  }
}

@media screen and (max-width: 980px) {
  .home{
    margin-left: 50px;

  }
}

@media screen and (max-width: 768px) {

  .home{
    margin-left: 40px;

  }
}

@media screen and (max-width: 480px) {
  .home{
    margin-left: 30px;

  }
}

@media screen and (max-width: 380px) {
  .home{
    margin-left: 20px;

  }
}



.title{

}

.description{
margin-top: 20px; 
max-width: 650px; 
width: 600px; 
height: 200px;
resize:none;
border: none; 
outline:none;
}

@media screen and (max-width: 1260px) {
  .description{
    width: 500px; 

  }
}

@media screen and (max-width: 1080px) {
  .description{
    width: 420px; 

  }
}

@media screen and (max-width: 980px) {
  .description{
    width: 400px; 

  }
}

@media screen and (max-width: 768px) {
  .description {
    width: 600px; 
   
  }
}


@media screen and (max-width: 680px) {
  .description {
    width: 480px; 
   
  }
}

@media screen and (max-width: 480px) {
  .description {
    width: 390px; 
  }
}

@media screen and (max-width: 380px) {
  .description {
    width: 320px; 
  }
.add-to-cart-button {
  font-size:12px;

}
}





.price{
  font-size:  25px;
}


.product-info {
  display: flex;
  flex-direction: row;
}

@media screen and (max-width: 768px) {
  .product-info {
    flex-direction: column;
  }
}
.product-image-column {
  max-width: 100%;
  height: 500px;
  flex-basis: 50%;
  flex-grow: 1;
}

.product-image-column img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.product-description-column {
  flex-basis: 50%;
  flex-grow: 1;
}

.product-description-column textarea {
  width: 100%;
  height: 200px;
  resize: none;
  border: none;
  outline:none;
}

.product-card {
  width: 100%;
  max-width: 23%;
  margin: 0 1%;
  border-radius: 10px;

}
.product-image-container {
    position: relative;
    width: 100%;
    height: 250px;
  }
  
  .product-image {
    position: absolute;
    width: 100%;
    height: 250px;
    object-fit: cover;
  }

  @media only screen and (max-width: 834px) {
  .card-title {
    font-size: 18px;
  }
  
  .card-text strong {
    font-size: 14px;
  }
  
}

  /* Medium screens */
@media only screen and (max-width: 768px) {
  .card-title {
    font-size: 20px;
  }
  
  .card-text strong {
    font-size: 16px;
  }
}

/* Small screens */
@media (max-width: 466px) {
  .card-title {
    font-size: 16px;
  }
  
  .card-text strong {
    font-size: 12px;
  }
}


@media (max-width: 768px) {
  .product-card {
    max-width: 46%;
  }
}


@media (max-width: 480px) {
  .product-card {
    max-width: 46%;
  }
}

@media (max-width: 320px) {
  .product-card {
    max-width: 46%;
  }
}
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      display: none;
    }
  </style>

</head>

<body style="font-family: 'Poppins', sans-serif; background-color: rgb(247, 247, 247);">


<?php 

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


function total_cart_price()
{
    global $conn;

    $user_id = $_SESSION['user_id'];
    $total = 0;
    $select_cart = "SELECT * FROM cart_details WHERE `user_id`= $user_id";
    $result_cart = mysqli_query($conn, $select_cart);
    while ($row = mysqli_fetch_array($result_cart)) {
        $quantity = $row['quantity'];
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM products WHERE `product_id` = $product_id";
        $result_products = mysqli_query($conn, $select_products);
        while ($row_product = mysqli_fetch_array($result_products)) {
            $product_price = $row_product['product_price'];
            $product_price_array = array($product_price * $quantity);
            $product_value = array_sum($product_price_array);
            $total += $product_value;
        }
    }
    echo $total;
}
?>
    <!-- NAVBAR -->
<div class="navigation">
  <section class="header">
    <div class="container-fluid">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-9">
          <a href="index.php"><img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" width="100%" height="auto"></a>
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
            <a class="nav-link" href="./index.php">Home</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?all_products">All Products</a>
              <a class="dropdown-item" href="index.php?all_promos">All Promos</a>
            </div>


          <li class="nav-item">
            <a class="nav-link" href="./hub.php #Announcement">Announcement</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./hub.php #aboutUs">About Us</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Contact Us</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="inquiries.php #appform">Join Us - Franchise</a>
              <a class="dropdown-item" href="feedback.php #feedback">Product Feedback</a>
              <a class="dropdown-item" href="complaints.php #complaints">Complaints</a>
              <a class="dropdown-item" href="job_application.php #jobApp">Job Application</a>
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
      <a class="nav-link" href="#">'.$firstName.'</a>
    </li>
';
    }?>

<?php if(isset($_SESSION['email'])){
            echo'
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">    <i class="bi bi-person-fill" style="font-size:25px;"></i></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./user_area/edit_account.php">Edit Account</a>
                <a class="dropdown-item" href="./user_area/view_orders.php">View Orders</a>
                <a class="dropdown-item" href="./user_area/change_password.php">Change Password</a>
                <a class="dropdown-item" href="./user_area/logout.php">Logout</a>
            </div>
          </li>
          ';
          } ?>


          <?php if (!isset($_SESSION['email'])) {
            echo '
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
             <i class="bi bi-person-fill" style="font-size:25px;"></i></a>
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
          <a class="nav-link" href="index.php?cart"><i class="bi bi-cart-plus-fill" style="font-size:25px;">'; ?>
          
         <?php   echo cart_items();?>

         <?php
         echo' 
          </i></a>
        </li>
          ';} ?>


<?php if (!isset($_SESSION['email'])) {
            echo'
     <li class="nav-item">
          <a class="nav-link" href="#"><i class="bi bi-cart-plus-fill" style="font-size:25px;">
          </i></a>
        </li>
          ';} ?>

  </ul>

        </div>
        </div>
        </div>

    <!-- NAVBAR -->


  <?php if (isset($_GET['all_products'])) {
    include './shop/all_products.php';
  } 

  elseif (isset($_GET['all_promos'])) {
    include './shop/all_promos.php';
  } 

  elseif (isset($_GET['cart'])) {
        include ('./shop/cart.php');
  }

  elseif(isset($_GET['checkout'])){
      $email = $_SESSION['email'];
      $select_query = "SELECT * FROM cart_details JOIN user_details WHERE cart_details.user_id = user_details.user_id AND `email`='$email'";
      $result_query = mysqli_query($conn, $select_query);
      $count_cart_items = mysqli_num_rows($result_query);

      if ($count_cart_items == 0) {
        header("Location:./shop/cart.php");
      } else {
        include ('./shop/payment.php');
      }
  }

  elseif (isset($_GET['view_orders'])) {
    include './user_area/view_orders.php';
  } 

  elseif (isset($_GET['view_cancelled_orders'])) {
    include './user_area/view_cancelled_orders.php';
  } 

  elseif (isset($_GET['view_received_orders'])) {
    include './user_area/view_received_orders.php';
  } 
  elseif (isset($_GET['view_for_delivery'])) {
    include './user_area/view_for_delivery.php';
  } 


  elseif (isset($_GET['add_to_cart'])) {
    include './add_to_cart.php';
  } 

  elseif (isset($_GET['product_description'])) {
    include './shop/product_description.php';
  } 


  else {
    echo '
        <div class="container-fluid" style="width: 90%;">
    <div class="row">
      <div class="col-lg-8 mb-3">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block w-100" src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      <div class=" col-lg-4" id="contactUs">
        <div class="contacts container-fluid">
          <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" width="100%" height="100%">
        </div>
        <div class="contacts container-fluid " style=" margin-top: 20px;">
          <img src="https://lh3.googleusercontent.com/drive-viewer/AAOQEORwsoHzWxoEoNlJ4n1bR4aji_r7jA7WPbQOMth5REabik_rDa7pptnu1lFtHraszS04eNS4JYmXW5SNTKBZsK4H7D2vRg=s1600?fbclid=IwAR3h2V1bSwN87w2jWtMFhMPDet3eL-U8KSNIyguxKKjN3oRmny296FI5G8s" width="100%" height="100%">
        </div>
      </div>
    </div>
  </div>';
    include './shop/top_products.php';
  } ?>

  </div>
  </div>

  <button
        type="button"
        class="btn btn-floating btn-lg p-3 text-center"
        id="btn-back-to-top" 
        style="position:fixed; bottom: 30px; right: 20px; height: 35px; width:35px; display:none; background-color:#439D9E; border-radius:50%; font-size:23px;"
        >
        <i class="bi bi-arrow-up" style="position:fixed; bottom: 27px; right: 20px; height: 38px; width:35px;"></i>
</button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"> You are not logged in. Do you want to login? </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success"><a class="text-light text-decoration-none" href="./user_area/login.php">YES</a></button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><a href="index.php" class="text-light text-decoration-none">NO</a></button>
          </div>
        </div>
      </div>
    </div>
  <script>
    $(document).ready(function()
{
    $('.add-to-cart-button').on('click', function () {
      var product_id = $(this).data('id');
      $.ajax({
        url: 'add_to_cart.php',
        method: 'GET',
        data: { product_id: product_id },
        success: function (data) {
          $(document).ajaxStop(function(){
            window.location.reload();
            });
        }
      })
    })
  }
);
</script>

<script>
  //Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 20 ||
    document.documentElement.scrollTop > 20
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

   
          

</body>

<footer style=" width: 90%; margin-top:10px; margin-bottom: 20px; margin-right: auto; margin-left: auto; background-color: #439D9E; border-radius: 5px;">
    <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2); margin-top:20px; margin-bottom: 20px;  border-radius: 5px;">
      © 2023 Copyright: <a class="text-white" href="https://Frozenhub.com/">Frozenhub.com</a>
    </div>
  </footer>
</html>   





