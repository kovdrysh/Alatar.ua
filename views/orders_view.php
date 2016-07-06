<?php
/**
 * Created by PhpStorm.
 * User: gena
 * Date: 22.01.2016
 * Time: 11:07
 */
defined('_INDEX') or die;
?>
<div class="container" style="margin-top: 40px;">
    <div class="page">
        <div class="cont admin-browse-view" style="width: 960px; margin-left: auto; margin-right: auto;">
            <?if($action == 'browse'){?>
                <H2>Перегляд замовлень</H2>
                <span id="add-news-icon" title="Додати сторінку"> <a href="/<?=$table_name?>/add"><i class="fa fa-plus fa-lg"></i> <H4>Додати нову сторінку</H4></a></span>
                <span id="return-to-admin-page" title="Повернутися до сторінки адміністратора"><a href="/admin"><i class="fa fa-arrow-left fa-lg"></i></a></span>
            <?}?>
            <div class="admin-view-tabel-div">
                <?=$table_view?>
            </div>
        </div>



<style>
    .admin-view-table tr:first-of-type{
        padding: 10px 0;
    }
    .admin-view-table td .browse-div-text{
        /*line-height: 3.5em;*/
        word-break: normal;
    }

    .admin-view-table tr:not(:first-of-type){
        height: 4.5em;
    }

    .admin-view-tabel-div{
        margin-top: 25px;
    }
    .admin-view-table td{
        padding: 0px 15px;
    }

</style>