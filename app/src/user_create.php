<?php
ob_start();

session_start();

include_once __DIR__ . "/modeles/membres.php";
include_once __DIR__ . "/controleur/controleur.php";
include_once __DIR__ . "/views/user_create.php";

$message = identification_user();

if ($message == '1')
{
    header('Location: ./views/main_camagru.php');
    exit();
}
else
  include_once __DIR__ . "/views/messages.php";

 echo ob_get_clean();
