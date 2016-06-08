/**
 * Created by gena on 22.01.2016.
 */
$(document).ready(function(){
    $('.confirm-button').click(function ($this) {
        if(confirm('Підтвердити виконання замовлення?')) {
            var id = $(this).attr('value');
            var json = {
                'method': 'orderSuccess',
                'id': id
            };

            $.ajax({
                url: '/Redirect.php',
                data: 'order=' + JSON.stringify(json),
                type: 'post',
                success: function (output) {
                    window.location.href = '/orders';
                }
            });
        }
    })
});