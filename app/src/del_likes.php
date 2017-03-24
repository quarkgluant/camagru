<?php
ob_start();
session_start();

include_once __DIR__ . "/modeles/images.php";
include_once __DIR__ . "/modeles/likes.php";
include_once __DIR__ . "/controleur/controleur.php";

$image = get_image_by_user(array(
    'login' => $_SESSION['loggued_on_user']
));

$unlike = array(
    'img_id' => $image['img_id'],
    'login' => $_SESSION['loggued_on_user']
);

$message = unlike_like($unlike);
if (!$message){
  header("Location: ./views/main_camagru.php");
}

include_once __DIR__ . "/views/messages.php";
echo ob_get_clean();
