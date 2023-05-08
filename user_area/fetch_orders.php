<?php

session_start();
$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
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
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../style.css">

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

<!-- ICON-->
<link rel="icon" type="images/x-icon" href="https://lh4.googleusercontent.com/jvr_qqBAp9zQzSBzcTX51PygZYcNud6Kj6aBp4XxHeWVzYBIt0AWBGagulBvcnWdhB0=w2400">
</head>
<body>

<h1 class="text-center" id="reqsHeading" style="margin-bottom: 12px;padding-bottom: 8px;padding-top: 12px;">List of Items</h1>
<button type="button" onclick="window.history.back()"  aria-hidden="true"  class="fa fa-arrow-left ml-3  p-2  mb-3" ></button>
<table table id="table" class="table table-bordered  text-center" style="width:90%; margin:auto; border-collapse:collapse;">
<thead style="background-color: #61b0b7;">
        <tr>
            <th> Product</th>
            <th> Quantity </th>
        </tr>
    </thead>
    <tbody>

  <?php
  if(isset($_GET['order_id'])){
  $order_id = $_GET['order_id'];
  $user_id = $_SESSION['user_id'];
  $see_query= "SELECT * FROM items JOIN products 
  WHERE items.product_code = products.product_code
  AND `user_id`=$user_id AND `order_id` = $order_id";

  $result = mysqli_query($conn,$see_query);
  while($row = mysqli_fetch_array($result)){   
      
    $product_title = $row['product_title'];
    $product_quantity = $row['quantity'];

                      echo'
                    <tr>
                        <td>'.  $product_title .'</td>
                        <td>'. $product_quantity.'</td>      
                        
                    ';} }?>
    </tbody>
        </table>
    <tbody>

    <?php 
}
else{
  echo '<script>window.location.href=login.php";</script>';
}
?>

