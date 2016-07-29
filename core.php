<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 09.01.2016
 * Time: 11:35
 */
//include_once "auth.php";
session_start();
$ex = explode('?', $_SERVER['REQUEST_URI']);
if ($ex[1] === 'exit=1') {
    $_SESSION = array();
    session_destroy();
    echo '<script type="text/javascript">window.location.href="/"</script>';
}

include_once 'Recordset.php';
include_once 'page.php';
Page::$db = new Recordset();
Page::$db->connect();
Page::$db->SQL("SET NAMES 'utf8' COLLATE 'utf8_general_ci'");
Page::$db->SQL("SET CHARACTER SET 'utf8'");

if (isset($_SESSION['lang'])) {
    Page::$languagePrefix = $_SESSION['lang'];
} else {
    Page::$languagePrefix = '_ukr';
}
Page::$lang = '/';
if (isset($_SESSION['lang'])) {
    if ($_SESSION['lang'] == '_en') {
        Page::$local_const = parse_ini_file('en.ini', true);
        Page::$lang = '/en';
    } elseif ($_SESSION['lang'] == '_ukr') {
        Page::$local_const = parse_ini_file('ukr.ini', true);
        Page::$lang = '/';
    }
} else {
    Page::$local_const = parse_ini_file('ukr.ini', true);
    Page::$lang = '/';
}

$code = "main";
$routes = explode('/', filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_SANITIZE_SPECIAL_CHARS));

array_shift($routes);
if ($routes[0]==='admin' || file_exists('adminka/'.$routes[0].'.php')) {
    if($_SESSION['admin']) {
        if ($routes[0]=='admin') {
            $title = "Сторінка адміністратора";
            include 'views/header.php';
            include 'views/admin_view.php';
            include 'views/footer.php';
        } else {
            include 'adminka/'.$routes[0].'.php';
        }
    } else {
        include 'views/header.php';
        include 'views/404_view.php';
        include 'views/footer.php';
    }
} elseif(count($routes) > 2) {
    include 'views/header.php';
    include 'views/404_view.php';
    include 'views/footer.php';
    die;
} else {
    if (!empty($routes[0])) {
        if($routes[0]!='en') {
            $code = $routes[0];
        }
    }
    if (isset($routes[1]) && $routes[1]==='en') {
        $_SESSION['lang'] = '_en';
        Page::$languagePrefix = $_SESSION['lang'];
    }
    $page = new Page(htmlspecialchars(strip_tags($code)));
    if (!$page->notFound) {
        if ((isset($routes[1]) && $routes[1]==='en') || ($routes[0]==='en' && count($routes)===1)) {
            $_SESSION['lang'] = '_en';
            Page::$languagePrefix = $_SESSION['lang'];
            Page::$local_const = parse_ini_file('en.ini', true);
            Page::$lang = '/en';
        } elseif($routes[0]!='en' && count($routes)<=1) {
            $_SESSION['lang'] = '_ukr';
            Page::$languagePrefix = $_SESSION['lang'];
            Page::$local_const = parse_ini_file('ukr.ini', true);
            Page::$lang = '/';
        } else {
            $page->notFound=true;
        }
    }
    $page->getContent();

    $title = $page->getTitle();

    include 'views/header.php';
    $page->publish();
    include 'views/footer.php';
}