<?php
session_start();
?>

<html>
<HEAD>
	<meta content="commerce en ligne; sangare; monnier; 42; piscine; php" name="keywords">
	<Meta  charset = "UTF-8">
	<link rel="stylesheet" href="../../public/css/application.css" />
</head>
<body>
<?php
if ($_SESSION['admin'] == 1)
{
?>

<center><B><h1> Menu administration de Robin et Franck ! </h1></B></center>
	<br/>
	<br/>
	<a  href = "category_create.php"> Administration des catégories d'articles ! </a>	<br/><br/>
	<a  href = "item_create.php"> Administration des articles ! </a>	<br/><br/>
	<a  href = "user_create_admin.php"> Administration des utilisateurs ! </a>	<br/><br/>
	<a  href = "basket_list.php"> Listes des paniers utilisateurs ! </a>	<br/><br/>
		<br/>
		<br/>
		<a  href = "../../public/index.php"> Revenir à l'accueil !!!! </a>
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
