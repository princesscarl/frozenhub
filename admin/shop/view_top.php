<div class="container-fluid">
  <h1 class="text-center" style="padding: 20px; font-weight:bold">Top Products</h1>


   
  <a href="index.php?view_products" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">All Products</a>
  <a href="index.php?view_promos" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">All Promos</a>
  <a href="index.php?view_top" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">Top Products</a>
  <a href="index.php?insert_products" class="btn btn-info p-2 py-2 border-0 text-decoration-none text-light mb-3">Insert Products</a>

        <table id="table" class="table table-stripped table-bordered dataTable responsive display nowrap no-footer dtr-inline collapsed printTable darkBG" role="grid" cellspacing="0" style="width:100%">
        <thead style="background-color: #61b0b7">
        <tr>
            <th>Title</th>
            <th>Image </th>
            <th>Price </th>
            <th>Description </th>
		        <th colspan="2">Actions</th>
        </tr>
</thead>
<tbody>

<?php
                    $category_query="SELECT * FROM products WHERE category_id = '1'  ORDER BY date";
                    $result_category= mysqli_query($conn,$category_query);
                    while($row = mysqli_fetch_assoc($result_category)) {

                        //get grant info
                        $product_id = $row["product_id"];
                        $product_title = $row["product_title"];
                        $product_image = $row["product_image"];
                        $product_price = $row["product_price"];
                        $product_description = $row["product_description"];
                        
                        echo "
            <tr>
     
            <td> $product_title</td>
            <td> <img src = './products_images/$product_image' width='80px;' height='80px;'> </td>
            <td> $product_price</td>
            <td>$product_description</td>

            <td> 
            <a href ='./index.php?edit_products=".$product_id."' class='text-warning'><i class='bi bi-pencil-square'></i></a>";?>

            <?php
            echo"
            </td>
 
            <td>
            <a href = './shop/delete_products.php?id=".$product_id."' class='text-danger'><i class='bi bi-x-circle'></i></a>
             </td>

            ";
            
            }?>  
            
        
    </tbody>
    <table>




    
    <!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">    Are you sure you want to delete this item? </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success"><a class="text-light text-decoration-none" href="./shop/delete_products.php?id=<?php echo $product_id?>">YES</a></button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><a href="index.php?cart.php" class="text-light text-decoration-none">NO</a></button>
       
      </div>
    </div>
  </div>
</div>
