<?php
session_start();

include_once __DIR__ . "/modeles/reviews.php";
include_once __DIR__ . "/controleur/controleur.php";
$commentaire = array('login' => $_SESSION['loggued_on_user'], 'comment' => $_POST['comment'], 'img_id' => $_POST['image_hidden']);
$message = sauvegarde_review($commentaire);
if ($message == "xxxxxxxxxx"){
include_once __DIR__ . "comments_mail.php";
}
header("Location: ../../app/src/views/main_camagru.php");
exit();
include_once __DIR__ . "/views/messages.php";
echo ob_get_clean();
