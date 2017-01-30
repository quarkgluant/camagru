<?php

session_start();

include __DIR__. "/auth.php";

$ret = auth($_POST['login'], $_POST['passwd']);
if ($ret == 1)
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	header("Location: ../../public/index.php");
}
else if ($ret == 2)
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	$_SESSION['admin'] = 1;
	header("Location: ../../public/index.php");
}
else
{
	$_SESSION['loggued_on_user'] = "";
	header("Location: ../../public/index.php");
}

?>
