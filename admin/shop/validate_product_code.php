<?php
include '../connect.php';


if(!empty($_POST['product_code']))
{
    $product_code = $_POST['product_code'];
  $select_query = "SELECT * FROM products WHERE product_code=$product_code";
        $count_query = mysqli_query($conn, $select_query);
        $rows = mysqli_num_rows($count_query);

        if ($rows == 0) {
            $validation_message = '';
        } else {
          $validation_message = 'Invalid product code';
        }
      
        // Return the validation message as a response
        echo $validation_message;
    }
        ?>