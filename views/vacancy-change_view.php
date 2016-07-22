<?php

defined('_INDEX') or die;
if(!$_SESSION['admin']) {
    include 'views/404_view.php';
    die;
}
?>
<div class="admin-browse-div">
    <div class="page">
        <div class="cont admin-browse-view" style="margin-left: auto; margin-right: auto;">
            <?if($action == 'browse'){?>
                <H2>Перегляд вакансій</H2>
                <span id="add-news-icon" title="Додати вакансію"> <a href="/<?=$table_name?>/add"><i class="fa fa-plus fa-lg"></i> <H4>Додати нову вакансію</H4></a></span>
                <span id="return-to-admin-page" title="Повернутися до сторінки адміністратора"><a href="/admin"><i class="fa fa-arrow-left fa-lg"></i></a></span>
            <?}?>
            <div class="admin-view-tabel-div">
                <?=$table_view?>
            </div>
        </div>

<style>


</style>