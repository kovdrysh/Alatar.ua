<?php
session_start();

$n = json_decode($_POST['entering']);
$login_post = $n->log;
$passw_post = $n->pass;
$enter_post = $n->ent;

$access = array();
$access = file("access.php");

$login = trim($access[1]);
$passw = trim($access[2]);

if ($enter_post == 'true')
{
	$_SESSION['login'] = $login_post;
	$_SESSION['passw'] = $passw_post;
	//session_write_close();
}
if (empty($_SESSION['login']) or
	$login != $_SESSION['login'] or
	$passw != $_SESSION['passw']){
		define("IN_ADMIN", FALSE);
		echo false;
}
else{
	define("IN_ADMIN", TRUE);
	echo true;
}
?>