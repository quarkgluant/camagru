<?php

session_start();

include __DIR__. "/auth.php";

$ret = auth($_POST['login'], $_POST['password']);
if ($ret == 1)
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
}
else if ($ret == 2)
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	$_SESSION['admin'] = 1;
}
else
{
	$_SESSION['loggued_on_user'] = "";
}

include_once __DIR__ . '/main_camagru.php'

?>
