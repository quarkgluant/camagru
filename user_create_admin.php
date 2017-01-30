<?php
session_start();
?>
<html>
<HEAD>
	<meta content="commerce en ligne; sangare; monnier; 42; piscine; php" name="keywords">
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
background-image: url("./paysage-122.jpg");
background-repeat: no-repeat;
background-attachment: scroll;
background-position: 50% 50%;
}

h1 {
color :  #000000 ;
text-align : center ;
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
<?php
if ($_SESSION['admin'] == 1)
{
?>
<center>
	<B><h1> Gestion des utilisateurs</h1></B>
</center>
<br/>
<br/>

<table>
<tr>
	<td>
		<div class="element" style="background: rgb(128,218,235)">
			Identifiant utilisateur
		</div>
	</td>
	<td>
		<div class="element" style="background: rgb(128,218,235)">
			Admin O/N
		</div>
	</td>
	<td>
	</td>
</tr>


<?php
include("./users_get.php");
include("./users_push.php");

$users = users_get();

if (isset($users))
{
	foreach($users as $entry)
	{
?>


<tr>
	<td>
		<div class="element" >
			<?php echo $entry['login']; ?>
		</div>
	</td>
	<td>
	</td>
	<td>
		<?php if (!($entry['login'] == 'admin'))
		{

		?>
		<form method="post" action="user_delete_admin.php">
			<input type="hidden" name="name" value=<?php echo '"' . $entry['login'] .'"' ;?> />
			<input type="submit" name="submit" value="Supprimer"/>
		</form>
		<?php
	} ?>
	</td>
</tr>


<?php
	}
}
?>


</table>

<br/>
<br/>

<form method="post" action="user_create_admin_do.php">
	Name :
	Identifiant: <input type="text" name="login" />  Mot de passe: <input type="password" name="passwd" />
	Admin : <input type="checkbox" name="admin" value="true" />
	<input type="submit" name="submit" value="OK"/>
</form>

<br/>
<br/>
<a  href = "admin.php"> Revenir en arrière !!!! </a>
<Hr/>
<P  class = "copyright"> © rmonnier/fsangare 2016 </p>
	<?php
	}
	else {
		echo "PERMISSION DENIED\n";
	}
	?>
</body>
</html>
