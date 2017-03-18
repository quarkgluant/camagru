<?php
session_start();

include_once __DIR__ . "/modeles/membres.php";
include_once __DIR__ . "/controleur/controleur.php";
include_once __DIR__ . "/views/user_password_modify.php";

$message = password_modify();

if ($message == '1') {
    header("Location: ../app/src/views/main_camagru.php");
    exit;
} else
    include_once __DIR__ . "/views/messages.php";
