/*Cart*/
$('body').on('click', '.add-to-cart-link', function(e){
    e.preventDefault();
    var id = $(this).data('id'),
        qty = $('.quantity input').val() ? $('.quantity input').val() : 1;
    $.ajax({
        url: '/cart/add',
        data:{id:id, qty:qty},
        type: 'GET',
        success: function(res){
            showCart(res);
        },
        error: function(){
//            alert('Ошибка! Попробуйте позже');
        }
    });
});

function showCart(cart){
    console.log(cart);
}
/*Cart*/

$('#currency'). change(function(){
    window.location = 'currency/change?curr=' + $(this) . val();
});
