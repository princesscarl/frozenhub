<?php

function cart_items()
{
    global $conn;
    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $select_query = "SELECT * FROM cart_details JOIN user_details WHERE cart_details.user_id = user_details.user_id AND `email`='$email'";
        $result_query = mysqli_query($conn, $select_query);
        $count_cart_items = mysqli_num_rows($result_query);

        if ($count_cart_items == 0) {
            $count_cart_items = 0;
            echo $count_cart_items;
        } else {
            echo $count_cart_items;
        }
    }
}


function total_cart_price()
{
    global $conn;

    $user_id = $_SESSION['user_id'];
    $total = 0;
    $select_cart = "SELECT * FROM cart_details WHERE `user_id`= $user_id";
    $result_cart = mysqli_query($conn, $select_cart);
    while ($row = mysqli_fetch_array($result_cart)) {
        $quantity = $row['quantity'];
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM products WHERE `product_id` = $product_id";
        $result_products = mysqli_query($conn, $select_products);
        while ($row_product = mysqli_fetch_array($result_products)) {
            $product_price = $row_product['product_price'];
            $product_price_array = array($product_price * $quantity);
            $product_value = array_sum($product_price_array);
            $total += $product_value;
        }
    }
    echo $total;
}



function getproducts()
{
    include './shop/category.php';
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
            $product_price = $row['product_price'];
            $product_image = $row['product_image'];
            echo "

  <div class='col-lg-3 col-md-3 col-sm-6 col-xs-1 d-flex justify-content-center mb-4'>
    <div class='card' style='width: 18rem;'>
    <img src='./admin/products_images/$product_image' class='card-img-top'>
    <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_description</p>
    <p class='card-text'><strong>Price:&nbsp$product_price</strong></p>"; ?>
<?php

            if (isset($_SESSION['email'])) {
                $user_id = $_SESSION['user_id'];
                $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$product_id";
                $result_query = mysqli_query($conn, $select_query);
                $rows = mysqli_num_rows($result_query);
        
                if ($rows == 0) {
                echo "
                <form id='add-to-cart-form'>
                <input type='hidden' name='product_id' value='$product_id'>
                <button  id='add-to-cart-button' type='button' class='btn btn' style='background-color: #439D9E; color: white;'>Add to Cart</button>
                </form>";
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
    echo'
<nav aria-label="Page navigation example" >
  <ul class="pagination justify-content-end"  >
    <li class="page-item disabled" style="border-style: solid;">
      <a class="page-link" href="#" tabindex="-1" style="background-color: #439D9E; color: white;">Previous</a>
    </li>
    <li class="page-item"  style="border-style: solid;" ><a class="page-link" href="#">1</a></li>
    <li class="page-item"  style="border-style: solid;"><a class="page-link" href="#">2</a></li>
    <li class="page-item"  style="border-style: solid;"><a class="page-link" href="#">3</a></li>
    <li class="page-item" style="border-style: solid;" >
      <a class="page-link" href="#" style="background-color: #439D9E; color: white; ">Next</a>
    </li>
  </ul>
</nav>
';

}


?>