<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11.06.2016
 * Time: 13:25
 */
defined('_INDEX') or die;
include 'views/header.php';
include_once('adminka/iDataSet.php');
$table=new Tables('map', 'Мапа', 'id', 'map_link',Page::$db,'');
$table->addField('id', 'int', 'ID', false, false, true, false);
$table->addField('map_link', 'text', 'Фрейм мапи', false, true, true, false);
$table_name = 'map';
$action = $table->parseUrl();

$table_view = $table->handle();
include 'views/map_view.php';
include 'views/footer.php';