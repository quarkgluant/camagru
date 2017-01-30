<?php

session_start();

header("Location: ../../public/index.php");

unset($_SESSION['basket']);

?>
