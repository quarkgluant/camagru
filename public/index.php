<?php

session_start();
// require 'Controleur/Controleur.php';
require __DIR__ .'/../app/src/controleur/controleur.php';

?>
<html>
<HEAD>
	<title id="title-doc">Camagru</title>
	<meta content="camagru; sangare; pcadiot; 42; école 42; php" name="keywords">
	<Meta  charset = "UTF-8">
	<link rel="stylesheet" href="css/application.css" />
</head>

<body>
	<center><h1><B> Vous êtes sur Camagru</B></h1></center>
	<br/>
	<br/>
	<br/>
	<p><B><I>Accéder à votre compte :</I></B></p>
	<br/>
	<br/>
	<br/>
	<form method="post" action="../app/src/login.php">
		Pseudo ou adresse mail: <input type="text" name="login" placeholder="login" 		value="Login..."
		onfocus="if(this.value=='Login...'){this.value=''};"
		onblur="if(this.value==''){this.value='Login...'};"/>
		Mot de passe: <input type="password" name="password" placeholder="mot de passe" value="..."
		onfocus="if(this.value=='...'){this.value=''};"
		onblur="if(this.value==''){this.value='...'};"/>
		<input type="submit" name="submit" value="OK" />
		<INPUT TYPE="reset" NAME="reset" VALUE="Effacer">
	</form>
	<br/>
	<br/>
	<br/>
	<br/>

<?php
if (strlen($_SESSION['loggued_on_user']) > 0 && auth($_SESSION['loggued_on_user'], $_SESSION['passwd_hash']) == FALSE)
{
?>

<br/>
<ul id="menu">
		<li><a href="../app/src/views/main_user_password_modify.php">Modifier mon mot de passe</a></li>
<li><a href="../app/src/views/main_user_email_modify.php">Modifier son adresse mail </a></li>
<li><a href="../app/src/views/user_delete.php">Supprimer mon compte</a></li>
<li><a href="../app/src/logout.php">Se déconnecter</a></li>
<li><a href="../app/src/views/main_camagru.php">	Accéder au traitement d'image !</a></li>
</ul>
<?php
}
else
{
 ?>
 <ul id="menu">
 <li><a href="../app/src/password_forgotten.php">Mot de passe oublié ?</a></li>
 <li><a href="../app/src/user_create.php">Créer votre compte utilisateur !!!!</a></li>
</ul>
 <br/>
 <br/>
 <?php
 }
 ?>

<hr/>
<br/>
<p  class = "copyright"> © Camagru - pcadiot/fsangare 2017 </p>
</body>
</html>
