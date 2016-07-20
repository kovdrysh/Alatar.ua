/**
 * Created by gena on 18.01.2016.
 */
$(document).ready(function(){
    /*$('body:first-line').style.fontSize = '40pt';
    /*if($('body:first-line').text() == '1'){
        alert('1');
    }*/
    var files;
    $('#image').change(function(){
        if (this.value.lastIndexOf('\\')){
            var i = this.value.lastIndexOf('\\')+1;
        }
        else{
            var i = this.value.lastIndexOf('/')+1;
        }
        var filename = this.value.slice(i);
        var upload = document.getElementById('fileformlabel');
        upload.innerHTML = filename;
        var upload2 = document.getElementById('hidden-image');
        upload2.value = filename;
        files = this.files;
    });


    $('.form-div').on('click', '#exec', function(){
        var img = $('#hidden-image').val();
        var upload2 = document.getElementById('hidden-image');
        upload2.value = img;
        var data = new FormData;
        $.each(files, function(key, value){
            data.append('image', value);
        });
        $.ajax({
            url:'/fileUpload.php',
            type:'post',
            contentType: false,
            processData: false,
            data: data,
            success:function(output){

            }
        });

    });

    $('#add-products-button').click(function(event){
        event.stopPropagation();
        event.preventDefault();
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

        var data = {
            'method':'addProduct',
            'code':$('#code').val(),
            'caption':$('#caption').val(),
            'type':$('#type').val(),
            'measure':$('#measure').val(),
            'price':$('#price').val(),
            'info':$('#info').val(),
            'imageName': fileName
        };

        $.ajax({
            url:'/Redirect.php',
            data:'order='+JSON.stringify(data),
            type:'post',
            success: function (output) {
                window.location.href = '#win3';
            }
        })
    });

    $('#add-productsTypes-button').click(function(){
        var data = {
            'method':'addType',
            'type':$('#type').val()
        };

        $.ajax({
            url:'/Redirect.php',
            data:'order='+JSON.stringify(data),
            type:'post',
            success: function (output) {
                window.location.href = '#win4';
            }
        })
    })

});