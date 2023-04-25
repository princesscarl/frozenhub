<div class="container-fluid">
  <h1 class="text-center" style="padding: 20px; font-weight:bold">List of Users</h1>
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
            <th colspan="3"> Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
  
                    $category_query="SELECT * FROM order_details";
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
                        <button class="btn btn-success">
                        <a href="approved.php?id='.$order_id.'" class="text-light">Approved</a></button>
                        </td>
                        <td> 
                        <button class="btn btn-success">
                        <a href="delivery.php?id='.$order_id.'" class="text-light">Delivery</a></button>
                        </td>
                      
                       
                        
                    ';}?>
    </tbody>
        </table>