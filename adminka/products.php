<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 08.06.2016
 * Time: 12:33
 */

include 'views/header.php';
include_once 'adminka/iDataSet.php';

$table = new Tables('products', 'Товари', 'id', 'id', Page::$db, 'Перегляд товарів');
$table->addField('id', 'int', 'ID', true, false, true, false);
$table->addField('caption', 'text', 'Назва', false, true, true, false);
$table->addField('menu_type', 'text', 'Тип', false, true, true, false);
$table->addField('measure', 'text', 'Одиниці виміру', false, true, true, false);
$table->addField('price', 'text', 'Ціна', false, true, true, false);
$table->addField('info', 'varchar', 'Інформація', false,true,true, false);
$table->addField('image', 'image', 'Зображення', false, true, true, false);

$action = $table->parseUrl();
$table_view = $table->handle();

include 'views/product_view.php';
include 'views/footer.php';