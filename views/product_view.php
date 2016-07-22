<?php
/**
 * Created by PhpStorm.
 * User: gena
 * Date: 26.01.2016
 * Time: 19:48
 */
?>
<div class="container" style="margin-top: 40px;margin-bottom: 50px;">
    <div class="page">
        <?$counter = -1;
        foreach($this->data as $row){
            $counter++;?>
            <div class="row">
                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h1 class="page-header"><?=$row['caption']?></h1>
                </div>
            </div>
            <div class="products-container">
            <?foreach($this->products[$counter] as $row1){?>
                <div class="img-portfolio ">
                        <a href="/<?=$row1['code'].Page::$lang?>">
                            <img class="img-responsive" src="/images/<?=$row1['image']?>" alt="<?=$row1['caption']?>" style="width: 100%;">
                        </a>
                        <a href="/<?=$row1['code'].Page::$lang?>">
                            <h3><?=$row1['caption']?></h3>
                        </a>
                        <p><?=$row1['price']?> грн/<?=$row1['measure']?></p>

                </div>
            <?}?>
            </div>
        <?}?>
