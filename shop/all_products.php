<div class="container-fluid" style="width: 90%;">
    <h2 style="text-align: center; font-weight: bold; padding:10px;">All Products</h2>


    <form class="justify-content-center my-2 d-flex" style="width:50%; " method="POST">
      <!-- <input name="search_data" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product"> -->
    <input type="text" name="all_products">
    <button type="submit" class="btn btn-secondary" name="search">Search</button>
    <a href="index.php?all_products" class="btn btn-info mx-3">Reset</a>
    </form>

    <div class='row d-flex'>
  
    <?php include './shop/common_functions.php';



if (isset($_POST['all_products'])) {
search_products();
}
else{
    getproducts();

}
?>

