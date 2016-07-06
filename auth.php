<?php

session_start();

$n = json_decode($_POST['entering']);
$login_post = $n->log;
$passw_post = $n->pass;
/*
$access1 = array();
$access1 = file("access.php");
$access1[2] = password_hash($passw_post, PASSWORD_DEFAULT);

$f = fopen("access.php", "w");
fputs($f, implode("", $access1));
fclose($f);
*/
$enter_post = $n->ent;
$access = array();
$access = file("access.php");

$login = trim($access[1]);
$passw = trim($access[2]);

if(($login_post === $login) && password_verify($passw_post, $passw)){
	$_SESSION['admin'] = true;
	//define("IN_ADMIN", TRUE);
	echo true;
}
else{
	//$_SESSION['admin'] = false;
	//define("IN_ADMIN", FALSE);
	echo false;
}

/*
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
	*/
