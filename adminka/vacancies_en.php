<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11.06.2016
 * Time: 16:59
 */

defined('_INDEX') or die;
include 'views/header.php';
include_once('adminka/iDataSet.php');
$table = new Tables('vacancies_en', 'Вакансії', 'id', 'caption', Page::$db, 'Перегляд вакансій');
$table->addField('id', 'int', 'ID', true, false, true, false);
$table->addField('caption', 'text', 'Назва', false, true, true, false);
$table->addField('info', 'varchar', 'Інфоормація', false, true, true, false);
$table->addField('image', 'image', 'Зображення', false, true, true, false);

$table_name = 'vacancies_en';
$action = $table->parseUrl();

$table_view = $table->handle();
include 'views/vacancy-change_view.php';
include 'views/footer.php';