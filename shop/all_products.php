<div class="container-fluid" >
    <h2 style="text-align: center; font-weight: bold; padding:10px;">All Products</h2>

<form class="form-inline mr-auto mb-3 d-flex  justify-content-end" method="POST" >
  <input class="form-control mt-2 mr-sm-2"  name="all_products" type="text" placeholder="Search" aria-label="Search" >
  <button class="btn btn-unique btn-rounded btn-sm my-0 mt-2 mr-2"name="search" type="submit" style="background-color: #439D9E;">Search</button>
  <a href="index.php?all_products" class="bi bi-arrow-counterclockwise mt-2 pl-2 pr-2" style="background-color: #439D9E; padding:3px;  color: white; border-radius: 3px; "></a>
</form>
    

<div class='row'>
  
    <?php include './shop/common_functions.php';



if (isset($_POST['all_products'])) {
search_products();
}
else{
    getproducts();

}
?>

