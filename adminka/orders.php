<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 08.06.2016
 * Time: 11:32
 */

include '/views/header.php';
include_once '/adminka/iDataSet.php';

$table = new Tables('orders', 'Замовлення', 'id', 'date', Page::$db, 'Таблиця замовлень');
$table->addField('id', 'int', 'ID', true, false, true, false);
$table->addField('name', 'text', 'Ім’я замовника', false, true, true, false);
$table->addField('telNumber', 'text', 'Номер телефону', false, true, true, false);
$table->addField('email', 'text', 'Електронна пошта', false, true, true, false);
$table->addField('info', 'varchar', 'Інформація', false, true, true, false);
$table->addField('date', 'datetime', 'Час замовлення', false, true, true, false);
$table->addField('done', 'boolean', 'Статус виконання', false, true, true, 'image');

$action = $table->parseUrl();
$table_view = $table->handle();

include '/views/orders_view.php';
include '/views/footer.php';