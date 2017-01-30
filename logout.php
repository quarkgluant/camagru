<?php

session_start();

$_SESSION['loggued_on_user'] = "";
$_SESSION['admin'] = "";

header("Location: index.php");

?>
