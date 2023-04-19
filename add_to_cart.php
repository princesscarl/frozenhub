<?php
session_start();
include '../connect.php'; 
   
        $user_id = $_SESSION['user_id'];
        $get_product_id = $_POST['product_id'];
        $insert_query = "INSERT INTO cart_details (product_id, quantity, `user_id`) VALUES ('$get_product_id','1', '$user_id')";
        $result_query = mysqli_query($conn, $insert_query);

        if($result_query){
            echo "<script> alert ('Item is added to cart.') </script>";
   
        }
          else {
            echo "<script> alert('Error.')</script> ";
    
        }

// if(isset($_GET['add_to_cart'])) {
//         $user_id = $_SESSION['user_id'];
//         $get_product_id = $_GET['add_to_cart'];
//         $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$get_product_id";
//         $result_query = mysqli_query($conn, $select_query);
//         $rows = mysqli_num_rows($result_query);

//         if ($rows == 0) {
//             $insert_query = "INSERT INTO cart_details (product_id, quantity, `user_id`) VALUES ('$get_product_id','1', '$user_id')";
//             $result_query = mysqli_query($conn, $insert_query);

//             echo "<script> alert ('Item is added to cart.') </script>";
//             echo "<script>windows.open('index.php','_self')</script>";
//         } else {
//             echo "<script> alert('Item is already in your cart.')</script> ";
//             echo "<script>windows.open('index.php','_self')</script>";
//         }
//     }

    ?> 