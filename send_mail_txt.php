<?php

$destinataire = 'pathibul.r@gmail.com';
//$destinataire = 'sangare@rocketmail.com';
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
$expediteur = 'fsangare@student.42.fr';
//$copie = 'pcadiot@student.42.fr';
//$copie_cachee = 'sangare@rocketmail.com';
$objet = '1ers mails from Camagru (V7)'; // Objet du message
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Content-type: text/plain; charset="iso-8859-1'."\n"; // l'en-tete Content-type pour le format TXT
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: "Camagru contact"<'.$expediteur.'>'."\n"; // Expediteur
$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
$headers .= 'Cc: '.$copie."\n"; // Copie Cc
$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc
$message = 'Un Bonjour de '.$expediteur."\n à ".$copie.".\n";
if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
			echo "Votre message a bien été envoyé";
  else // Non envoyé
  		echo "Votre message n'a pas pu être envoyé";

?>
