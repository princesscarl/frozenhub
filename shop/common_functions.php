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
          <a href="index.php?product_description=<?php echo $product_id?>"> <img src='./admin/products_images/<?php echo $product_image ?>' class='card-img-top product-image' alt='<?php echo $product_title ?>'>
          </div></a>
          <div class='card-body text-center'>
            <h5 class='card-title'><?php echo $product_title ?></h5>
            <p class='card-text'><strong>₱<?php echo $product_price ?></strong></p>


            <?php
            if (isset($_SESSION['email'])) {
              $user_id = $_SESSION['user_id'];
              $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$product_id";
              $result_query = mysqli_query($conn, $select_query);
              $rows = mysqli_num_rows($result_query);

              if ($rows == 0) {
                echo "
                <button class='btn add-to-cart-button mt-3' data-id='$product_id' style='background-color: #439D9E; color: white; width: 100%;'>
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
<a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info' style='background-color: #439D9E; color: white; width:100%;'>Add to Cart</a>    
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
        //     if(isset($_GET['all_products']) || isset($_GET['all_promos'])){

        //     include './shop/category.php';
        //         }
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
                <a href="index.php?product_description=<?php echo $product_id?>"> <img src='./admin/products_images/<?php echo $product_image ?>' class='card-img-top product-image' alt='<?php echo $product_title ?>'>
                </div></a>
                <div class='card-body text-center'>
                  <h5 class='card-title'><?php echo $product_title ?></h5>
                  <p class='card-text'><strong>₱<?php echo $product_price ?></strong></p>
      
      
                  <?php
                  if (isset($_SESSION['email'])) {
                    $user_id = $_SESSION['user_id'];
                    $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$product_id";
                    $result_query = mysqli_query($conn, $select_query);
                    $rows = mysqli_num_rows($result_query);
      
                    if ($rows == 0) {
                      echo "
                      <button class='btn add-to-cart-button mt-3' data-id='$product_id' style='background-color: #439D9E; color: white; width: 100%;'>
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
      <a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info' style='background-color: #439D9E; color: white; width:100%;'>Add to Cart</a>    
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
        //     if(isset($_GET['all_products']) || isset($_GET['all_promos'])){

        //     include './shop/category.php';
        //         }
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
                <a href="index.php?product_description=<?php echo $product_id?>"> <img src='./admin/products_images/<?php echo $product_image ?>' class='card-img-top product-image' alt='<?php echo $product_title ?>'>
                </div></a>
                <div class='card-body text-center'>
                  <h5 class='card-title'><?php echo $product_title ?></h5>
                  <p class='card-text'><strong>₱<?php echo $product_price ?></strong></p>
      
      
                  <?php
                  if (isset($_SESSION['email'])) {
                    $user_id = $_SESSION['user_id'];
                    $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$product_id";
                    $result_query = mysqli_query($conn, $select_query);
                    $rows = mysqli_num_rows($result_query);
      
                    if ($rows == 0) {
                      echo "
                      <button class='btn add-to-cart-button mt-3' data-id='$product_id' style='background-color: #439D9E; color: white; width: 100%;'>
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
      <a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info' style='background-color: #439D9E; color: white; width:100%;'>Add to Cart</a>    
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
        //     if(isset($_GET['all_products']) || isset($_GET['all_promos'])){

        //     include './shop/category.php';
        //         }
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
                <a href="index.php?product_description=<?php echo $product_id?>"> <img src='./admin/products_images/<?php echo $product_image ?>' class='card-img-top product-image' alt='<?php echo $product_title ?>'>
                </div></a>
                <div class='card-body text-center'>
                  <h5 class='card-title'><?php echo $product_title ?></h5>
                  <p class='card-text'><strong>₱<?php echo $product_price ?></strong></p>
      
      
                  <?php
                  if (isset($_SESSION['email'])) {
                    $user_id = $_SESSION['user_id'];
                    $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$product_id";
                    $result_query = mysqli_query($conn, $select_query);
                    $rows = mysqli_num_rows($result_query);
      
                    if ($rows == 0) {
                      echo "
                      <button class='btn add-to-cart-button mt-3' data-id='$product_id' style='background-color: #439D9E; color: white; width: 100%;'>
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
      <a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info' style='background-color: #439D9E; color: white; width:100%;'>Add to Cart</a>    
      </div>
      </div>
      </div> 
      ";
                  }
                }
              }
            }
      

?>


<!-- <div id="description">
  <p class="description"> -->
<!-- <span><strong>Product Description</strong></span> <br> -->
<!-- <span class="short_description"><?php echo $short_description; ?></span>
    <span class="full_description" style="display: none;"><?php echo $full_description; ?></span>
  </p>
  <a class="view_more_button" onclick="toggleDescription(this)" style="font-size: 15px; float:right;">View More...</a>
</div> -->
<!-- <div class="d-flex">
        <button id="decrementBtn">-</button>
        <input name="quantity" style="text-align: center;" value="1">
        <button id="incrementBtn">+</button>
      </div> -->