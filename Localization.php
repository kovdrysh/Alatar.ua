<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 09.06.2016
 * Time: 21:13
 */

defined('_INDEX') or die;

session_start();
if(($_POST['language']) == 'ukr'){
    $_SESSION['lang'] = '_ukr';
}
elseif(($_POST['language']) == 'en'){
    $_SESSION['lang'] = '_en';
}
