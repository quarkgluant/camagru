<?php
ob_start();
session_start();

include_once __DIR__ . "/modeles/images.php";
include_once __DIR__ . "/modeles/likes.php";
include_once __DIR__ . "/modeles/reviews.php";
include_once __DIR__ . "/controleur/controleur.php";

$dossier_ref2 = '../../public/img/save/';
$image_path = $dossier_ref2.$_GET['image_supr'];
$image = get_image_by_path(array(
    'image_path' => $image_path
));

$unlike = array(
    'img_id' => $image['img_id'],
    'login' => $_SESSION['loggued_on_user']
);

//$image_supr = array(
//    'image_path' => $image_path,
//    'login' => $_SESSION['loggued_on_user']
//);

$message = unlike_like_all($unlike);
$message2 = delete_review($unlike);
$message3 = delete_image($unlike);

if (!$message && !$message2 && !$message3){
  unlink($image_path);
  header("Location: ./views/main_camagru.php");
}
else {
  include_once __DIR__ . "/views/messages.php";
  echo ob_get_clean();
}
