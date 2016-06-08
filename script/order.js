/**
 * Created by Nikita on 13.01.2016.
 */
function id(id){
    return document.getElementById(id);
}

function keyDown($this){
    $($this).css('background-color', '#330000');
}

function sendOrder($this){

    if (document.getElementById('phone').value == ""){

        var newDiv = document.getElementById('tel-hide');
        newDiv.innerHTML = "Поле має бути заповнене.";
        document.getElementById('tel-hide').style.visibility = "visible";
    }
    else{
        
        var dataObj = new Date();
        var values = new Array();
        var flag = 0;
        values[0] = id('name').value;
        values[1] = id('phone').value;
        values[2] = id('email').value;
        values[3] = id('message').value;
        for (var i = 0; i < values.length; i++){
           
    		if (values[i].length > 200){
    			flag = 1;
    		}
    	}

        if (flag == 1){
            var text = "Помилка при вводі. Занадто багато символів.";
            var newDiv = id('success');
            newDiv.innerHTML = text;
        }
        else{

            var json = {
                name:id('name').value,
                telNumber:id('phone').value,
                email:id('email').value,
                info:id('message').value,
                date:dataObj,
                method:'createOrder',
            };

            $.ajax({
                
                url: '/Redirect.php',
                data: 'order=' + JSON.stringify(json),
                type: 'post',
                success: function (output) {
                    id('name').value = "";
                    id('phone').value = "";
                    id('email').value = "";
                    id('message').value = "";
                    window.location.href='#win2';
                }
            });
        
        }
    }
}


