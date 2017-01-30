<?php

include("./users_get.php");
include("./users_push.php");
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
	<center><B><h1>Ouvrez vous à la magie de Camagru !</h1></B></center>
		<br/>
		<br/>
		<br/>
		<p><B><I>Création de votre profil utilisateur :</I></B></p>
		<br/>
		<br/>
		<?php
		//On verifie que le formulaire a ete envoye
		if(isset($_POST['login'], $_POST['password'], $_POST['passverif'], $_POST['email']) and $_POST['login']!='')
		{
		        //On enleve lechappement si get_magic_quotes_gpc est active
		        if(get_magic_quotes_gpc())
		        {
		                $_POST['login'] = stripslashes($_POST['login']);
		                $_POST['password'] = stripslashes($_POST['password']);
		                $_POST['passverif'] = stripslashes($_POST['passverif']);
		                $_POST['email'] = stripslashes($_POST['email']);
		        }
		        //On verifie si le mot de passe et celui de la verification sont identiques
		        if($_POST['password']==$_POST['passverif'])
		        {
		                //On verifie si le mot de passe a 6 caracteres ou plus
		                if(strlen($_POST['password'])>=8)
		                {
		                        //On verifie si lemail est valide
		                        if(preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$_POST['email']))
		                        {
															$users = users_get();
																foreach($users as $user)
																	{
																		if ($user['login'] === $_POST['login'] || $user['email'] === $_POST['email'])
																			{
                                        //Sinon, on dit que le pseudo voulu est deja pris
                                        $form = true;
                                        $message = 'Un autre utilisateur utilise d&eacute;j&agrave; le nom d\'utilisateur que vous d&eacute;sirez utiliser.';
																			}
																		else
																			{
																				$passwd_hash = hash('whirlpool', $_POST['passwd']);
																				$users[] = array('login' => $_POST['login'], 'email' => $_POST['email'], 'passwd' => $passwd_hash);
																				users_push($users);
																				//Si ca a fonctionne, on naffiche pas le formulaire
																				$form = false;
?>


													<div class="message">Vous avez bien &eacute;t&eacute; inscrit. Vous pouvez dor&eacute;navant vous connecter.<br/><br/>
													<a href="index.php">Se connecter</a></div>

<?php
		                        				}
																}
														}
		                        else
		                        {
		                                //Sinon, on dit que lemail nest pas valide
		                                $form = true;
		                                $message = 'L\'email que vous avez entr&eacute; n\'est pas valide.';
		                        }
		                }
		                else
		                {
		                        //Sinon, on dit que le mot de passe nest pas assez long
		                        $form = true;
		                        $message = 'Le mot de passe que vous avez entr&eacute; contien moins de 8 caract&egrave;res.';
		                }
		        }
		        else
		        {
		                //Sinon, on dit que les mots de passes ne sont pas identiques
		                $form = true;
		                $message = 'Les mots de passe que vous avez entr&eacute; ne sont pas identiques.';
		        }
		}
		else
		{
		        $form = true;
		}
		if($form)
		{
		        //On affiche un message sil y a lieu
		        if(isset($message))
		        {
		                echo '<h2><p><div class="message">'.$message.'</div><br/><br/></P></h2>';
		        }
		        //On affiche le formulaire
		?>
<form method="post">
	Pseudo : <input type="text" name="username" value=""/>
	Mail : <input type="email" name="email" value=""/>
	Mot de passe: <input type="password" name="password" value=""/>
	Vérification du mot de passe: <input type="password" name="passverif" value=""/>
	<input type="submit" name="submit" value="OK" />
	<INPUT TYPE="reset" NAME="reset" VALUE="Effacer">
</form>

<?php
}
?>

<br/>
<br/>
<br/>
<a  href = "index.php"> Revenir à l'accueil !!!! </a>
<br/>
<br/>
<br/>
<hr/>
<br/>
<p  class = "copyright"> © Camagru - pcadiot/fsangare 2017 </p>
</body>
</html>
