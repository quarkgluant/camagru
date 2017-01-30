<?php

session_start();

?>
<html>
<HEAD>
	<title id="title-doc">Camagru</title>
	<meta content="camagru; sangare; monnier; 42; école 42; php" name="keywords">
	<Meta  charset = "UTF-8">
<style type="text/css">
.copyright {
font-style : italic ;
font-family : monospace ;
text-align : right ;
}
table {
 border-width:1px;
 border-style:solid;
 border-color:black;
 width:50%;
 }
td {
 border-width:1px;
 border-style:solid;
 border-color:black;
 width:50%;
 }
 div{
	 font-style : italic ;
	 font-family : monospace ;
	background-color: #FFFACD;
	}
html {
color: black;
background-color: #DEB887;
background-image: url("https://www.eic.fr/content/externe/site/commun/images/fond.png");
background-repeat: no-repeat;
background-attachment: scroll;
background-position: 50% 50%;
}
h1 {
color :  #000000 ;
text-align : center ;
}
h2 {
	color: red;
	font-style : bold ;
	font-family : monospace ;
	text-align : center;
}
.copyright {
font-style : italic ;
font-family : monospace ;
text-align : right ;
}

:link {
color: #0000ee;
font-style : italic ;
font-family : monospace ;
}

:link:active {
color: #ee0000;
font-style : italic ;
font-family : monospace ;
}

:link:visited {
color: #551a8b;
font-style : italic ;
font-family : monospace ;
}
</style>
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
	<form method="post" action="login.php">
		Pseudo ou adresse mail: <input type="text" name="login" value=""/>
		Mot de passe: <input type="password" name="passwd" value=""/>
		<input type="submit" name="submit" value="OK" />
		<INPUT TYPE="reset" NAME="reset" VALUE="Effacer">
	</form>
	<br/>
	<br/>
	<br/>
	<br/>

<?php
include("./auth.php");
if (strlen($_SESSION['loggued_on_user']) > 0)
{
?>

<br/>
<a href="user_modif.html">Modifier mon mot de passe</a>
		<br />
<a href="user_delete.php">Supprimer mon compte</a>
		<br/>
<a href="logout.php">Se deconnecter</a>
<br/>
<br/>
<br/>
<h2><p>	Vous étes connecté(e) !<br/><br/></P></h2>

<?php
}
else
{
 ?>

 <a href="user_create.php">Créer votre compte utilisateur !!!!</a>
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
