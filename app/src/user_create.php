<?php
session_start();

include_once __DIR__ . "/modeles/membres.php";
include_once __DIR__ . "/controleur/controleur.php";
include_once __DIR__ . "/views/user_create.php";

$message = identificationUser();

if ($message == '1') {
header("Location: ../app/src/views/main_camagru.php");
exit;
}
else
  include_once __DIR__ . "/views/messages.php";

?>
