<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10.06.2016
 * Time: 14:26
 */
defined('_INDEX') or die;
include 'views/header.php';
include_once('adminka/iDataSet.php');
$table = new Tables('products_ukr', 'Товари', 'id', 'id', Page::$db, 'Таблиця: Товари');
$table->addField('id', 'int', 'ID', true, false, true, false);
$table->addField('caption', 'text', 'Назва', false, true, true, false);
$table->addField('menu_type', 'lookup', 'Тип меню', false, true, true, false);
$table->addLookupField('menu_type', 'menu_ukr', 'caption', 'caption');
$table->addField('measure', 'text', 'Розмірність', false, true, true, false);
$table->addField('price', 'text', 'Ціна', false, true, true, false);
$table->addField('info', 'varchar', 'Інформація', false, true, true, false);
$table->addField('image', 'image', 'Зображення', false, true, false, false);
$table_name = 'products_ukr';
$action = $table->parseUrl();

$table_view = $table->handle();
include 'views/products_view.php';
include 'views/footer.php';