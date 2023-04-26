<?php 
  $email= $_SESSION['email'];
 
      if(isset($_POST['update-btn'])){
        $user_id = $_SESSION['user_id'];
        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];
        $update_cart = "UPDATE cart_details SET `quantity`='$quantity' WHERE `user_id`=$user_id AND `product_id` =$product_id";
        $result_update = mysqli_query($conn, $update_cart);

        $update_items = "UPDATE items SET `quantity`='$quantity' WHERE `user_id`=$user_id AND `product_id` =$product_id";
        $result_items = mysqli_query($conn, $update_items);

        }
  
              

?>

<!-- CART TABLE -->
<div class="container">
    <div class="row"> 
        <table class="table table-borderd text-center">
            <?php
            $user_id = $_SESSION['user_id'];
            $total=0;
            $cart_query="SELECT * FROM cart_details WHERE `user_id`=$user_id";
            $result = mysqli_query($conn,$cart_query);
            $result_count = mysqli_num_rows($result);
              if($result_count>0){
                echo "
                <thead>
                <tr>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Product Image</th>
                    <th>Quantity</th>
                    <th>Total Price </th>
                    <th>Update</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>";

            $result = mysqli_query($conn,$cart_query);
            while($row = mysqli_fetch_array($result)){
                $product_id = $row['product_id'];
                $select_products="SELECT * FROM products JOIN cart_details WHERE products.product_id=$product_id AND cart_details.product_id=$product_id AND `user_id` = $user_id";
                $result_products = mysqli_query($conn, $select_products);
                while($row = mysqli_fetch_array($result_products)){
                    $product_id=$row['product_id'];
                    $product_title = $row['product_title'];
                    $product_image = $row['product_image'];
                    $product_price = $row['product_price'];
                    $product_quantity = $row['quantity'];
                    $product_price_array=array($row['product_price']);
                    $product_value=array_sum($product_price_array);
            ?>

            <tr>
                <td><?php echo $product_title?> </td>
                <td><?php echo $product_price?></td>
                <?php echo "<td><img src='./admin/products_images/$product_image' width='50px;' height='50px;'></td>"; ?>
                <td>
                    <form action="" method="POST">
                        <input type ='number' name='quantity' id='quantity' value="<?php echo $product_quantity?>" class='form-input w-50'>
                        <input type="hidden" name="product_id" value="<?php echo $product_id?>">
                </td>

                <?php
                  if(isset($_POST['update-btn'])){
                    $user_id = $_SESSION['user_id'];
                    $product_id = $_POST['product_id'];
                    $quantity = $_POST['quantity'];
                    $update_cart = "UPDATE cart_details SET `quantity`='$quantity' WHERE `user_id`=$user_id AND `product_id` =$product_id";
                    $result_update = mysqli_query($conn, $update_cart);
                    if($result_update){
                      echo "<script> alert('Quantity of the item is updated.')</script> ";
                    }

                    }
                  }
                ?>
     
                <?php $total_price=$product_quantity*$product_price?>
                <td><?php echo $total_price?></td>

                <?php echo"
                <td> 
                <input type='submit' name='update-btn' class='btn btn-sm btn-primary'>
               </td>
                <td>
                <a href = './shop/delete_item.php?id=".$product_id."' class='text-danger'><i class='bi bi-x-circle'></i></a> 
                </td>";?>
                  <!-- <a href = '#' class='text-danger' data-toggle='modal' data-target='#exampleModal'><i class='bi bi-x-circle'></i></a>  -->
                </form>
               
                  <?php }}
                  
                
                    else{
                      echo "<h2> Cart is empty </h2>";
                    }
               
                  
                  ?>
            </tbody>    
        </table>


     
        <!-- SUBTOTAL -->
        <div class="d-flex mb-5">
            <h4 class="px-3"> Subtotal:<strong class="text-info">&nbsp <?php total_cart_price() ?></strong></h4>
            <a href="./index.php"  class="btn btn-info p-2 py-2 mr-2 border-0 text-decoration-none text-light">Continue Shopping</a>
       
          <a href="index.php?checkout" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light">Checkout</a>
       
        
    

        </div>

    </div>
</div>


 </form>




    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">    Are you sure you want to delete this item? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"><a class="text-light text-decoration-none" href="./shop/delete_item.php?id=<?php echo $product_id?>">YES</a></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><a href="index.php?cart.php" class="text-light text-decoration-none">NO</a></button>
       
      </div>
    </div>
  </div>
</div>

</body>
</html>

<!-- Bootstrap Script-->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</html>
