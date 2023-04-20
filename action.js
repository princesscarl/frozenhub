$(document).ready(function()
{
    insert_item()
    update_quantity()
})

function insert_item()
{
  $('.add-to-cart-button').on('click', function() {
    var product_id = $(this).data('id');
    $.ajax({
      url: 'add_to_cart.php',
      method: 'GET',
      data: {product_id:product_id},
      success: function(data) {
        alert('Item is added to cart.');
      }
    })
  })
}


function update_quantity()
{
    $('.quantity-btn').on('click', function() {
      var product_id = $('input[name="quantity"]').val();

        var $quantityField = $(this).siblings('.quantity');
        var currentVal = parseInt($quantityField.val());
        var $totalPriceCell = $(this).closest('tr').find('.total-price');
        var price = parseFloat($totalPriceCell.text()) / currentVal;
    
        if ($(this).hasClass('plus')) {
          $quantityField.val(currentVal + 1);
        } else if (currentVal >= product_id) {
          $quantityField.val(currentVal - 1);
          if (currentVal - 1 == 1) {
            $(this).prop('disabled', true);
          }
        }
    
        var newQuantity = parseInt($quantityField.val());
        var newTotalPrice = price * newQuantity;
        $totalPriceCell.text(newTotalPrice.toFixed(2));
    
        // AJAX to update quantity in database
        var productId = $(this).closest('tr').find('input[name="product_id"]').val();
        $.ajax({
          url: 'update_cart.php',
          type: 'POST',
          data: {
            'product_id': productId,
            'quantity': newQuantity
          },
          success: function(response) {
            // do something with response, if necessary
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        })
      })
    }
    
    
