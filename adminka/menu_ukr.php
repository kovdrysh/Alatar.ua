<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11.06.2016
 * Time: 12:53
 */

include '/views/header.php';
include_once('/adminka/iDataSet.php');
$table = new Tables('menu_ukr', 'Категорії', 'id', 'id', Page::$db, 'Таблиця: Товари');
$table->addField('id', 'int', 'ID', true, false, true, false);
$table->addField('caption', 'text', 'Назва', false, true, true, false);
$table_name = 'menu_ukr';
$action = $table->parseUrl();

$table_view = $table->handle();
include '/views/menu_view.php';
include '/views/footer.php';