$(document).ready(function () {
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
})


// function update_quantity() {

