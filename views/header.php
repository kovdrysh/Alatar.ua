<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26.01.2016
 * Time: 17:39
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Кращі пиломатеріали в Києві.....">
    <meta name="author" content="">

    <title><?=$title?></title>
    <!--<link rel="shortcut icon" href="/images/copy2_converted.ico" type="image/x-icon">-->
    <link rel="shortcut icon" href="http://alatar.ua/images/favicon.ico">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/modern-business.css" rel="stylesheet">
    <link href="/css/login.css" rel="stylesheet">
    <?if(IN_ADMIN){?>
    <link rel="stylesheet" href="/adminka/css/admin.css">
    <link rel="stylesheet" href="/adminka/css/jquery-ui-timepicker-addon.css">
    <link rel="stylesheet" href="/adminka/css/jquery-ui.css">
    <?}?>
    <!-- Custom Fonts -->
	<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/site.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top header-style" role="navigation">
    <div class="header-tel-number col-lg-10 col-lg-offset-1 col-xs-12">
        <span><i class="fa fa-phone"></i> 093-238-32-62</span>
        <span class="lang" id="ukr" title="Українською"><img src="/images/Ukraine-Flag.png"></span>
        <span class="lang" id="en" title="English"><img src="/images/United-Kingdom-flag.png"></span>
        <?if(IN_ADMIN) {?>
            <span><a href="?exit=1">Вийти</a></span>
            <span><a href="/admin">Сторінка адміністратора</a></span>
        <?}?>
    </div>
    <div class="container col-lg-10 col-lg-offset-1 col-xs-12">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div id="brand-title-div">
                <a class="navbar-brand" href="/"><img src="/images/alatar2.png" style="height:50px">
                    <div id="brand-title"> <?=Page::$local_const['static']['Alatar']?></div>
                </a>
            </div>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?=$lang?>"><i class = "fa fa-home"></i> <?=Page::$local_const['static']['main_page']?></a>
                </li>
                <li>
                    <a href="/about<?=$lang?>"><i class = "fa fa-tree"></i> <?=Page::$local_const['static']['about']?></a>
                </li>
                <li>
                    <a href="/product<?=$lang?>"><i class = "fa fa-bars"></i> <?=Page::$local_const['static']['products']?></a>
                </li>
                <li>
                    <a href="/vacancy<?=$lang?>"><i class="fa fa-info"></i> <?=Page::$local_const['static']['vacancy']?></a>
                </li>
                <li>
                    <a href="/contacts<?=$lang?>"><i class="fa fa-info"></i> <?=Page::$local_const['static']['contacts']?></a>
                </li>
                <li>
                    <a href="/order<?=$lang?>"><i class="fa fa-shopping-cart"></i> <?=Page::$local_const['static']['order']?></a>
                </li>
                
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>
<a href="" class="overlay" id="win2"></a>
    <div class="popup">
        <div class = "order-success">
            <h2><?=Page::$local_const['order_success1']?></h2>
            <h4><?=Page::$local_const['order_success2']?></h4>
            <a href="/"><button type="button" class="btn btn-primary">На головну</button></a>
            <a href = "/product"><button type="button" class="btn btn-primary">До списку товарів</button></a>
        </div>
    </div>

<a href="" class="overlay" id="admin"></a>
        <div class="popup">
            <div class = "form-group" id = "enter">
                <label for ="text">Введіть логін</label>
                <input type = "text" class = "form-control" id = "login">
            </div>
            <div class = "form-group">
                <label for ="text">Введіть пароль</label>
                <input type = "password" class = "form-control" id = "passw">
            </div>
            <p class="help-block">Увага! Вхід тільки для адміністраторів сайту.</p>
            <button type="submit" class="btn btn-success" onclick="enterAdmin()">Увійти</button>
        </div>

<a href="" class="overlay" id="win3"></a>
    <div class="popup">
        <div class = "order-success">
            <h2>Товар доданий!</h2>
            <a href="/add-product"><button type="button" class="btn btn-primary">Додати ще один товар</button></a>
            <a href = "/product"><button type="button" class="btn btn-primary">До списку товарів</button></a>
        </div>
    </div>
    <a href="" class="overlay" id="win4"></a>
    <div class="popup">
        <div class = "order-success">
            <h2>Нова категорія додана!</h2>
            <a href="/add-product-type"><button type="button" class="btn btn-primary">Додати ще одну категорію</button></a>
            <a href = "/product"><button type="button" class="btn btn-primary">До списку товарів</button></a>
        </div>
    </div>


<style>

.order-success h2{
    margin-top: 0;
}

</style>