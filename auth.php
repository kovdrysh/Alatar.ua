<?php

session_start();

$n = json_decode($_POST['entering']);
$login_post = htmlspecialchars(strip_tags($n->log));
$passw_post = htmlspecialchars(strip_tags($n->pass));
/*
$access1 = array();
$access1 = file("access.php");
$access1[2] = password_hash($passw_post, PASSWORD_DEFAULT);

$f = fopen("access.php", "w");
fputs($f, implode("", $access1));
fclose($f);
*/

$access = array();
$access = file("access.php");

$login = trim($access[1]);
$passw = trim($access[2]);

if(($login_post === $login) && password_verify($passw_post, $passw)){
	$_SESSION['admin'] = true;
	echo true;
}
else{
	echo false;
}

