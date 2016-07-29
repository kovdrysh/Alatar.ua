<?php

session_start();

$n = json_decode($_POST['entering']);
$login_post = htmlspecialchars(strip_tags($n->log));
$passw_post = htmlspecialchars(strip_tags($n->pass));

include 'Recordset.php';
$db = new Recordset();
$db->connect();
//$db->SQL("INSERT INTO admin_pasw (user, password) VALUES (?,?)", $login_post, password_hash($passw_post, PASSWORD_DEFAULT));
//$db->SQL("UPDATE admin_pasw SET password=?", password_hash($passw_post, PASSWORD_BCRYPT));

$db->SQL("SELECT * FROM admin_pasw WHERE user=?", $login_post);
$passw = $db->nextRow();

if(($login_post === $passw['user']) && password_verify($passw_post, $passw['password'])){
	$_SESSION['admin'] = true;
	echo true;
}
else{
	echo false;
}

