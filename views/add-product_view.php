<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 21.01.2016
 * Time: 19:14
 */
if(!IN_ADMIN) {
    echo '<script>window.location.href = "/404"</script>';
    return;
}
?>
	
<div class="container" style="margin-top: 40px;">
    <div class="page">
    <div class="col-md-8">
    <h3>Додати новий товар</h3>
       
        <div class="control-group form-group">
            <div class="controls">
                <label>Назва</label>
                <input type="text " class="add add-text form-control" name="caption" id="caption">
            </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
                 <label for="type">Категорія товару</label>
                <select id="type" class = "form-control">
                        <option value="">Оберіть тип товару</option>
                        <?foreach ($this->product_types as $row) {?>
                            <option value="<?=$row?>"><?=$row?></option>
                        <?}?>
                    </select>
            </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
                <label for="measure">Вимір</label>
                <input type="text " class="add add-text form-control" name="measure" id="measure">
            </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
                <label for="price">Ціна</label>
                <input type="text " class="add add-text form-control" name="price" id="price">
            </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
                <label for="info">Інформація</label>
                <textarea rows="10" cols="100" class="form-control add add-text" name="info" id="info"></textarea>
            </div>
        </div>

        <div class="control-group form-group">
            <div class="controls">
               <label for="image">Зображення 262х157</label>
                <form action="fileUpload.php" method="post" id="upload-form" enctype="multipart/form-data">
                    <div class="fileform">
                        <div id="fileformlabel"></div>
                        <div class="selectbutton" >Обзор</div>
                        <input type="file" class="add add-text form-control" accept="image/*" name="image" id="image">
                    </div>
                </form>
            </div>
        </div>

        <button type="submit" class="btn btn-success" id="add-products-button">Додати товар</button>
        <div class="back-to-menu">
            <a href = "/admin"><button type="button" class="btn btn-success">Повернутися до меню</button></a>
        </div>
    </div>



<style>
    .back-to-menu{
        margin-top: 20px;
        text-align: right;
    }
    .admin-div textarea{
        width: 100%;
        height: 100px;
    }
    /*-------input[type = file]  style  */
/*    .fileform {
        background-color: #FFFFFF;
        border: 1px solid #CCCCCC;
        border-radius: 2px;
        cursor: pointer;
        height: 26px;
        overflow: hidden;
        padding: 2px;
        position: relative;
        text-align: left;
        vertical-align: middle;
        width: 100%;
    }

    .fileform .selectbutton {
        background-color: #5cb85c;
        border: 1px solid #939494;
        border-radius: 2px;
        color: #FFFFFF;
        float: right;
        font-size: 14px;
        height: 20px;
        line-height: 20px;
        overflow: hidden;
        padding: 0px 2px;
        text-align: center;
        vertical-align: middle;
        width: 25%;
    }

    .fileform #image{
        position:absolute;
        top:0;
        left:0;
        width:100%;
        -moz-opacity: 0;
        filter: alpha(opacity=0);
        opacity: 0;
        font-size: 150px;
        height: 30px;
        z-index:20;
    }

    .fileform #fileformlabel {
        background-color: #FFFFFF;
        float: left;
        height: 22px;
        line-height: 22px;
        overflow: hidden;
        padding: 2px;
        text-align: left;
        vertical-align: middle;
        width: 75%;
    }*/
</style>

