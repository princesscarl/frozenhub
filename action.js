$(document).ready(function()
{
    insert_item()
})

function insert_item()
{
    $(document).on('click','#add-to-cart-button', function(){
        var product_id = $('input[name="product_id"]').val();

        $.ajax({
           url: 'add_to_cart.php',
           method:'POST',
           data: {product_id:product_id},
           success: function(data){
            alert ('Item is added to cart.');
           }
        })
    })
}