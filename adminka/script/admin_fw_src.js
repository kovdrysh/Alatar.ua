/**
 * Created by artem on 08.03.2016.
 */

$(document).ready(function() {


    $('#delete-news-icon').click(function(){
        if(confirm("Ви дійсно бажаєте видалити цю сторінку?")){
            location.href = $('#delete-href').val();
        }
    });
});