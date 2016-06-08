<?
include_once 'methods.php';
$n = json_decode($_POST['order']);
$method = $n->method;

if(method_exists('SQLMethods',$method)) {
    SQLMethods::$method($_POST['order']);
}

$n = json_decode($_POST['contacts_change']);
$method = $n->method;

if (method_exists('SQLMethods',$method)){
    SQLMethods::$method($_POST['contacts_change']);
}

$n = json_decode($_POST['map_change']);
$method = $n->method;

if (method_exists('SQLMethods',$method)){
    SQLMethods::$method($_POST['map_change']);
}