
<?php
                    $user_id = $_SESSION['user_id'];
                    $product_id = $_GET['product_id'];
                    $quantity = $_GET['quantity'];
                    $update_cart = "UPDATE cart_details SET `quantity`='$quantity' WHERE `user_id`=$user_id AND `product_id` =$product_id";
                    $result_update = mysqli_query($conn, $update_cart);

                    if($result_update){
                        echo "<script> alert ('Quantity has been updated.') </script>";
                    }

                    else{
                      echo "<script> alert ('Error!') </script>";
                    }
                ?>