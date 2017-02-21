<?php

session_start();

include_once __DIR__. "/controleur/controleur.php";

$ret = auth($_POST['login'], $_POST['password']);

if ($ret == 1)
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
    header("Location: ./views/main_camagru.php");
}
else if ($ret == 2)
{
	$_SESSION['loggued_on_user'] = $_POST['login'];
	$_SESSION['admin'] = 1;
    header("Location: ./views/main_camagru.php");
}
else
{
	$_SESSION['loggued_on_user'] = "";
    header("Location: ../../public/index.php");
}
