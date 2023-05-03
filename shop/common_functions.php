<?php

function getproducts()
{
//     if(isset($_GET['all_products']) || isset($_GET['all_promos'])){

//     include './shop/category.php';
//         }
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
            echo "

  <div class='col-lg-3 col-md-3 col-sm-6 col-xs-1 d-flex justify-content-center mb-4'>
    <div class='card' style='width: 100%;'>
    <img src='./admin/products_images/$product_image' class='card-img-top'  width='auto;' height='250px;' 'object-fit= cover;'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
  
    <p class='card-text'><strong>Price:&nbsp$product_price</strong></p>
";?>

  <div id="description">
  <p class="description">
    <span class="short_description"><?php echo $short_description; ?></span>
    <span class="full_description" style="display: none;"><?php echo $full_description; ?></span>
  </p>
  <a class="view_more_button" onclick="toggleDescription(this)" >View More...</a>
</div>

  
<?php

            if (isset($_SESSION['email'])) {
                $user_id = $_SESSION['user_id'];
                $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$product_id";
                $result_query = mysqli_query($conn, $select_query);
                $rows = mysqli_num_rows($result_query);
        
                if ($rows == 0) {
                echo "
          <button class='btn add-to-cart-button mt-3' data-id='$product_id' type='button' class='btn btn' style='background-color: #439D9E; color: white;'>Add to Cart</button>
                ";
                }

    // <a href='index.php?add_to_cart=$product_id' class='btn btn' style='background-color: #439D9E; color: white;'>Add to Cart</a>";

                else{
                    echo" 
    <a href='index.php?cart' class='btn btn-warning  mt-3'>View Cart</a>";
                }



                echo "
    </div>
    </div>
    </div> 
";
            } ?> 
<?php
            if (!isset($_SESSION['email'])) {
                echo "
<a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info'>Add to Cart</a>    
</div>
</div>
</div> 
";
            }
        }
    }
//     echo'
// <nav aria-label="Page navigation example" >
//   <ul class="pagination justify-content-end"  >
//     <li class="page-item disabled" style="border-style: solid;">
//       <a class="page-link" href="#" tabindex="-1" style="background-color: #439D9E; color: white;">Previous</a>
//     </li>
//     <li class="page-item"  style="border-style: solid;" ><a class="page-link" href="#">1</a></li>
//     <li class="page-item"  style="border-style: solid;"><a class="page-link" href="#">2</a></li>
//     <li class="page-item"  style="border-style: solid;"><a class="page-link" href="#">3</a></li>
//     <li class="page-item" style="border-style: solid;" >
//       <a class="page-link" href="#" style="background-color: #439D9E; color: white; ">Next</a>
//     </li>
//   </ul>
// </nav>
// ';

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

            $short_description = substr($product_description, 0, 23);
            $full_description = substr($product_description, 23);

            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
            echo "

  <div class='col-lg-3 col-md-3 col-sm-6 col-xs-1 d-flex justify-content-center mb-4'>
    <div class='card' style='width: 18rem;'>
    <img src='./admin/products_images/$product_image' class='card-img-top'  width='auto;' height='250px;'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
";?>

  <div id="description">
  <p class="description">
    <span class="short_description"><?php echo $short_description; ?></span>
    <span class="full_description" style="display: none;"><?php echo $full_description; ?></span>
  </p>
  <button class="view_more_button" onclick="toggleDescription(this)">View More</button>
</div>

  <?php echo "
    <p class='card-text'><strong>Price:&nbsp$product_price</strong></p>"; ?>
<?php

            if (isset($_SESSION['email'])) {
                $user_id = $_SESSION['user_id'];
                $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$product_id";
                $result_query = mysqli_query($conn, $select_query);
                $rows = mysqli_num_rows($result_query);
        
                if ($rows == 0) {
                echo "
          <button class='btn add-to-cart-button' data-id='$product_id' type='button' class='btn btn' style='background-color: #439D9E; color: white;'>Add to Cart</button>
                ";
                }

    // <a href='index.php?add_to_cart=$product_id' class='btn btn' style='background-color: #439D9E; color: white;'>Add to Cart</a>";

                else{
                    echo" 
    <a href='index.php?cart' class='btn btn-warning'>View Cart</a>";
                }



                echo "
    </div>
    </div>
    </div> 
";
            } ?> 
<?php
            if (!isset($_SESSION['email'])) {
                echo "
<a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info'>Add to Cart</a>    
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

            $short_description = substr($product_description, 0, 23);
            $full_description = substr($product_description, 23);

            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
            echo "

  <div class='col-lg-3 col-md-3 col-sm-6 col-xs-1 d-flex justify-content-center mb-4'>
    <div class='card' style='width: 18rem;'>
    <img src='./admin/products_images/$product_image' class='card-img-top'  width='auto;' height='250px;'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
";?>

  <div id="description">
  <p class="description">
    <span class="short_description"><?php echo $short_description; ?></span>
    <span class="full_description" style="display: none;"><?php echo $full_description; ?></span>
  </p>
  <button class="view_more_button" onclick="toggleDescription(this)">View More</button>
</div>

  <?php echo "
    <p class='card-text'><strong>Price:&nbsp$product_price</strong></p>"; ?>
<?php

            if (isset($_SESSION['email'])) {
                $user_id = $_SESSION['user_id'];
                $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$product_id";
                $result_query = mysqli_query($conn, $select_query);
                $rows = mysqli_num_rows($result_query);
        
                if ($rows == 0) {
                echo "
          <button class='btn add-to-cart-button' data-id='$product_id' type='button' class='btn btn' style='background-color: #439D9E; color: white;'>Add to Cart</button>
                ";
                }

    // <a href='index.php?add_to_cart=$product_id' class='btn btn' style='background-color: #439D9E; color: white;'>Add to Cart</a>";

                else{
                    echo" 
    <a href='index.php?cart' class='btn btn-warning'>View Cart</a>";
                }



                echo "
    </div>
    </div>
    </div> 
";
            } ?> 
<?php
            if (!isset($_SESSION['email'])) {
                echo "
<a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info'>Add to Cart</a>    
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

            $short_description = substr($product_description, 0, 23);
            $full_description = substr($product_description, 23);

            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
            echo "

  <div class='col-lg-3 col-md-3 col-sm-6 col-xs-1 d-flex justify-content-center mb-4'>
    <div class='card' style='width: 18rem;'>
    <img src='./admin/products_images/$product_image' class='card-img-top'  width='auto;' height='250px;'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
";?>
<!-- <div id="description">
  <p class="short_description">
    <?php echo $short_description; ?>
  </p>
  <p class="full_description" style="display: none;"><?php echo $full_description; ?></p>
  <button class="view_more_button" onclick="toggleDescription(this)">View More</button>
  </div> -->
  <div id="description">
  <p class="description">
    <span class="short_description"><?php echo $short_description; ?></span>
    <span class="full_description" style="display: none;"><?php echo $full_description; ?></span>
  </p>
  <button class="view_more_button" onclick="toggleDescription(this)">View More</button>
</div>

  <?php echo "
    <p class='card-text'><strong>Price:&nbsp$product_price</strong></p>"; ?>
<?php

            if (isset($_SESSION['email'])) {
                $user_id = $_SESSION['user_id'];
                $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$product_id";
                $result_query = mysqli_query($conn, $select_query);
                $rows = mysqli_num_rows($result_query);
        
                if ($rows == 0) {
                echo "
          <button class='btn add-to-cart-button' data-id='$product_id' type='button' class='btn btn' style='background-color: #439D9E; color: white;'>Add to Cart</button>
                ";
                }

    // <a href='index.php?add_to_cart=$product_id' class='btn btn' style='background-color: #439D9E; color: white;'>Add to Cart</a>";

                else{
                    echo" 
    <a href='index.php?cart' class='btn btn-warning'>View Cart</a>";
                }



                echo "
    </div>
    </div>
    </div> 
";
            } ?> 
<?php
            if (!isset($_SESSION['email'])) {
                echo "
<a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info'>Add to Cart</a>    
</div>
</div>
</div> 
";
            }
        }
    }

}




?>



