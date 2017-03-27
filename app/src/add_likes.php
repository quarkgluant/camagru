<?php
ob_start();
session_start();

include_once __DIR__ . "/modeles/images.php";
include_once __DIR__ . "/modeles/likes.php";
include_once __DIR__ . "/controleur/controleur.php";

$dossier_ref2 = '../../public/img/save/';
$image_path = $dossier_ref2.$_GET['image_add'];
$image = get_image_by_path(array(
   'image_path' => $image_path
));

$like = array(
   'img_id' => $image['img_id'],
   'login' => $_SESSION['loggued_on_user']
);

$message = sauvegarde_like($like);
if (!$message){
 header("Location: ./views/main_camagru.php");
}

include_once __DIR__ . "/views/messages.php";
echo ob_get_clean();
    ?>
