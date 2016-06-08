/**
 * Created by Nikita on 12.01.2016.
 */
function enterAdmin() {
    var json = {
        log: document.getElementById('login').value,
        pass: document.getElementById('passw').value,
        ent: 'true'
    };

    $.ajax({
        url: '/auth.php',
        data: 'entering=' + JSON.stringify(json),
        type: 'post',
        success: function (output) {
            if(output == '1') {
                window.location.href = '/admin';
            }
            else{
                window.location.href = '/';
            }
        }
    });
}

