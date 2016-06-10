<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 10.06.2016
 * Time: 14:45
 */

include '/views/header.php';
include_once('/adminka/iDataSet.php');
$table = new Tables('menu_en', 'Категорії', 'id', 'id', Page::$db, 'Таблиця: Товари');
$table->addField('id', 'int', 'ID', true, false, true, false);
$table->addField('caption', 'text', 'Назва', false, true, true, false);

$action = $table->parseUrl();

$table_view = $table->handle();
include '/views/pages_view.php';
include '/views/footer.php';