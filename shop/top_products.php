<div class="container-fluid" style="width: 90%;">
    <h2 style="text-align: center; font-weight: bold; padding:10px;">Top Products</h2>
    <div class='row d-flex'>

<?php
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
echo"
    
      <div class='col-lg-3 col-md-3 col-sm-6 col-xs-1'>
        <div class='card' style='width: 18rem;'>
        <img src='./admin/products_images/$product_image' class='card-img-top'>
        <div class='card-body'>
        <h5 class='card-title'>$product_title</h5>
        <p class='card-text'>$product_description</p>
        <p class='card-text'><strong>Price:&nbsp$product_price</strong></p>";?>
<?php
  if(!isset($_SESSION['email'])){
    echo"
    <a href='' data-toggle='modal' data-target='#exampleModal'  class='btn btn-info'>Add to Cart</a>    
    </div>
    </div>
    </div> 
";}?>


<?php
  if(isset($_SESSION['email'])){
    echo"
 
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>";
    echo"
    </div>
    </div>
    </div> 
";}?>
</form>

<?php
    }}  ?>