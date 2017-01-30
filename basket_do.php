<?php

session_start();

header("Location: index.php");

if (strlen($_POST['name']) <= 0 || $_POST['qt'] <= 0 || $_POST['pu'] <= 0)
	exit();

$_SESSION['basket'][] = array('name' => $_POST['name'], 'qt' => $_POST['qt'], 'pu' => $_POST['pu']);

?>
