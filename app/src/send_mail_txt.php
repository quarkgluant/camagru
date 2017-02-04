<?php
$destinataire = 'sangare@rocketmail.com';
// Pour les champs $expediteur / $copie / $destinataire, séparer par une virgule s'il y a plusieurs adresses
$expediteur = 'fsangare@student.42.fr';
$copie = $_POST['mail'];
//$copie_cachee = 'pcadiot@student.42.fr';
$objet = $_POST['obj']; // Objet du message
$headers  = 'MIME-Version: 1.0' . "\n"; // Version MIME
$headers .= 'Reply-To: '.$expediteur."\n"; // Mail de reponse
$headers .= 'From: "Camagru contact"<'.$expediteur.'>'."\n"; // Expediteur
$headers .= 'Delivered-to: '.$destinataire."\n"; // Destinataire
$headers .= 'Cc: '.$copie."\n"; // Copie Cc
$headers .= 'Bcc: '.$copie_cachee."\n\n"; // Copie cachée Bcc
$message = $_POST['msg'];
if (mail($destinataire, $objet, $message, $headers)) // Envoi du message
{
?>

</br>
<H5 style="color: green; text-align:center; font-style : bold ; font-family : monospace ; box-shadow:0 0 10px;"> Mail correctement envoyé au format Texte !</H5>
</br>

<?php
}// Envoi du message
  else
{// Non envoyé
?>

</br>
<H4>Problème d'envoi du mail au format Texte !</H4>
</br>

<?php
}
$_POST["mail"] = "";
$_POST["msg"] = "";
$_POST["obj"] = "";
$_POST["html"] = "txt";
?>
