<?php

$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}

if(isset($_FILES['product_image']) && isset($_POST["submit-btn"])) {

    
$product_title= $_POST['product_title'];
$product_description= $_POST['product_description'];
// $product_keywords= $_POST['product_keywords'];
$product_price= $_POST['product_price'];
$product_category= $_POST['product_category'];
// $product_status="True";

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
$insert_products= "INSERT INTO `products`(`product_title`, `product_description`, `product_price`, `product_image`, `category_id`, `date`) VALUES ('$product_title','$product_description','$product_price', '$fileName','$product_category', now())";
 
$result_product = mysqli_query($conn,$insert_products);

if($result_product){
    echo "<script> alert ('Product has been inserted successfully!') </script>";
  }
}
}
}}


?>


<div class="container mt-3">
<h2 class = "text-center"> Insert Products </h2>

<a href="index.php?view_products" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">All Products</a>
  <a href="index.php?view_promos" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">All Promos</a>
  <a href="index.php?view_top" class="btn btn-secondary p-2 py-2 border-0 text-decoration-none text-light mb-3">Top Products</a>

    <!--FORM-->
    <form method="POST" enctype="multipart/form-data">

   
    <!-- BACK BUTTON -->
    <!-- <div class="form-outline mb-4 w-50 m-auto pt-3"> 
        <button type="submit" name="submit-btn" class="btn btn-outline-dark" onclick="window.location.href='../admin_area/index.php';">Back</button>
        </div> -->


    <!--TITLE -->
        <div class="form-outline mb-4 w-50 m-auto pt-3">
            <label for="product_title" class="form-label">
            Product Title
            </label>
            <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="Off" required>
        </div>

    <!--DESCRIPTION-->
   
                <!-- <label for="product_description" class="form-label">
                Product Description
                </label>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" autocomplete="Off" required> -->
         
            <div class="form-outline mb-4 w-50 m-auto pt-3">
            <textarea type="text" name="product_description" id="product_description" class="announceTextArea form-control" placeholder="Type your announcement here..." maxlength="300" style="font-family: Poppins, sans-serif;font-size: 19px;"></textarea>
                        
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
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="Off" required>
            </div> -->

    <!-- CATEGORY -->
        <div class="form-outline mb-4 w-50 m-auto pt-3">
            <select name="product_category" class="form-select" required>
            <option value="" selected="" disabled="">Select Category</option>
                <?php
                $category_query="SELECT * FROM categories ";
                $result_category= mysqli_query($conn,$category_query);
                while($row = mysqli_fetch_assoc($result_category)) {

                    //get grant info
                    $category_id= $row["category_id"];
                    $category_title= $row["category_title"];
                    ?>

                <option value="<?php echo $category_id;?>"> <?php echo $category_title;?> </option>

                <?php
                    }
                    ?>
                </select>
            </div>
            
          
    <!-- PICTURE -->
        <div class="form-outline mb-4 w-50 m-auto pt-3">
        <label for="product_image" class="form-label">Product Picture</label>    
        <input type="file" accept=".jpg,.png" name="product_image[]" id="product_image" class="form-control" required>
        </div>

    <!-- PRICE -->
        <div class="form-outline mb-4 w-50 m-auto pt-3">
                    <label for="product_price" class="form-label">
                    Product Price
                    </label>
                    <input type="number" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="Off"required>
                </div>
    
    <!-- SUBMIT -->
       <div class="form-outline mb-4 w-50 m-auto pt-3"> 
            <button type="submit" name="submit-btn" class="btn btn-primary">Insert Product</button>
            </div>
    </form>
</div>
</body>
