<?php

include_once __DIR__ . "/modeles/membres.php";
include_once __DIR__ . "/controleur/controleur.php";
session_start();
delete_user();
include __DIR__ . '/logout.php';

?>
