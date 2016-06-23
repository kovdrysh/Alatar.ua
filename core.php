<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 09.01.2016
 * Time: 11:35
 */

include "/auth.php";
include '/ErrorHandler.php';
//set_error_handler('/ErrorHandler::myErrorHandler');
//register_shutdown_function('/ErrorHandler::fatalErrorHandler');

if(isset($_GET['exit'])){
    if($_GET['exit'] == 1){
        $_SESSION = array();
        session_destroy();
        echo '<script type="text/javascript">window.location.href="/"</script>';
    }
}
session_start();
include '/Recordset.php';
include '/page.php';
Page::$db = new Recordset();
Page::$db->connect(Page::$host, Page::$dbname, Page::$user, Page::$pass);

if(isset($_SESSION['lang'])){
    Page::$languagePrefix = $_SESSION['lang'];
}
else{
    Page::$languagePrefix = '_ukr';
}
if(isset($_SESSION['lang'])){
    if($_SESSION['lang'] == '_en'){
        Page::$local_const = parse_ini_file('/en.ini', true);
    }
    elseif($_SESSION['lang'] == '_ukr'){
        Page::$local_const = parse_ini_file('/ukr.ini', true);
    }
}
else{
    Page::$local_const = parse_ini_file('/ukr.ini', true);
}


$code = "main";
$routes = explode('/', $_SERVER['REQUEST_URI']);
array_shift($routes);

if($routes[0]==='admin' || file_exists('adminka/'.$routes[0].'.php')){
    if(IN_ADMIN){
        if($routes[0]=='admin'){
            include '/views/header.php';
            include '/views/admin_view.php';
            include '/views/footer.php';
        }
        else{
            include '/adminka/'.$routes[0].'.php';
        }
    }
    else{
        include '/views/header.php';
        include '/views/404_view.php';
        include '/views/footer.php';
    }
}
else {
    if (!empty($routes[0])) {
        $code = $routes[0];
    }

    $page = new Page($code);

    $page->getContent();

    $title = $page->getTitle();

    include '/views/header.php';
    $page->publish();
    include '/views/footer.php';
}