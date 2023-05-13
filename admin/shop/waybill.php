<!DOCTYPE html>
<html lang="en">
<head>
    <title>Responsive Bootstrap Invoice Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Override some Bootstrap CDN styles - normally you should apply these through your Bootstrap variables / sass -->
    <style>
        body { font-family: "Roboto", serif; font-size: 0.8rem; font-weight: 400; line-height: 1.4; color: #000000; }
        h1, h2, h4, h5 { font-weight: 700; color: #000000; }
        h1 { font-size: 2rem; }
        h2 { font-size: 1.6rem; }
        h4 { font-size: 1.2rem; } 
        h5 { font-size: 1rem; }
        .table { color: #000; }
        .table td, .table th { border-top: 1px solid #000; }
        .table thead th { vertical-align: bottom; border-bottom: 2px solid #000; }

        @page {
            margin-bottom: 2.5cm;
        }

        @page :first {
            margin-top: 0;
            margin-bottom: 2.5cm;
        }
    </style>

</head>
<body>

<div style="background-color: #000000; height: 10px;"></div>

<div class="container-fluid pt-2 pt-md-4 px-md-5">

    <!-- Invoice heading -->

    <table class="table table-borderless">
        <tbody>
        <tr>
            <td class="border-0">
                <div class="row">
                    <div class="col-md text-center text-md-left mb-3 mb-md-0">
                        <img class="logo img-fluid mb-3" src="../products_images/Logo.jpg" style="max-height: 140px;"/>
                        <br>

                        <h2 class="mb-1">Frozenhub Co.</h2>
              <i class="bi bi-telephone" style="font-size: 1em;"></i><a class="text-decoration-none"> 0962 071 8415</a> <br>
              <i class="bi bi-envelope" style="font-size: 1em;"></i><a  href="frozenhubhr@gmail.com" class="text-decoration-none"> frozenhubhr@gmail.com</a> <br>
              <i class="bi bi-facebook" style="font-size: 1em;"></i><a href="https://www.facebook.com/FrozenHubco" class="text-decoration-none"> FrozenHub</a> <br>
              <i class="bi bi-instagram" style="font-size: 1em;"></i><a  href="https://www.instagram.com/frozenhub_official/" class="text-decoration-none"> frozenhub_official</a>
                    </div>

                    <div class="col text-center text-md-right">

                        <!-- Dont' display Bill To on mobile -->
                        <span class="d-none d-md-block">
                            <h1>Billed To</h1>
                        </span>

                        <?php 
include '../connect.php';


if(isset($_GET['order_id']) && isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];
    $order_id = $_GET['order_id'];


    $waybill = "SELECT * FROM order_details JOIN user_details WHERE order_details.order_id = $order_id AND user_details.user_id = $user_id";
    $waybill_result = mysqli_query($conn,$waybill);
    while($rows = mysqli_fetch_array($waybill_result)){
        $fname = $rows["fname"];
        $lname = $rows["lname"];  
        $email = $rows["email"];
        $mobile = $rows["user_mobile"];
        $address = $rows["user_address"];
        $province = $rows["user_province"];
        $city = $rows["user_city"];
        $zip = $rows["user_zip"];
?>
                        <h4 class="mb-0"><?php echo $fname?> &nbsp <?php echo $lname ?></h4>
                        <?php echo $mobile ?> </br>
                        <?php echo $address?><br/>
                        <?php echo $city?>, &nbsp <?php echo $province ?>,&nbsp <?php echo $zip ?><br/>
                       <?php echo $email ?><br/>

  <?php }
  
  ?>

                        <h5 class="mb-0 mt-3"><?php $timestamp = time();
                        echo date("F j, Y",$timestamp)?></h5>
                    </div>
                </div>
            </td>
        </tr>
        </tbody>
    </table>

    <!-- Invoice items table -->

    <table class="table">
        <thead>
        <tr>
            <th>Summary</th>
            <th class="text-right">Price</th>
        </tr>
        </thead>
        <tbody>

        <?php
$total=0;
$items= "SELECT * FROM items JOIN products WHERE items.product_code = products.product_code AND `order_id` = $order_id AND `user_id` = $user_id";
$items_result = mysqli_query($conn,$items); 
while($row = mysqli_fetch_array($items_result)){
$product_title = $row['product_title'];
$product_code = $row['product_code'];
$product_quantity = $row['quantity'];
$product_price = $row['product_price'];
$product_price_array = array($product_price * $product_quantity);
$product_value = array_sum($product_price_array);
$total += $product_value;

?>

        <tr>
            <td>
                <h5 class="mb-1"><?php echo $product_title?></h5>
                Quantity: <?php echo $product_quantity?>x
            </td>
            <td class="font-weight-bold align-middle text-right text-nowrap">₱<?php echo $product_price ?>.00</td>
        </tr>
     <?php }} ?>  
     <tr>
            <td colspan="2" class="text-right border-0 pt-4"><h5>₱<?php echo $total?>.00</h5></td>
        </tr>
    </table>

    <!-- Thank you note -->

    <h5 class="text-center pt-2">
        Thank you for your purchase!
    </h5>

    <div class="text-right">
    <button id="print-btn" class="btn btn-info" onclick="window.print()">Print</button>
    <button id="back-btn" class="btn btn-secondary" onclick="window.location.href = document.referrer">Back</button>

</div>
    <style>
  @media print {
    #print-btn {
      display: none;
    }
    #back-btn {
      display: none;
    }
  }
</style>
</div>
</body>
