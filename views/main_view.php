<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26.01.2016
 * Time: 17:49
 */
?>
<!-- Header Carousel -->
<header id="myCarousel" class="carousel slide">
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
<div class="container" style="margin-top: 40px;position: relative; display: table; height: auto;margin-bottom: 40px">
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
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading style-panel-head-main">
                        <h4><i class="fa fa-fw fa-tree"></i> <?=Page::$local_const['static']['jointer']?></h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading style-panel-head-main">
                        <h4><i class="fa fa-fw fa-fire"></i> <?=Page::$local_const['static']['wood_drying']?></h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading style-panel-head-main">
                        <h4><i class="fa fa-fw fa-check"></i> <?=Page::$local_const['static']['heat_treatment']?></h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading style-panel-head-main">
                        <h4><i class="fa fa-fw fa-truck"></i> <?=Page::$local_const['static']['wood_transporting']?></h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading style-panel-head-main">
                        <h4><i class="fa fa-fw fa-compass"></i> <?=Page::$local_const['static']['fast_perfomance']?></h4>
                    </div>
                    <div class="panel-body">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, optio corporis quae nulla aspernatur in alias at numquam rerum ea excepturi expedita tenetur assumenda voluptatibus eveniet incidunt dicta nostrum quod?</p>

                    </div>
                </div>
            </div>
        </div>

        <style>
            #myCarousel{
                margin-top: 10px;
            }
        </style>
