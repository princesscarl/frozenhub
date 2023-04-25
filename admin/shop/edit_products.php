<?php


$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}




if(isset($_GET['edit_products'])){

$product = $_GET['edit_products'];
    $category_query="SELECT * FROM products JOIN categories WHERE products.category_id = categories.category_id AND products.product_id = '$product'";
    $result_category= mysqli_query($conn,$category_query);
    if (mysqli_num_rows($result_category) == 0){
        echo"NO ROWS TO RETURN";
    }
    
    else { 
        
    $row = mysqli_fetch_assoc($result_category); 
    }


        $product_id = $row["product_id"];
        $product_title = $row["product_title"];
        $product_description = $row["product_description"];
        $product_image = $row["product_image"];
        $product_price = $row["product_price"];
        $category_title= $row["category_title"];

}

    // UPDATE QUERY

    if(isset($_FILES['product_image']) && isset($_POST["update-btn"])) {

        $product_title= $_POST['product_title'];
        $product_description= $_POST['product_description'];
        $product_price = $_POST['product_price'];
        $product_category= $_POST['product_category'];

        $uploadsDir = "./products_images/";

        // Velidate if files exist
    if (!empty(array_filter($_FILES['product_image']['name']))) {  
      
      // Loop through file items
      foreach(array_filter($_FILES['product_image']['name']) as $id=>$val){
  
          // Get files upload path
          $fileName        = $_FILES['product_image']['name'][$id];
          $tempLocation    = $_FILES['product_image']['tmp_name'][$id];
          $targetFilePath  = $uploadsDir . $fileName;
          $fileType        = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
  
  if(move_uploaded_file( $tempLocation  , $targetFilePath)){


        $update_query = "UPDATE products SET
        product_title = '$product_title',
        product_description ='$product_description',
        product_price ='$product_price',
        category_id ='$product_category',
        product_image ='$fileName',
        date = now()
        WHERE product_id = $product";

        $result_update = mysqli_query($conn, $update_query);

        if($result_update){
            echo "<script> alert ('Product was successfully updated! $product_category) </script>";
        }

        else{
            echo "<script> alert ('Not updated!') </script>";
        }
        
}}
}}  
?>




<body class="bg-light">
    <div class="container mt-3" style="background-color: #E0F1F1;">
    <h2 class = "text-center mt-5 mb-3" style="font-weight: bold;"> Edit Products </h2>

        <!--FORM-->
        <form method="POST" enctype="multipart/form-data">

        <!--TITLE -->
            <div class="form-outline mb-4 w-50 m-auto pt-3">
                <label for="product_title" class="form-label">
                Product Title
                </label>
                <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $product_title ?>" autocomplete="Off">
            </div>

        <!--DESCRIPTION-->
        <div class="form-outline mb-4 w-50 m-auto pt-3">
        <textarea type="text" name="product_description" id="product_description" class="form-control" maxlength="300" style="font-family: Poppins, sans-serif;font-size: 19px;"><?php echo $product_description;?> </textarea>
                        
                        <div class="row" style="padding-top: 0px;">
                            <div class="col-lg-9 col-xl-10 col-xxl-8 d-flex justify-content-end ms-lg-5" id="charCountCol" style="padding-top: 19px;font-family: Poppins, sans-serif;">
                                <div id="charCount" style="padding-left: 13px;"><span id="currentCount">0</span><span id="maxCount">/300</span></div>
                  </div>
                  </div>
                  </div>
        <!-- KEYWORDS -->
            <!-- <div class="form-outline mb-4 w-50 m-auto pt-3">
                    <label for="product_keywords" class="form-label">
                    Product Keywords
                    </label>
                    <input type="text" name="product_keywords" id="product_keywords" class="form-control" value="<?php echo $product_keywords ?>" autocomplete="Off">
                </div> -->

        <!-- CATEGORY -->
            <div class="form-outline mb-4 w-50 m-auto pt-3">
                <select name="product_category" id="product_category" class="form-select">
     
                    <?php
                    $category_query="SELECT * FROM categories ";
                    $result_category= mysqli_query($conn,$category_query);
                    while($row = mysqli_fetch_assoc($result_category)) {

                        $product_category= $_POST['product_category'];
                        //get grant info
                        $category_id= $row["category_id"];
                        $category_title= $row["category_title"];
                        ?>
                   <option value="<?php echo  $category_id; ?>" <?php if ($category_id==$product_category) {echo "selected";}?>> <?php echo $category_title; ?></option>
                    <?php
                        }
                        ?>
                    </select>
                </div>
            
              
        <!-- PICTURE -->
            <div class="form-outline  mb-4 w-50 m-auto pt-3">
            <label for="product_image" class="form-label">Product Picture</label>    
            <input type="file" accept=".jpg,.png" name="product_image[]" id="product_image" class="form-control">
            <?php echo"
            <img src = './products_images/$product_image' class='m-3' width='100px;' height='100px;'> "; ?>
            </div>

        <!-- PRICE -->
            <div class="form-outline mb-4 w-50 m-auto pt-3">
                        <label for="product_price" class="form-label">
                        Product Price
                        </label>
                        <input type="number" name="product_price" id="product_price" class="form-control" value="<?php echo $product_price ?>" autocomplete="Off">
                    </div>
        
        <!-- SUBMIT -->
           <div class="form-outline d-flex mb-4 w-50 m-auto pt-3 mt-3 justify-content-end"> 
                <button type="button" onclick="window.history.back()" class="btn btn-secondary p-2 py-2 mr-3 border-0 text-decoration-none text-light mb-3">Back</button>
                <button type="submit" name="update-btn" class="btn btn-primary p-2 py-2 border-0 text-decoration-none text-light mb-3">Update Product</button>
            </div>
        </form>
    </div>
</body>
