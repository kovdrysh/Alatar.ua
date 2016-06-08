<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 21.01.2016
 * Time: 19:20
 */
if(!IN_ADMIN) {
    echo '<script>window.location.href = "/404"</script>';
    return;
}
?>

<div class="container" style="margin-top: 40px;">
    <div class="page">
    <div class="col-md-8">
        <h3>Додати нову категорію товарів</h3>
        
        <div class="control-group form-group">
            <div class="controls">
                <label for="type">Категорія товару</label>
                <input type="text" class="add add-text form-control" name="type" id="type">
            </div>
        </div>
        <button type="submit" class="btn btn-success" id="add-productsTypes-button">Додати категорію</button>
        <div class="back-to-menu">
            <a href = "/admin"><button type="button" class="btn btn-success">Повернутися до меню</button></a>
        </div>
    </div>


<style>
    .back-to-menu{
        margin-top: 20px;
        text-align: right;
    }
</style>