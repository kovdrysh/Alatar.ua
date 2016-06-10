<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 09.03.2016
 * Time: 17:00
 */

include '/views/header.php';
include_once('/adminka/iDataSet.php');
$table = new Tables('pages_ukr', 'Сторінки', 'code', 'id', Page::$db, 'Таблиця: Сторінки');
$table->addField('id', 'int', 'ID', true, false, true, false);
$table->addField('code', 'text', 'Код', false, false, true, false);
$table->addField('caption', 'text', 'Назва', false, true, true, false);
$table->addField('content', 'varchar', 'Зміст', false, true, false, false);
$table->addField('isContainer', 'boolean', 'Контейнер', false, true, false, false);

//$subTable = new SubTable($table, 'page_concept', 'Поняття сторінки', 'id', 'page_code', Page::$db);
//$subTable->addField('id','int','ID',true,false,true);
//$subTable->addField('page_code','text','Сторінка',false,false,true);
//$subTable->addField('concept','text','Поняття',false,true,true);
$action = $table->parseUrl();

$table_view = $table->handle();
include '/views/pages_view.php';
include '/views/footer.php';