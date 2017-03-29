<?php
session_start();
include_once __DIR__ . "/modeles/membres.php";
include_once __DIR__ . "/modeles/images.php";
include_once __DIR__ . "/controleur/controleur.php";

$expediteur = 'pathibul.r@gmail.com';

$destinataire = get_mail($_SESSION['loggued_on_user']);
$_SESSION['tag'] = 'GOOD';
$objet = "Commentaire fait sur le site Camagru " . $destinataire; // Objet du message
$headers = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n"; // l'en-tete Content-type pour le format HTML
$headers .= 'Reply-To: ' . $expediteur . "\n"; // Mail de reponse
$headers .= 'From: "Camagru contact"<' . $expediteur . '>' . "\n"; // Expediteur
$headers .= 'Delivered-to: ' . $destinataire . "\n"; // Destinataire

$message = '<div style=' . '"' . 'width: 100%; text-align: center; font-weight: bold' . '"' . '></br></br>Image : '.$_POST['image_hidden'].'</br><center><i><B>'.$_SESSION['loggued_on_user'].' : Vous venez de faire le commentaire suivant sur le site Camagru !</B></i></center></br>'.$_POST['comment'].'</br></br></BR><HR/><div style="width: 100%; text-align: right">&copy;Camagru.fr</div>';

    if (mail($destinataire, $objet, $message, $headers)) {
            ?>

            </br>
            <H5 style="color: green; text-align:center; font-style : bold ; font-family : monospace ; box-shadow:0 0 10px;">
                Mail correctement envoyé au format HTML !</h5>
            </br>

            <?php
        }// Envoi du message
        else {// Non envoyé
            ?>

            </br>
            <H4>Problème d'envoi du mail au format HTML !</H4>
            </br>

            <?php
      }

$_POST["mail"] = "";
$_POST["msg"] = "";
$_POST["obj"] = "";
$_POST["html"] = "txt";
$_POST["msg"] = "";
$_SESSION['tag'] = 'BAD';
?>
