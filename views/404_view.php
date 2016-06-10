<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 21.01.2016
 * Time: 13:56
 */
?>
<div class="container" style="margin-top: 40px;">
    <div class="page">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">

                <h1>Error 404</h1>
                <h2><?=Page::$local_const['text1_404']?></h2>
                <div class="error-details"><?=Page::$local_const['text2_404']?></div>
                <div class="error-actions">
                    <a href="/"><button type="button" class="btn btn-primary style-order-button">На головну</button></a>
                    <a href="/products"><button type="button" class="btn btn-primary style-order-button">До списку товарів</button></a>
                </div>
            </div>
        </div>
    </div>


<style>

    .error-template {padding: 40px 15px;text-align: center;}
    .error-actions {margin-top:15px;margin-bottom:15px;}
    .error-actions .btn { margin-right:10px; margin-bottom: 15px;}
</style>