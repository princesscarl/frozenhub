<div class="container-fluid">
  <h1 class="text-center" style="padding: 20px; font-weight:bold">For Delivery</h1>

  <a href="index.php?view_orders" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">All Orders</a>
  <a href="index.php?view_approved" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">Approved</a>
  <a href="index.php?view_delivery" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">For Delivery</a>
  <a href="index.php?view_cancel" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">Cancelled</a>
  <a href="index.php?view_complete" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">Delivered</a>
  <a href="./shop/all_waybill.php" onclick="printAllWaybill(event)" class="btn btn-success p-2 py-2 border-0 text-decoration-none text-light mb-3" style="float: right;">Print All Way Bill</a>


  <table id="table" class="table table-stripped table-bordered">
  <thead style="background-color: #61b0b7;">
        <tr>
            <th> User ID </th>
            <th> Order ID </th>
            <th> Invoice Number</th>
            <th colspan ="2"> Total Products </th>
            <th> Amount </th>
            <th> Order Date </th>  
            <th> Status </th>
            <th> Action </th>
        </tr>
    </thead>
    <tbody>
    <?php
  
                    $category_query="SELECT * FROM order_details WHERE `status` ='For Delivery' ";
                    $result_category= mysqli_query($conn,$category_query);
                    while($row = mysqli_fetch_assoc($result_category)) {
                      $user_id = $row['user_id'];
                      $order_id = $row['order_id'];
                      $invoice = $row['invoice'];
                      $date = $row['date'];
                      $items = $row['items'];
                      $status = $row['status'];
                      $total = $row['amount'];

                      echo'
                    <tr>
                        <td>'. $user_id .'</td>
                        <td>'.$order_id.'</td>
                        <td>'.$invoice .'</td>
                        <td>'. $items.'</td>
                        <td><a href="./shop/fetch_orders.php?order_id='.$order_id.'" class="text-decoration-none text-info">View items</a></td>
                        <td>'. $total.'</td>
                        <td>'.  $date.'</td>
                        <td>'. $status.'</td>

                        <td>
                        <button class="btn btn-info" type="button" onclick="printWaybill(event)">
                        <a href="./shop/waybill.php?order_id='.$order_id.'&user_id='.$user_id.'" class="text-light text-decoration-none">Way Bill</a>
                    </button>
                    
                        </td>
                    ';}?>
    </tbody>
        </table>

        <script>
                    function printWaybill(event) {
                      event.preventDefault(); // prevent the link from opening in the current window
                      var waybillWindow = window.open(event.target.href, '_blank'); // open the waybill page in a new window
                      waybillWindow.onload = function() { // wait for the waybill page to finish loading
                        waybillWindow.print(); // print the waybill page
                      }
                    }

                    function printAllWaybill(event) {
                      event.preventDefault(); // prevent the link from opening in the current window
                      var waybillWindow = window.open(event.target.href, '_blank'); // open the waybill page in a new window
                      waybillWindow.onload = function() { // wait for the waybill page to finish loading
                        waybillWindow.print(); // print the waybill page
                      }
                    }
                    </script>