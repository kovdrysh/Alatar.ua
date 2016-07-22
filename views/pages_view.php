<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 07.06.2016
 * Time: 22:41
 */
defined('_INDEX') or die;
if(!$_SESSION['admin']) {
    include 'views/404_view.php';
    exit;
}
?>
<div class="admin-browse-div">
    <div class="page">
        <div class="cont admin-browse-view" style="/*width: 960px; */margin-left: auto; margin-right: auto;">
            <?if($action == 'browse'){?>
                <H2>Перегляд сторінок системи</H2>
                <span id="add-news-icon" title="Додати сторінку"> <a href="/<?=$table_name?>/add"><i class="fa fa-plus fa-lg"></i> <H4>Додати нову сторінку</H4></a></span>
                <span id="return-to-admin-page" title="Повернутися до сторінки адміністратора"><a href="/admin"><i class="fa fa-arrow-left fa-lg"></i></a></span>
            <?}?>
            <div class="admin-view-tabel-div">
                <?=$table_view?>
            </div>
        </div>
