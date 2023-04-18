<div class="container-fluid" style="width: 90%;">
    <h2 style="text-align: center; font-weight: bold; padding:10px;">All Products</h2>
    <div class='row d-flex'>
    <?php include './shop/common_functions.php';

getproducts();
?>

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