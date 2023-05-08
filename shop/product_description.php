<?php 
include './connect.php';

if(isset($_GET['product_description'])){
 $id = $_GET['product_description'];


 $products_query = "SELECT * FROM products  WHERE product_code = '$id'";
 $result = mysqli_query($conn,$products_query);
 $row = mysqli_fetch_assoc($result);

 $product_image = $row['product_image'];
 $product_title = $row['product_title'];
 $product_price = $row['product_price'];
 $product_description= $row['product_description'];
}
?>
<div class="home">
<a href="index.php" style="color:black;">Home</a>   &nbsp/
<a href="#" onclick="history.back()" style="margin-left:10px; color:black;">Back to Products</a>  &nbsp/
<a disabled href="#" style="margin-left:10px;color:gray;  text-decoratione-none;pointer-events: none;"><?php echo $product_title ?></a>  
</div>



<div style="width: 90%; margin-top:30px; margin-bottom: 30px; margin-right: auto; margin-left: auto; overflow: hidden; background-color:white;">

<div class="product-info p-2">
  <div class="product-image-column">
    <img src="./admin/products_images/<?php echo $product_image?>" alt="Product Image">
  </div>
  <div class="product-description-column pl-3">
    <h2 class="title" style="margin-top:25px;"><?php echo $product_title ?></h2>
    <h6 style="margin-top:50px;">Description:</h6>
    <textarea readonly class="description"><?php echo $product_description ?></textarea>

        <p class="price" style="margin-top: 25px;">₱<?php echo $product_price ?></p>
   

        
        <?php
                  if (isset($_SESSION['email'])) {
                    $user_id = $_SESSION['user_id'];
                    $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$id";
                    $result_query = mysqli_query($conn, $select_query);
                    $rows = mysqli_num_rows($result_query);
      
                    if ($rows == 0) {
                      echo "
                      <button class='btn add-to-cart-button mt-3' data-id='$id' style='background-color: #439D9E; color: white; width: 100%;'>
                      Add to Cart</button>
                      </div>
                      </div> 
                      </div> "; }
                  
                      elseif($rows >=1) { 
                echo"
                <a href='index.php?cart' class='btn btn-warning mt-3' style='width: 100%;'>View Cart</a> 
              </div>
              </div> 
              </div> ";  } ?>
       
      
            <?php
                  }
                  if (!isset($_SESSION['email'])) {
                    echo "
      <a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info' style='background-color: #439D9E; color: white; width:95%;'>Add to Cart</a>    
      </div>
      </div>
      </div> 
      ";
                  }
          ?>  
      
      </div>
    </div>
  </div>
</div>
