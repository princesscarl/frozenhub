<?php

function getproducts()
{
  global $conn;

  $products_query = "SELECT * FROM products ORDER BY date";
  $result_products = mysqli_query($conn, $products_query);
  $num_of_rows = mysqli_num_rows($result_products);

  if ($num_of_rows == 0) {
    echo "<h2 class='text-center text-danger'>No stock for this category.</h2>";
  } else {
    // 

    while ($row = mysqli_fetch_assoc($result_products)) {
      $product_id = $row['product_id'];
      $product_code = $row['product_code'];
      $product_title = $row['product_title'];
      $product_description = $row['product_description'];

      $short_description = substr($product_description, 0, 27);
      $full_description = substr($product_description, 27);

      $product_price = $row['product_price'];
      $product_image = $row['product_image'];
?>

    <div class="product-card mb-4 text-decoration-none">
        <div class='card' style='width: 100%;'>
          <div class="product-image-container">
         <img src='./admin/products_images/<?php echo $product_image ?>' class='card-img-top product-image' alt='<?php echo $product_title ?>'>
          </div>
          <div class='card-body text-center'>
          <a href="index.php?product_description=<?php echo $product_code?>" style="color:black;"> <h5 class='card-title'><?php echo $product_title ?></h5></a>
            <p class='card-text'><strong>₱<?php echo $product_price ?></strong></p>


            <?php
            if (isset($_SESSION['email'])) {
              $user_id = $_SESSION['user_id'];
              $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_code=$product_code";
              $result_query = mysqli_query($conn, $select_query);
              $rows = mysqli_num_rows($result_query);

              if ($rows == 0) {
                echo "
                <button class='btn add-to-cart-button mt-3' data-id='$product_code' style='background-color: #439D9E;   color: white; width: 100%;'>
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
<a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info add-to-cart-button' style='background-color: #439D9E; color: white; width:100%;'>Add to Cart</a>    
</div>
</div>
</div> 
";
            }
          }
        }
      }


      function top_products()
      {
        global $conn;

        $products_query = "SELECT * FROM products  WHERE category_id = '1' ORDER BY date";
        $result_products = mysqli_query($conn, $products_query);
        $num_of_rows = mysqli_num_rows($result_products);

        if ($num_of_rows == 0) {
          echo "<h2 class='text-center text-danger'>No stock for this category.</h2>";
        } else {
          // 

          while ($row = mysqli_fetch_assoc($result_products)) {
            $product_id = $row['product_id'];
            $product_code = $row['product_code'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
      
            $short_description = substr($product_description, 0, 27);
            $full_description = substr($product_description, 27);
      
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
      ?>
      
          <div class="product-card mb-4 text-decoration-none">
              <div class='card' style='width: 100%;'>
                <div class="product-image-container">
              <img src='./admin/products_images/<?php echo $product_image ?>' class='card-img-top product-image' alt='<?php echo $product_title ?>'>
                </div>
                <div class='card-body text-center'>
                <a href="index.php?product_description=<?php echo $product_code?>" style="color:black;"> <h5 class='card-title'><?php echo $product_title ?></h5></a>
                  <p class='card-text'><strong>₱<?php echo $product_price ?></strong></p>
      
      
                  <?php
                  if (isset($_SESSION['email'])) {
                    $user_id = $_SESSION['user_id'];
                    $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_code=$product_code";
                    $result_query = mysqli_query($conn, $select_query);
                    $rows = mysqli_num_rows($result_query);
      
                    if ($rows == 0) {
                      echo "
                      <button class='btn add-to-cart-button mt-3' data-id='$product_code' style='background-color: #439D9E; color: white; width: 100%;'>
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
      <a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info add-to-cart-button' style='background-color: #439D9E; color: white; width:100%;'>Add to Cart</a>    
      </div>
      </div>
      </div> 
      ";
                  }
                }
              }
            }
      

      function promo_products()
      {
       
        global $conn;

        $products_query = "SELECT * FROM products  WHERE category_id = '2' ORDER BY date";
        $result_products = mysqli_query($conn, $products_query);
        $num_of_rows = mysqli_num_rows($result_products);

        if ($num_of_rows == 0) {
          echo "<h2 class='text-center text-danger'>Apologies, we do not currently have any promotions available to offer at this time.</h2>";
        } else {
          // 

          while ($row = mysqli_fetch_assoc($result_products)) {
            $product_id = $row['product_id'];
            $product_code = $row['product_code'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
      
            $short_description = substr($product_description, 0, 27);
            $full_description = substr($product_description, 27);
      
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
      ?>
      
          <div class="product-card mb-4 text-decoration-none">
              <div class='card' style='width: 100%;'>
                <div class="product-image-container">
                   <img src='./admin/products_images/<?php echo $product_image ?>' class='card-img-top product-image' alt='<?php echo $product_title ?>'>
                </div>
                <div class='card-body text-center'>
                <a href="index.php?product_description=<?php echo $product_code?>" style="color:black;"> <h5 class='card-title'><?php echo $product_title ?></h5></a>
                  <p class='card-text'><strong>₱<?php echo $product_price ?></strong></p>
      
      
                  <?php
                  if (isset($_SESSION['email'])) {
                    $user_id = $_SESSION['user_id'];
                    $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_code=$product_code";
                    $result_query = mysqli_query($conn, $select_query);
                    $rows = mysqli_num_rows($result_query);
      
                    if ($rows == 0) {
                      echo "
                      <button class='btn add-to-cart-button mt-3' data-id='$product_code' style='background-color: #439D9E; color: white; width: 100%;'>
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
      <a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info add-to-cart-button' style='background-color: #439D9E; color: white; width:100%;'>Add to Cart</a>    
      </div>
      </div>
      </div> 
      ";
                  }
                }
              }
            }
      


      function search_products()
      {
        global $conn;
        $search_query = $_POST['all_products'];
        $products_query = "SELECT * FROM products  WHERE product_title LIKE '%$search_query%'";
        $result_products = mysqli_query($conn, $products_query);
        $num_of_rows = mysqli_num_rows($result_products);

        if ($num_of_rows == 0) {
          echo "<h2 class='text-center text-danger'>Apologies, we do not currently have any promotions available to offer at this time.</h2>";
        } else {
          // 

          while ($row = mysqli_fetch_assoc($result_products)) {
            $product_id = $row['product_id'];
            $product_code = $row['product_code'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
      
            $short_description = substr($product_description, 0, 27);
            $full_description = substr($product_description, 27);
      
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
      ?>
      
          <div class="product-card mb-4 text-decoration-none">
              <div class='card' style='width: 100%;'>
                <div class="product-image-container">
              <img src='./admin/products_images/<?php echo $product_image ?>' class='card-img-top product-image' alt='<?php echo $product_title ?>'>
                </div>
                <div class='card-body text-center'>
                <a href="index.php?product_description=<?php echo $product_code?>" style="color:black;"> <h5 class='card-title'><?php echo $product_title ?></h5></a>
                  <p class='card-text'><strong>₱<?php echo $product_price ?></strong></p>
      
      
                  <?php
                  if (isset($_SESSION['email'])) {
                    $user_id = $_SESSION['user_id'];
                    $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_code=$product_code";
                    $result_query = mysqli_query($conn, $select_query);
                    $rows = mysqli_num_rows($result_query);
      
                    if ($rows == 0) {
                      echo "
                      <button class='btn add-to-cart-button mt-3' data-id='$product_code' style='background-color: #439D9E; color: white; width: 100%;'>
                      Add to Cart</button>
                      </div>
                      </div> 
                      </div> "; }
                  
                      elseif($rows >=1) { 
                echo"
                <a href='index.php?cart' class='btn btn-warning mt-3 ' style='width: 100%;'>View Cart</a> 
              </div>
              </div> 
              </div> ";  } ?>
       
      
            <?php
                  }
                  if (!isset($_SESSION['email'])) {
                    echo "
      <a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info add-to-cart-button' style='background-color: #439D9E; color: white; width:100%;'>Add to Cart</a>    
      </div>
      </div>
      </div> 
      ";
                  }
                }
              }
            }
      

?>
