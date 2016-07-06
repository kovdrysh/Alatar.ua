<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 26.01.2016
 * Time: 19:39
 */
defined('_INDEX') or die;
?>
<div class="container" style="margin-top: 40px;">
    <div class="page">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?=Page::$local_const['static']['our_location']?>
                
            </h1>
        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <!-- Map Column -->
        <div class="col-md-8 col-xs-12">
            <!-- Embedded Google Map -->
            <iframe id="contact-map" width="100%" height="500px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="<?=$this->data1[0]['map_link']?>"></iframe>
        </div>
        <!-- Contact Details Column -->
        <div class="col-md-4">
            <h3><?=Page::$local_const['static']['contacts']?></h3>
                <p><i class="fa fa-home"></i> <?=Page::$local_const['static']['adress']?></p>
                <p><i class="fa fa-phone"></i> 093-238-32-62</p>
                <p><i class="fa fa-envelope-o"></i> alatar@gmail.com</p>
                <p><i class="fa fa-clock-o"></i> <?=Page::$local_const['static']['working_mode']?></p>
        </div>
    </div>
    <!-- /.row -->

    <!-- Contact Form -->
    <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    

<style>
    iframe{
        margin-left: 0px;
        margin-right: 0px;
    }
</style>