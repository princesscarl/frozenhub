<?php
session_start();

$conn = mysqli_connect('localhost','root','','frozenhub');
if (!$conn){
    die("Connection Failed. " . mysqli_connect_error());
}

if (isset($_GET['id'])){   
    $product_id = $_GET['id'];
  
    $delete_query = "DELETE FROM cart_details WHERE product_id = $product_id";
    $result_delete= mysqli_query($conn, $delete_query);

    if ($result_delete) {
        header("Location: ../index.php?cart");
      } else {
        echo "Error deleting record: " . mysqli_error($conn);
      }
}

// if (isset($_SESSION['user_id']) && isset($_GET['id'])){   
//     $user_id = $_SESSION['user_id'];
//     $product_id = $_GET['id'];

//     $delete_query = "DELETE FROM cart_details WHERE product_id = ? AND user_id = ?";
//     $stmt = $conn->prepare($delete_query);
//     $stmt->bind_param("ii", $product_id, $user_id);
//     $result_delete = $stmt->execute();

//     if($result_delete) {
//         header("Location: index.php?cart");
//         exit();
//     } else {
//         echo "Error deleting record: " . mysqli_error($conn);
//     }
// }
?>
