/**
 * Created by artem on 18.01.2016.
 */
$(document).ready(function(){
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
});