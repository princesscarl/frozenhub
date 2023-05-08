<?php
session_start();

$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}

if (isset($_GET['id'])){   
    $product_code = $_GET['id'];
  
    $delete_query = "DELETE FROM cart_details WHERE product_code = $product_code";
    $result_delete= mysqli_query($conn, $delete_query);

    if ($result_delete) {
      echo "<script> alert('Quantity of the item is updated.')</script> ";
        header("Location: ../index.php?cart");
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }
}
?>
