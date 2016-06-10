/**
 * Created by artem on 08.03.2016.
 */

//$(document).ready(function() {
    $('#delete-news-icon').on('click', '#delete-icon', function(){
        if(confirm("Ви дійсно бажаєте видалити цю сторінку?")){
            location.href = $('#delete-href').val();
        }
    });
//});