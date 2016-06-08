<?php
if(!IN_ADMIN) {
    echo '<script>window.location.href = "/404"</script>';
    return;
}
?>
<div class="admin-container">
    <div class="page">
    <div class="admin-div">
        <input type="hidden" id="product-code" value="<?=$this->data[0]['code']?>">
        <table class="table">
            <tr>
                <td>
                    <label for="caption">Назва</label>
                </td>
                <td>
                    <input type="text" class="add add-text" name="caption" id="caption" value="<?=$this->data[0]['caption']?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="type">Категорія товару</label>
                </td>
                <td>
                    <select id="type">
                        <option  value="<?=$this->data[0]['type']?>"><?=$this->data[0]['type']?></option>
                        <?foreach ($this->product_types as $row) {
                            if($row != $this->data[0]['type']){?>
                            <option value="<?=$row?>"><?=$row?></option>
                        <?}}?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="measure">Вимір</label>
                </td>
                <td>
                    <input type="text" class="add add-text" name="measure" id="measure" value="<?=$this->data[0]['measure']?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="price">Ціна</label>
                </td>
                <td>
                    <input type="text" class="add add-text" name="price" id="price" value="<?=$this->data[0]['price']?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="info">Інформація</label>
                </td>
                <td>
                    <textarea class="add add-text" name="info" id="info"><?=$this->data[0]['info']?></textarea>

                </td>
            </tr>
            <tr>
                <td>
                    <label for="image">Зображення</label>
                </td>
                <td>
                    <form action="/fileUpload.php" method="post" id="upload-form" enctype="multipart/form-data">
                        <div class="fileform">
                            <div id="fileformlabel"><?=$this->data[0]['image']?></div>
                            <div class="selectbutton">Обзор</div>
                            <input type="file" class="add add-text" accept="image/*" name="image" id="image">

                        </div>
                    </form>

                </td>

            </tr>
        </table>
        <button type="submit" class="btn btn-success" id="update-products-button">Оновити товар</button>
        <div class="back-to-menu">
            <a href = "/admin"><button type="button" class="btn btn-success">Повернутися до меню</button></a>
        </div>
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
    .fileform {
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
    }
</style>
