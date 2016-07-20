<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26.01.2016
 * Time: 17:49
 */
defined('_INDEX') or die;
?>
<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide" <?if($_SESSION['admin']){ echo 'style="margin-top:-20px;"';}?>>
    <!-- Indicators -->


    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <div class="fill" style="background-image:url('/images/11.jpg');"></div>

        </div>
        <div class="item">
            <div class="fill" style="background-image:url('/images/22.jpg');"></div>

        </div>
        <div class="item">
            <div class="fill" style="background-image:url('/images/33.jpg');"></div>

        </div>
        <div class="item">
            <div class="fill" style="background-image:url('/images/44.jpg');"></div>

        </div>
        <div class="item">
            <div class="fill" style="background-image:url('/images/55.jpg');"></div>

        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>
<div class="container" style="margin-top: 40px;position: relative; display: table; height: auto;">
    <div class="page">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?=Page::$local_const['static']['our_services']?>
                </h1>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading style-panel-head-main">
                        <h4><i class="fa fa-fw fa-shopping-cart"></i> <?=Page::$local_const['static']['lumber_sales']?></h4>
                    </div>
                    <div class="panel-body">
                        <p><?=Page::$local_const['static']['timber_sale_op']?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading style-panel-head-main">
                        <h4><i class="fa fa-fw fa-tree"></i> <?=Page::$local_const['static']['jointer']?></h4>
                    </div>
                    <div class="panel-body">
                        <p><?=Page::$local_const['static']['surface_planer_op']?></p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading style-panel-head-main">
                        <h4><i class="fa fa-fw fa-fire"></i> <?=Page::$local_const['static']['wood_drying']?></h4>
                    </div>
                    <div class="panel-body">
                        <p><?=Page::$local_const['static']['wood_drying_op']?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading style-panel-head-main">
                        <h4><i class="fa fa-fw fa-check"></i> <?=Page::$local_const['static']['heat_treatment']?></h4>
                    </div>
                    <div class="panel-body">
                        <p><?=Page::$local_const['static']['heat_treatment_op']?></p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading style-panel-head-main">
                        <h4><i class="fa fa-fw fa-truck"></i> <?=Page::$local_const['static']['wood_transporting']?></h4>
                    </div>
                    <div class="panel-body">
                        <p><?=Page::$local_const['static']['wood_transporting_op']?></p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading style-panel-head-main">
                        <h4><i class="fa fa-fw fa-compass"></i> <?=Page::$local_const['static']['fast_perfomance']?></h4>
                    </div>
                    <div class="panel-body">
                        <p><?=Page::$local_const['static']['fast_perfomance_op']?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="reasons">
    <div class="container">
        <h1>Чому клієнти звертаються до нас</h1>
        <div class="reason-items">
            <div class="item col-sm-6">
                <div class="item-img">
                    <img src="/images/pricing-reason-img.png">
                </div>
                <div class="item-text">
                    <span><strong>Вигідні ціни</strong></span>
                    Купуйте якісні пиломатеріали по вигідним цінам.
                </div>
            </div>
            <div class="item col-sm-6">
                <div class="item-img">
                    <img src="/images/quality_reason_img.png">
                </div>
                <div class="item-text">
                    <span><strong>Якісна продукція</strong></span>
                    Ми гарантуємо високу якість товарів. Кваліфіковані спеціалісти контролюють процес виробництва товарів.
                </div>
            </div>
            <div class="item col-sm-6">
                <div class="item-img">
                    <img src="/images/choice_reason_img.png">
                </div>
                <div class="item-text">
                    <span><strong>Широкий вибір товарів</strong></span>
                    Ми надаємо великий асортимент товарів. Продукція з різних порід дерев, та необхідних розмірів.
                </div>
            </div>
            <div class="item col-sm-6">
                <div class="item-img">
                    <img src="/images/workers_reason_img.png">
                </div>
                <div class="item-text">
                    <span><strong>Кваліфіковані спеціалісти</strong></span>
                    У нас працюють висококваліфіковані спеціалісти області деревообробки.
                </div>
            </div>
        </div>
    </div>
</div>

<style>

</style>
