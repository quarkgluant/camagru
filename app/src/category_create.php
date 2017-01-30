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
<center>
	<B><h1> Gestion des catégorie d'articles </h1></B>
</center>
<br/>
<br/>
<table>
<tr>
	<td>
		<div class="element" style="background: rgb(128,218,235)">
			Référence Catégorie article
</div>
	</td>
	<td>
	</td>

</tr>


<?php
include("category_get.php");
include("category_push.php");

$category = category_get();

if (isset($category))
{
	foreach($category as $entry)
	{
?>


<tr>
	<td>
		<div class="element" >
		<?php echo $entry; ?>
	</div>
	</td>
	<td>
		<form method="post" action="category_delete.php">
			<input type="hidden" name="name" value=<?php echo '"' . $entry .'"' ;?> />
			<input type="submit" name="submit" value="Supprimer"/>
		</form>
	</td>
</tr>


<?php
	}
}
?>


</table>

<br/>
<br/>

<form method="post" action="category_create_do.php">
	Catégorie :
	<input type="text" name="name" />
	<input type="submit" name="submit" value="OK"/>
	<input type="reset"/>
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
