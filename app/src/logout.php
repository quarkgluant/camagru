<?php

session_start();

$_SESSION['loggued_on_user'] = "";
$_SESSION['admin'] = "";
$_SESSION['passwd_hash'] = "";

header("Location: ../../public/index.php");

?>
