<?php
ob_start();
session_start();

include_once __DIR__ . "/modeles/images.php";
include_once __DIR__ . "/modeles/reviews.php";
include_once __DIR__ . "/controleur/controleur.php";

$image = get_image_by_user(array(
    'login' => $_SESSION['loggued_on_user']
));
// var_dump($image);
$commentaire = array(
    'login' => $_SESSION['loggued_on_user'],
    'comment' => $_POST['comment'],
    'img_id' => $image['img_id']
);
// var_dump($commentaire);
$message = sauvegarde_review($commentaire);
if (!$message){
  include_once __DIR__ . "/comments_mail.php";
  header("Location: ./views/main_camagru.php");
}

include_once __DIR__ . "/views/messages.php";
echo ob_get_clean();
