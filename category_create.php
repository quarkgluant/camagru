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
include("./category_get.php");
include("./category_push.php");

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
