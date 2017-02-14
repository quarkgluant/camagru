<?php
include_once __DIR__ . "/views/main_user_password_modify.php";
include_once __DIR__ . "/controleur/controleur.php";

$message = password_modify();

include_once __DIR__ . "/views/messages.php";
