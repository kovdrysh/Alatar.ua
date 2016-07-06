<?php
/**
 * Created by PhpStorm.
 * User: gena
 * Date: 10.06.2016
 * Time: 16:54
 */
defined('_INDEX') or die;
if(!$_SESSION['admin']) {
    include 'views/404_view.php';
    die;
}
?>
<div class="admin-browse-div" style="margin-top: 40px;">
    <div class="page">
        <div class="cont admin-browse-view" style="margin-left: auto; margin-right: auto;">
            <?if($action == 'browse'){?>
                <H2>Перегляд товарів</H2>
                <span id="add-news-icon" title="Додати сторінку"> <a href="/<?=$table_name?>/add"><i class="fa fa-plus fa-lg"></i> <H4>Додати нову сторінку</H4></a></span>
                <span id="return-to-admin-page" title="Повернутися до сторінки адміністратора"><a href="/admin"><i class="fa fa-arrow-left fa-lg"></i></a></span>
            <?}?>
            <div class="admin-view-tabel-div">
                <?=$table_view?>
            </div>
        </div>


<style>
    .admin-view-table td:nth-child(3) .browse-div-text{
        line-height: 3.5em;
        word-break: normal;
    }

    .admin-view-table tr:not(:first-of-type){
        height: 4.5em;
    }

    .admin-view-table td:last-of-type .browse-div-text{
        line-height: 14pt;
        vertical-align: middle;
        max-width: 130px;
    }
    .admin-view-table td{
        padding: 0px 15px;
    }
    #add-news-icon{

    }
    .admin-view-tabel-div{
        margin-top: 20px;
    }
    .admin-browse-view h4{
        display: inline-block;
    }
</style>