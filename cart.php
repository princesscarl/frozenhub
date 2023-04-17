<form id="add-to-cart-form">
    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
    <button type="button" id="add-to-cart-button">Add to Cart</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



$(document).ready(function() {
    $('#add-to-cart-button').click(function() {
        var product_id = $('input[name="product_id"]').val();
        $.ajax({
            type: 'POST',
            url: 'add_to_cart.php',
            data: { product_id: product_id },
            success: function(data) {
                alert('Product added to cart!');
            }
        });
    });
});



<?php
session_start();
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    // TODO: Add the product to the cart
}
?>
