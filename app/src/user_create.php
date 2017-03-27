<?php
ob_start();

session_start();

include_once __DIR__ . "/modeles/membres.php";
include_once __DIR__ . "/controleur/controleur.php";
include_once __DIR__ . "/views/user_create.php";

$message = identification_user();

if ($message == '1')
{
    include_once __DIR__ . "/user_create_mail.php";
    header('Location: ./views/main_camagru.php?nb_page=0&move=z');
    exit();
}
else
  include_once __DIR__ . "/views/messages.php";

 echo ob_get_clean();
    ?>
