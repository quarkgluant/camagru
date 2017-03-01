<?php
session_start();

include_once __DIR__ . "/controleur/controleur.php";
include_once __DIR__ . "/modeles/membres.php";
include_once __DIR__ . "/views/main_user_password_modify.php";

$message = password_modify();

include_once __DIR__ . "/views/messages.php";
