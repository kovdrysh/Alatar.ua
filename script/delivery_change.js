function createFormForNewDeliveryType(){
    var div = document.getElementById('for-buttons');
    var newDiv = document.createElement('div');
    newDiv.innerHTML = '<div id = "adding-form" style="margin-top: 15px;"> \
        <label for ="text">Тип доставки</label> \
        <input type = "text" class = "form-control" id = "type-form"> \
        <label for = "text">Його значення</label> \
        <input type = "text" class = "form-control" id = "info-form"> \
        <label for = "text">Icon</label> \
        <input type = "text" class = "form-control" id = "icon-form"> \
        <p class="help-block"><a href="/contacts" target="_blank">Зразок</a></p> \
        <button type="submit" class="btn btn-success" onclick = "addDeliveryType()">Оновити данні</button> \
    </div>';
   
    var element = document.getElementById('adding-form');
    var element2 = document.getElementById('contacts-change');
    if (!element) {
        if(element2){
            item = div.lastElementChild;
            div.removeChild(item);
        }
        div.appendChild(newDiv);
    }
}

function addDeliveryType(){
    var json = {
        type:document.getElementById('type-form').value,
        info:document.getElementById('info-form').value,
        icon:document.getElementById('icon-form').value,
        method:'addDeliveryType'
    };
    if (json.type != null && json.info != null)
        document.getElementById('type-form').value = "";
        document.getElementById('info-form').value = "";
        document.getElementById('icon-form').value= "";
    $.ajax({
        url: '/Redirect.php',
        data: 'order=' + JSON.stringify(json),
        type: 'post',
        success: function (output) {
            alert(output);
        }
    });
}

function getDeliveryTypesFromDB(){
    
    var types = new Array();

    var info = new Array();
    var json = {
        method:'getDeliveryTypes',
    };
    $.ajax({
            url: '/Redirect.php',
            data: 'order=' + JSON.stringify(json),
            type: 'post',
            success: function (output) {
                var element = document.getElementById('adding-form');
                var element2 = document.getElementById('contacts-change');
                if(!element2) {
                    var div = document.getElementById('for-buttons');
                    if(element){
                        item = div.lastElementChild;
                        div.removeChild(item);
                    }

                    var newDiv = document.createElement('div');
                    newDiv.innerHTML = output;
                    div.appendChild(newDiv);
                }
               
            }
        });
}

function UpdateDel($this){
    var label = $($this).prev().prev().prev().prev().text();
    var info = $($this).prev().prev().prev().val();
    var icon = $($this).prev().val();
    var json = {
        'method':'updateDel',
        'info': info,
        'label':label
    };

    $.ajax({
        url:'Redirect.php',
        'data':'order='+JSON.stringify(json),
        'type':'post',
        success:function(output){
            window.location.href='/delivery-change';
        }
    })
}

function deleteDel($this){
    var label = $($this).prev().prev().prev().prev().prev().text();

    var json = {
        'method':'deleteDel',
        
        'label':label
    };

    $.ajax({
        url:'Redirect.php',
        'data':'order='+JSON.stringify(json),
        'type':'post',
        success:function(output){
            
            window.location.href='/delivery-change';

        }
    })
}