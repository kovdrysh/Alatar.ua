<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 18.07.2016
 * Time: 16:36
 */
?>

<div class="container">
    <div class="page">
        <div class="product-container">
            <H1><?=$this->pcaption?></H1>
            <img src="/images/<?=$this->pimage?>" alt="<?=$this->pcaption?>">
            <div class="product-info-container">
                <div class="product-price-container">
                    <span><?=$this->pprice?> грн./<?=$this->pmeasure?></span>
                </div>
                <div class="product-order">
                    <span><?=Page::$local_const['static']['product_order']?>: 093-238-32-62</span>
                </div>
            </div>
        </div>

        <div class="related-products">
            <h1><?=Page::$local_const['static']['similar_materials']?></h1>
            <div class="products-container">
            <?foreach($this->relatedProducts as $row){?>
                <div class="img-portfolio ">
                        <a href="/<?=$row['code'].Page::$lang?>">
                            <img class="img-responsive" src="/images/<?=$row['image']?>" alt="<?=$row['caption']?>" style="width: 100%;">
                        </a>
                        <a href="/<?=$row['code'].Page::$lang?>">
                            <h3><?=$row['caption']?></h3>
                        </a>
                        <p><?=$row['price']?> грн/<?=$row['measure']?></p>

                </div>
            <?}?>
            </div>
        </div>

