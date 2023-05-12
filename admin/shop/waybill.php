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
          </table> '; 
?>
    <h3>Items:</h3>
      
    <table class="table" style="border-bottom:gray solid 1px;">
    <thead>
    <th>Product Code</th>
    <th>Product Name</th>
    <th>Quantity</th>
    <th>Price</th>
    </thead>
    <tbody>
    <?php

    $items= "SELECT * FROM items JOIN products WHERE items.product_code = products.product_code AND `order_id` = $order_id AND `user_id` = $user_id";
    $items_result = mysqli_query($conn,$items); 
    while($row = mysqli_fetch_array($items_result)){
    $product_title = $row['product_title'];
    $product_code = $row['product_code'];
    $product_quantity = $row['quantity'];
    $product_price = $row['product_price'];

    echo'
      <tr>
        <td>' .$product_code.'</td>
        <td>' . $product_title . '</td>
        <td>'.$product_quantity.'</td>
        <td>'.$product_price.'</td>';
    }
    }
}
?>
  </tr>
    </tbody>
    </table> 
    <button id="print-btn" class="btn btn-info" onclick="window.print()">Way Bill</a></button>
    <style>
  @media print {
    #print-btn {
      display: none;
    }
  }
</style>