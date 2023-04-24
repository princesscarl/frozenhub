<?php 
session_start();

$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}


if (isset($_GET['id'])){
    $product = $_GET['id'];

    $delete_query = "DELETE FROM products WHERE product_id=$product";
    $cart_delete_query = "DELETE FROM cart_details WHERE product_id=$product";
    $result_delete= mysqli_query ($conn, $delete_query);
    $result_cart = mysqli_query ($conn, $cart_delete_query);

    if($result_cart && $cart_delete_query){
        echo "<script> alert ('Product is deleted!') </script>";
        header("Location: ../index.php?view_products");
    }
}

?>