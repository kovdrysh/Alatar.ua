<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10.06.2016
 * Time: 14:18
 */

include 'views/header.php';
include_once('adminka/iDataSet.php');
$table = new Tables('pages_en', 'Сторінки', 'code', 'id', Page::$db, 'Таблиця: Сторінки');
$table->addField('id', 'int', 'ID', true, false, true, false);
$table->addField('code', 'text', 'Код', false, false, true, false);
$table->addField('caption', 'text', 'Назва', false, true, true, false);
$table->addField('content', 'varchar', 'Зміст', false, true, false, false);
$table->addField('isContainer', 'boolean', 'Контейнер', false, true, false, false);
$table_name = 'pages_en';
$action = $table->parseUrl();

$table_view = $table->handle();
include 'views/pages_view.php';
include 'views/footer.php';