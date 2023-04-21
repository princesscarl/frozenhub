$(document).ready(function()
{
    insert_item()
    delete_item()
    update_quantity()
});

function insert_item() {
  $('.add-to-cart-button').on('click', function () {
    var product_id = $(this).data('id');
    $.ajax({
      url: 'add_to_cart.php',
      method: 'GET',
      data: { product_id: product_id },
      success: function (data) {
        alert('Item is added to cart.');
        console.log(data);
      }
    })
  })
}

function delete_item(){
  $('.delete-btn').on('click', function () {
    var product_id = $(this).data('id');
    $.ajax({
      url: 'delete_cart.php',
      method: 'GET',
      data: { product_id: product_id },
      success: function (data) {
        alert('Item is deleted in your cart.');
      }
    })
  })
}


function update_quantity(){
$('.update-btn').on('click', function () {
  var product_id = jQuery(this).data('id');
  var quantity = jQuery(this).closest('tr').find('#quantity').val();

  $.ajax({
    url: 'update_quantity.php',
    method: 'GET',
    data: { product_id: product_id, quantity: quantity },
    success: function (data) {
      alert(data);
    }
  })
})
}
