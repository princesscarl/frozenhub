<?php
session_start();

include '../connect.php'; 
if(isset($_GET['add_to_cart'])) {
        $user_id = $_SESSION['user_id'];
        $get_product_id = $_GET['add_to_cart'];
        $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_id=$get_product_id";
        $result_query = mysqli_query($conn, $select_query);
        $rows = mysqli_num_rows($result_query);

       
        if($result_query){
            echo "<script> alert ('Item is added to cart.') </script>";
            header("Location: ./index.php");
        }
     
        } else {
            echo "<script> alert('Item is already in your cart.')</script> ";
            header("Location: ./index.php");
    
        }

    ?>