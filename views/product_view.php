<?php
/**
 * Created by PhpStorm.
 * User: gena
 * Date: 26.01.2016
 * Time: 19:48
 */
?>
<div class="container" style="margin-top: 40px;">
    <div class="page">
        <?$counter = -1;
        foreach($this->data as $row){
            $counter++;?>
            <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header"><?=$row['caption']?></h1>
                </div>
            </div>
            <ul class="products-container col-xs-12">
            <?foreach($this->products[$counter] as $row1){?>
                <li class="col-md-3 col-sm-4 col-xs-6 img-portfolio ">
                    <div class = "product1">
                        <img class="img-responsive" src="/images/<?=$row1['image']?>" alt="" style="width: 100%;">
                        <h3>
                            <?=$row1['caption']?>
                        </h3>
                        <p><?=$row1['price']?> грн/<?=$row1['measure']?></p>
                    </div>
                </li>
            <?}?>
            </ul>
        <?}?>
<style>
.product1{
    box-shadow: 0 0 5px rgba(0,0,0,0.5);
    padding:10px;
}



</style>