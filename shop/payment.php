<?php

if(isset($_SESSION['email'])){

$user_id = $_SESSION['user_id'];


if (isset($_POST['submit-btn'])) {
  $invoice =  mt_rand(10000, 99999);

  $total = 0;
  for ($i = 0; $i < $count_cart_items; $i++) {
    $price = $_POST['price'][$i];
    $quantity = $_POST['quantity'][$i];
    $total +=  $price * $quantity;
  }

  $order_query = "INSERT INTO order_details(`user_id`,`invoice`,`date`,`status`, `items`,`amount`) 
  VALUES ('$user_id','$invoice',now(), 'Pending', ' $count_cart_items','$total')";
  $result_query = mysqli_query($conn, $order_query);
 
    // Retrieve the submitted form data
    $orders = $_POST['order'];
    $products = $_POST['product'];
    $quantities = $_POST['quantity'];
if($result_query){
      // Prepare the SQL statement with placeholders for each value
      $sql = 'INSERT INTO items (`user_id`, `order_id`, `product_code`, `quantity`) VALUES (?, ?, ?, ?)';
      $stmt = mysqli_prepare($conn, $sql);

      // Loop through the arrays and execute the SQL statement for each set of values
      for ($i = 0; $i < $count_cart_items; $i++) {
      mysqli_stmt_bind_param($stmt, 'iiii', $user_id, $orders[$i], $products[$i], $quantities[$i]);
      mysqli_stmt_execute($stmt);
      }

}
    
    
    if ($stmt) {
      $delete_query = "DELETE FROM cart_details WHERE `user_id`=$user_id";
      $result_delete = mysqli_query($conn, $delete_query);
      echo "<script> alert('Order Confirmed!'); window.location.href = './user_area/view_orders.php'; </script>";
    } else {
      echo "<script> alert ('ERROR') </script>";
    }

        // Close the prepared statement and database connection
        mysqli_stmt_close($stmt);
    
  }



?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <link rel="stylesheet" href="../style.css">

  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">


</head>

<body class="bg-light">


  <div class="container mt-3">
    <h2 class="text-center"> Check Out </h2>
    <p class="text-center">Select one of payment methods:</p>

    <div class="text-center">
      <a href="index.php?checkout=cod" class="btn btn-info btn-lg mb-3" style="width: 20%; height:auto;"> Cash on Delivery</a> <br>
      <a href="index.php?checkout=gcash" class="btn btn-outline-info btn-lg mb-5" style="width: 20%; height:auto;"> Gcash</a> <br>
    </div>
  </div>

  <?php
  if (isset($_GET['checkout'])) {
    $cod = $_GET['checkout'];
    if (($cod == "cod") ||  ($cod == "gcash")) {
      $user_query = "SELECT * FROM user_details WHERE `user_id` = $user_id";
      $result = mysqli_query($conn, $user_query);
      $rows = mysqli_fetch_assoc($result);

      $fname = $rows["fname"];
      $lname = $rows["lname"];
      $email = $rows["email"];
      $mobile = $rows["user_mobile"];
      $address = $rows["user_address"];
      $province = $rows["user_province"];
      $city = $rows["user_city"];
      $zip = $rows["user_zip"];

      echo '
        <div class="container" style="width:80%;background-color: #f2f2f2; border: gray solid 2px;">
        <br>
        <h3>Personal Information:</h3>

        <table class="table" style="border-bottom:gray solid 1px;">
          <tr>
            <th>Name:</th>
            <td>' . $fname . ' &nbsp' . $lname . '</td>
          </tr>

          <tr>
            <th>Telephone:</th>
            <td>' . $mobile . '</td>
          </tr>

          <tr>
            <th>Address:</th>
            <td>' . $address . ' <br>' . $province . ' ' . $city . ' ' . $zip . '</td>
          </tr>
        </table> '; ?>

      <h3>Cart details:</h3>

      <table class="table" style="border-bottom:gray solid 1px;">
        <tr>
          <th>Product Title</th>
          <th>Price</th>
          <th>Quantity</th>
          <th> </th>

        </tr>
        <tr>

          <?php
          $cart_query = "SELECT * FROM cart_details WHERE `user_id`=$user_id";
          $result = mysqli_query($conn, $cart_query);
          while ($row = mysqli_fetch_array($result)) {

            $product_code = $row['product_code'];
            $select_products = "SELECT * FROM products JOIN cart_details WHERE products.product_code=$product_code AND cart_details.product_code=$product_code AND `user_id` = $user_id";
            $result_products = mysqli_query($conn, $select_products);


            while ($row = mysqli_fetch_array($result_products)) {
              $product_id = $row['product_id'];
              $product_code = $row['product_code'];
              $product_title = $row['product_title'];
              $product_price = $row['product_price'];
              $product_quantity = $row['quantity'];


              //ID
              $insert_id = "SELECT * FROM order_details ORDER BY order_details.order_id DESC LIMIT 1";
              $result_id = mysqli_query($conn, $insert_id);
              $row = mysqli_fetch_assoc($result_id);
              $order =  $row['order_id'];
              $order_id = $order + 1;

              echo '
      
      <form method="POST">
      
        <td> <input hidden name="product[]" value=' . $product_code .'>' . $product_title . '</td>
        <td><input hidden name="price[]" value=' . $product_price .' >' . $product_price . '</td>
        <td><input hidden name="quantity[]" value=' . $product_quantity .' >' . $product_quantity . '</td>
        <td><input hidden name="order[]" value=' . $order_id . '></td>

        </tr>
        ';
            }
          }
          ?>

      </table>



      <br>
      <h3>Product Total:</h3>
      <table class="table" style="border-bottom:gray solid 1px;">
        <tr>
          <th>Total:</th>
          <td><strong><?php echo total_cart_price()?></strong></td>


          <?php
  if (isset($_GET['checkout'])) {
    $cod = $_GET['checkout'];
    if ($cod == "cod") { ?>
          <td> <input type="button" value="CONFIRM PAYMENT" class="btn btn-info" data-toggle='modal' data-target='#confirm'></td>
    <?php }?>
    <?php
      if ($cod == "gcash") { ?>
       <td> <input type="button" value="PROCEED" class="btn btn-info" data-toggle='modal' data-target='#gcash'></td>
     <?php }}  ?>
  
        </tr>

      </table>



  <?php
    }
  }
 
}
else{
  echo '<script>window.location.href = "../user_area/login.php";</script>';

}

  ?>
</body>



<!-- Modal -->
<div class="modal fade" id="confirm" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Confirm your order! Upon confirming, please wait for us to contact you for verification purposes.</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="submit" name="submit-btn" class="btn btn-success">YES</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><a href="./index.php?cart" class="text-light text-decoration-none">NO</a></button>

      </div>
    </div>
  </div>
</div>
</form>



<!-- Modal -->
<div class="modal fade" id="gcash" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Gcash Payment Method</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="GET">
        <div class="mb-3">
       
          
            <label for="recipient-name" class="col-form-label">Amount:</label>
            <div class="input-group-prepend">
            <div class="input-group-text">₱</div>
            <input readonly type="text" class="form-control" name="fp-amount" value="<?php echo total_cart_price()?>">
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Mobile Number:</label>
            <input type="number" class="form-control" name="fp-mobile" value="">
</div>
</div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-danger" data-dismiss="modal"><a class="text-light text-decoration-none">NO</a></button>
        <a href="shop/gcash.php" class="btn btn-success"  class="text-light text-decoration-none" >YES</a>
      </div>
    </div>
  </div>
</div>
</form>