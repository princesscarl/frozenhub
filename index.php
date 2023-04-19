<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Frozenhub</title>
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
  




  <style>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      display: none;
    }
  </style>

</head>

<body style="font-family: 'Poppins', sans-serif; background-color: rgb(247, 247, 247);">
  <?php include 'navbar.php'; ?>

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
      // $email = $_SESSION['email'];
      // $select_query = "SELECT * FROM cart_details JOIN user_details WHERE cart_details.user_id = user_details.user_id AND `email`='$email'";
      // $result_query = mysqli_query($conn, $select_query);
      // $count_cart_items = mysqli_num_rows($result_query);

      // if ($count_cart_items == 0) {
      //   header("Location:./shop/cart.php");
      // } else {
        include ('./shop/payment.php');
      }
  // }

  elseif (isset($_GET['view_orders'])) {
    include './user_area/view_orders.php';
  } 

  elseif (isset($_GET['add_to_cart'])) {
    include './add_to_cart.php';
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
  <footer style=" width: 90%; margin-top:10px; margin-bottom: 20px; margin-right: auto; margin-left: auto; background-color: #439D9E; border-radius: 5px;">
    <div class="text-center text-white p-3" style="background-color: rgba(0, 0, 0, 0.2); margin-top:20px; margin-bottom: 20px;  border-radius: 5px;">
      © 2023 Copyright: <a class="text-white" href="https://Frozenhub.com/">Frozenhub.com</a>
    </div>
  </footer>

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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
      
      // $(document).ready(function() {
      //     $('#add-to-cart-form').click(function() {
      //         var product_id = $('input[name="product_id"]').val();
      //         $.ajax({
      //             type: 'POST',
      //             url: 'add_to_cart.php',
      //             data: { product_id: product_id },
      //             // success: function(data) {
      //             //     alert('Product added to cart!');
      //             }
      //         // }
      //             );
      //     });
      // });
      // $(document).ready(function(){
      //   $("#add-to-cart-form").submit(function(event){
      //       var product_id =  $('input[name="product_id"]').val();
      //       $.POST("add_to_cart.php", product_id, functon(response)
      //       {
      //         alert(product_id);
      //       })
      //       return false;
      //   });
      // });
</script>
   
          

</body>
</html>   





