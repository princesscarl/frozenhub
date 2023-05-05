<?php 
include './connect.php';

if(isset($_GET['product_description'])){
 $id = $_GET['product_description'];


 $products_query = "SELECT * FROM products  WHERE product_id = '$id'";
 $result = mysqli_query($conn,$products_query);
 $row = mysqli_fetch_assoc($result);

 $product_image = $row['product_image'];
 $product_title = $row['product_title'];
 $product_price = $row['product_price'];
 $product_description= $row['product_description'];
}
?>
<div>
<a href="index.php" style="margin-left:80px; color:black;">Home</a>   &nbsp/
<a href="index.php?all_products" style="margin-left:10px; color:black;">All Products</a>  &nbsp/
<a disabled href="#" style="margin-left:10px;color:black; text-decoratione-none;pointer-events: none;">Product Description</a>  
</div>
<div style="width: 90%; margin-top:30px; margin-bottom: 30px; margin-right: auto; margin-left: auto; overflow: hidden; background-color:teal;">


<div class="row">
    <div class="col-md-6">
      <div class="product-image-column" style="max-width: auto; float: right;">
        <img src="./admin/products_images/<?php echo $product_image ?>" alt="Product Image" style="width: 700px; height: 600px;">
      </div>
    </div>
    <div class="col-md-6">
      <div class="product-description-column">
        <h2><?php echo $product_title ?></h2>
        <p><?php echo $product_price ?></p>
        <p><?php echo $product_description ?></p>
      </div>
    </div>
  </div>
</div>
