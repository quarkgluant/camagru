<?php

$destinataire = 'patcadiot@laposte.net';
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
$expediteur = 'fsangare@student.42.fr';
$copie = 'sangare@rocketmail.com';
//$copie_cachee = 'pcadiot@student.42.fr';
$objet = '1ers mails from Camagru (V7)'; // Objet du message
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Content-type: text/html; charset=ISO-8859-1'."\n"; // l'en-tete Content-type pour le format HTML
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: "Camagru contact"<'.$expediteur.'>'."\n"; // Expediteur
$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
$headers .= 'Cc: '.$copie."\n"; // Copie Cc
$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc
$message = '<div style="width: 100%; text-align: center; font-weight: bold">Un bonjour de '.$expediteur.'<BR/>A bient&ocirc;t chez Camagru.<BR/></div><BR/><HR/><div style="width: 100%; text-align: right">&copy;Camagru.fr</div>';
if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
			echo "Votre message a bien été envoyé";
  else // Non envoyé
  		echo "Votre message n a pas pu être envoyé";

?>
