<div class="container-fluid">
  <h1 class="text-center" style="padding: 20px; font-weight:bold">Top Products</h1>


   
  <a href="index.php?view_products" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">All Products</a>
  <a href="index.php?view_promos" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">All Promos</a>
  <a href="index.php?view_top" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">Top Products</a>

        <table id="table" class="table table-stripped table-bordered dataTable responsive display nowrap no-footer dtr-inline collapsed printTable darkBG" role="grid" cellspacing="0" style="width:100%">
 
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
           <a href = 'index.php?edit_products=$product_id' class='text-warning'><i class='fa-solid fa-pen-to-square'></i></a>
           </td>

           <td>
           <a href = 'index.php?delete_products=$product_id' class='text-danger'  data-toggle='modal' data-target='#exampleModal'><i class='fa-solid fa-trash'></i></a>
            </td>

            ";
            
            }?>  
            
        
    </tbody>
    <table>