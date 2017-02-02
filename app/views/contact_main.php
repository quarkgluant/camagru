


<?php
//include("./auth.php");
//if (strlen($_SESSION['loggued_on_user']) > 0)
//{
?>

</br> Contacts : </br><br/><br/>


<?php
//}
?>
<table>
	<tr>
		<td>
<form method="post" action="contact.php" autocomplete="on">
Votre adresse mail : </td><td><input type="email" name="mail" size="80" maxlength="100" autofocus/></br></br>
</td></tr>
<tr><td>
Objet du message : </td><td><input list="listObj" name="Obj" size="110" maxlength="150">
<datalist id="listObj">
  <option value="Problèmes techniques">
  <option value="Besoin d'informations complémentaires">
  <option value="Candidature libre">
  <option value="Autre">
</datalist></br>
</td></tr>
<tr><td>
Votre message : </td><td><TEXTAREA name="msg" rows=10 cols=120 wrap="physical" />Votre message.</TEXTAREA>
</td></tr><tr><td></br>
	<input type="radio" name="html" value="text" checked> Format texte<br>
  <input type="radio" name="html" value="html"> Format HTML<br>
</br></br>
<input type="submit" name="submit" value="Envoi Mail" />
</form>
</td></tr>
</table>
<br/>	<br/>
<br/>
<a  href = "./main_camagru.php"> Revenir à la page précédente !!!! </a>
<br/>
<br/><br/>

<?php
if (isset($_POST['mail']) && isset($_POST['msg']) && isset($_POST['obj']))
{
	if ($_POST['html'] == 'html')
	{
		include('./send_mail_html.php');
	}
	else
	{
		include('./send_mail_txt.php');
	}
}
else
{
	if ($flag == '1')
	{
	?>
	<br/>	<br/><h4>Mail non envoyé : zones incorrectements remplis !</h4>
	<br/>
<?php
	}
	else
	{
		$flag = '1';
	}
}
?>
