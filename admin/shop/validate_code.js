$(document).ready(function()
{
    $('#product_code').on('keyup', function() {
        // Get the value of the product code field
        var product_code = $(this).val();
        console.log (product_code)
        // Make an AJAX request to the validation script
        $.ajax({
          type: 'POST',
          url: './shop/validate_product_code.php',
          data: { product_code: product_code },
          success: function(response) {
            // Show the validation results in the validation-results div
            $('#validation-results').html(response);
          }
        });
      });
    });