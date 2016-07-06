<?
defined('_INDEX') or die;
include_once 'methods.php';
if($_POST['order']) {
    $n = json_decode($_POST['order']);
    $method = $n->method;

    if (method_exists('SQLMethods', $method)) {
        SQLMethods::$method($_POST['order']);
    }
}
elseif($_POST['contacts_change']){
    $n = json_decode($_POST['contacts_change']);
    $method = $n->method;

    if (method_exists('SQLMethods', $method)) {
        SQLMethods::$method($_POST['contacts_change']);
    }
}
elseif($_POST['map_change']){
    $n = json_decode($_POST['map_change']);
    $method = $n->method;

    if (method_exists('SQLMethods', $method)) {
        SQLMethods::$method($_POST['map_change']);
    }
}
elseif($_POST['language']){
    //var_dump($_POST['language']);
    $n = htmlentities($_POST['language']);
    //if($n == 'en' || $n == 'ukr'){
        SQLMethods::setLanguageInfo($n);
    //}

}