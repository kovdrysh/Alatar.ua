function createFormForNewVacancy(){
    var div = document.getElementById('for-buttons');
    var newDiv = document.createElement('div');
    newDiv.innerHTML = '<div id = "adding-form" style="margin-top: 15px;"> \
        <label for ="text">Назва вакансії</label> \
        <input type = "text" class = "form-control" id = "type-form"> \
        <div class="control-group form-group"> \
            <div class="controls"> \
               <label for="image">Зображення</label> \
                <form action="fileUpload.php" method="post" id="upload-form" enctype="multipart/form-data"> \
                    <div class="fileform"> \
                        <div id="fileformlabel"></div> \
                        <div class="selectbutton" >Обзор</div> \
                        <input type="file" class="add add-text form-control" accept="image/*" name="image" id="image" onchange="imageChangeFunc(this)"> \
                    </div> \
                </form> \
            </div> \
        </div> \
        <label for = "text">Опис</label> \
        <input type = "text" class = "form-control" id = "info-form"> \
        <button type="submit" class="btn btn-success" onclick = "addVacancyType()">Оновити данні</button> \
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

function imageChangeFunc($this){
    if ($this.value.lastIndexOf('\\')){
        var i = $this.value.lastIndexOf('\\')+1;
    }
    else{
        var i = $this.value.lastIndexOf('/')+1;
    }
    var filename = $this.value.slice(i);
    var upload = $($this).prev().prev();
    upload[0].innerHTML = filename;
}


function addVacancyType(){

    var form = document.getElementById('upload-form');
    formData = new FormData(form);
    $.ajax({
        url: form.action,
        type: form.method,
        contentType: false,
        processData: false,
        data: formData,
        success: function(output){
        }
    });
    var fileName = form[0].files[0].name;

    var json = {
        type:document.getElementById('type-form').value,
        image:fileName,
        info:document.getElementById('info-form').value,
        
        method:'addVacancyType'
    };
    if (json.type != null && json.info != null)
        document.getElementById('type-form').value = "";
        document.getElementById('info-form').value = "";
        
    $.ajax({
        url: '/Redirect.php',
        data: 'order=' + JSON.stringify(json),
        type: 'post',
        success: function (output) {
            alert(output);
        }
    });
}

function getVacanciesFromDB(){
    
    var types = new Array();

    var info = new Array();
    var json = {
        method:'getVacancies',
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

function UpdateVac($this){
    var form = $($this).prev().children(".controls").children("#upload-form");
    formData = new FormData(form[0]);
    $.ajax({
        url: form[0].action,
        type: form[0].method,
        contentType: false,
        processData: false,
        data: formData,
        success: function(output){
        }
    });
    if(form[0][0].files[0])
        var fileName = form[0][0].files[0].name;
    else
        var fileName = form[0].children[0].children[0].outerText;//$($this).prev().children(".controls").children('#fileformlabel').text();

    var label = $($this).prev().prev().prev().text();
    var info = $($this).prev().prev().val();
    var json = {
        'method':'updateVac',
        'info': info,
        'label':label,
        'image':fileName
    };

    $.ajax({
        url:'Redirect.php',
        'data':'order='+JSON.stringify(json),
        'type':'post',
        success:function(output){
            window.location.href='/vacancy-change';
        }
    })
}

function deleteVac($this){
    var label = $($this).prev().prev().prev().prev().text();

    var json = {
        'method':'deleteVac',
        
        'label':label
    };

    $.ajax({
        url:'Redirect.php',
        'data':'order='+JSON.stringify(json),
        'type':'post',
        success:function(output){
            
            window.location.href='/vacancy-change';

        }
    })
}