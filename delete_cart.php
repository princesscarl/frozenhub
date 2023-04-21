<?php if (isset($_POST['delete-btn'])) {
          $user_id = $_SESSION['user_id'];
          $product = $_GET['product_id'];
          $delete_query = "DELETE FROM cart_details WHERE product_id=$product AND `user_id`=$user_id";
          $result_delete = mysqli_query($conn, $delete_query);
          $result_items = mysqli_query($conn, $delete_items);
        }
      ?>