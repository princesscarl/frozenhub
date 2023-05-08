<?php
session_start();
include 'connect.php'; 
   
        $user_id = $_SESSION['user_id'];
        $get_product_id = $_GET['product_id'];

        $select_query = "SELECT * FROM cart_details WHERE  `user_id`= $user_id AND product_code=$get_product_id";
        $count_query = mysqli_query($conn, $select_query);
        $rows = mysqli_num_rows($count_query);

        if ($rows == 0) {

        $insert_query = "INSERT INTO cart_details (product_code, quantity, `user_id`) VALUES ('$get_product_id','1', '$user_id')";
        $result_query = mysqli_query($conn, $insert_query);
        }

?>