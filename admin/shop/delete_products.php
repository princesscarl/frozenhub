<?php 
session_start();

$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}


if (isset($_GET['id'])){
    $product = $_GET['id'];

    $delete_query = "DELETE FROM products WHERE product_code=$product";
    $result_delete= mysqli_query ($conn, $delete_query);

    if($result_delete){
        echo "<script> alert ('Product is deleted!') </script>";
        header("Location: ../index.php?view_products");
    }
}

?>