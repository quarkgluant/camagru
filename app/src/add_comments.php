<?php
ob_start();
session_start();

include_once __DIR__ . "/modeles/images.php";
include_once __DIR__ . "/modeles/reviews.php";
include_once __DIR__ . "/controleur/controleur.php";
$dossier_ref2 = '../../public/img/save/';
$image_path = $dossier_ref2 . $_POST['image_hidden'];
$image = get_image_by_path(array(
    'image_path' => $image_path
));

$comment = htmlspecialchars($_POST['comment']);
$commentaire = array(
    'login' => $_SESSION['loggued_on_user'],
    'comment' => $comment,
    'img_id' => $image['img_id']
);

$message = sauvegarde_review($commentaire);
if (!$message){
  include_once __DIR__ . "/comments_mail.php";
  header("Location: ./views/main_camagru.php");
}

include_once __DIR__ . "/views/messages.php";
echo ob_get_clean();
