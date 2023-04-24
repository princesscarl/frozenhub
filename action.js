$(document).ready(function()
{
    $('.add-to-cart-button').on('click', function () {
      var product_id = $(this).data('id');
      $.ajax({
        url: 'add_to_cart.php',
        method: 'GET',
        data: { product_id: product_id },
        success: function (data) {
          $(document).ajaxStop(function(){
            window.location.reload();
            });
        }
      })
    })
  }
);

