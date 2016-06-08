<?php
/**
 * Created by PhpStorm.
 * User: gena
 * Date: 22.01.2016
 * Time: 11:07
 */
?>
<div class="container" style="margin-top: 40px;">
    <div class="page">
        <div class="cont admin-browse-view" style="width: 960px; margin-left: auto; margin-right: auto;">
            <?if($action == 'browse'){?>
                <H2>Перегляд замовлень</H2>
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
        line-height: 3.5em;
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