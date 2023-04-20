$(document).ready(function()
{
    insert_item();
 
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
        console.log(data);
      }
    })
  })
}
