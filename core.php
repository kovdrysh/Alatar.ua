<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 09.01.2016
 * Time: 11:35
 */
include "auth.php";

//include 'ErrorHandler.php';
$ex = explode('?', $_SERVER['REQUEST_URI']);
if($ex[1] === 'exit=1'){
    $_SESSION = array();
    session_destroy();
    echo '<script type="text/javascript">window.location.href="/"</script>';
}

session_start();
//set_error_handler('\\ErrorHandler::myErrorHandler');
//register_shutdown_function('\\ErrorHandler::fatalErrorHandler');
include 'Recordset.php';
include 'page.php';
Page::$db = new Recordset();
Page::$db->connect(Page::$host, Page::$dbname, Page::$user, Page::$pass);
Page::$db->SQL("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
Page::$db->SQL("SET CHARACTER SET 'utf8'");

if(isset($_SESSION['lang'])){
    Page::$languagePrefix = $_SESSION['lang'];
}
else{
    Page::$languagePrefix = '_ukr';
}
$lang = '/';
if(isset($_SESSION['lang'])){
    if($_SESSION['lang'] == '_en'){
        Page::$local_const = parse_ini_file('en.ini', true);
        $lang = '/en';
    }
    elseif($_SESSION['lang'] == '_ukr'){
        Page::$local_const = parse_ini_file('ukr.ini', true);
        $lang = '/';
    }
}
else{
    Page::$local_const = parse_ini_file('ukr.ini', true);
    $lang = '/';
}


$code = "main";
$routes = explode('/', $_SERVER['REQUEST_URI']);
array_shift($routes);

if($routes[0]==='admin' || file_exists('adminka/'.$routes[0].'.php')){
    if(IN_ADMIN){
        if($routes[0]=='admin'){
            $title = "Сторінка адміністратора";
            include 'views/header.php';
            include 'views/admin_view.php';
            include 'views/footer.php';
        }
        else{
            include 'adminka/'.$routes[0].'.php';
        }
    }
    else{
        include 'views/header.php';
        include 'views/404_view.php';
        include 'views/footer.php';
    }
}
else {
    if (!empty($routes[0])) {
        if($routes[0]!='en') {
            $code = $routes[0];
        }
    }
    $page = new Page($code);

    $page->getContent();

    $title = $page->getTitle();

    include 'views/header.php';
    $page->publish();
    include 'views/footer.php';
}