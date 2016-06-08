<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 09.01.2016
 * Time: 11:35
 */

include "/auth.php";
if(isset($_GET['exit'])){
    if($_GET['exit'] == 1){
        $_SESSION = array();
        session_destroy();
        echo '<script type="text/javascript">window.location.href="/"</script>';
    }
}
include '/Recordset.php';
include '/page.php';
Page::$db = new Recordset();
Page::$db->connect(Page::$host, Page::$dbname, Page::$user, Page::$pass);

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
    $page = new Page($code, false);

    $page->getContent();

    $title = $page->getTitle();
    include '/views/header.php';
    $page->publish();
    include '/views/footer.php';
}