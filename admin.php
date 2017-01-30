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

<center><B><h1> Menu administration de Robin et Franck ! </h1></B></center>
	<br/>
	<br/>
	<a  href = "category_create.php"> Administration des catégories d'articles ! </a>	<br/><br/>
	<a  href = "item_create.php"> Administration des articles ! </a>	<br/><br/>
	<a  href = "user_create_admin.php"> Administration des utilisateurs ! </a>	<br/><br/>
	<a  href = "basket_list.php"> Listes des paniers utilisateurs ! </a>	<br/><br/>
		<br/>
		<br/>
		<a  href = "index.php"> Revenir à l'accueil !!!! </a>
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
