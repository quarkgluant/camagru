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
	<B><h1> Gestion des articles </h1></B>
</center>
<br/>
<br/>
<table>
<tr>
	<td>
		<div class="element" style="background: rgb(128,218,235)">
			Référence article
		</div>
	</td>
	<td>
		<div class="element" style="background: rgb(128,218,235)">
			Prix unitaire en Euros
		</div>
	</td>
</tr>




<?php
include("./items_get.php");
include("./items_push.php");

$items = items_get();

if (isset($items))
{
	foreach($items as $entry)
	{
?>


<tr>
	<td>
		<div class="element" >
		<?php echo $entry['name']; ?>
		</div>
	</td>
	<td>
		<div class="element" >
			 <?php echo $entry['pu']; ?>
		</div>
	</td>
	<td>
		<form method="post" action="item_delete.php">
			<input type="hidden" name="name" value=<?php echo '"' . $entry['name'] .'"' ;?> />
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

<table>
	<tr>
<form method="post" action="item_create_do.php">	<td>
	Nom de l'article: </td><td><input type="text" name="name" /></td>
</tr>	<tr><td>
	Prix unitaire: </td><td><input type="number" name="pu" min="1" max="1000000000" maxlength="15" value ="1"/></td>
	</tr>
	<tr><td>

<?php
include("./category_get.php");
include("./category_push.php");

$category = category_get();

if (isset($category))
{
	foreach($category as $entry)
	{
		echo $entry ." ";
?>


<input type="checkbox" name=<?php echo '"' . $entry .'"' ;?> value=<?php echo '"' . $entry .'"' ;?> />


<?php
	}
}
?>


	<input type="submit" name="submit" value="OK" />
</form>
</td>
	</tr>
</table>
<br/>
<br/>


<a href = "admin.php"> Revenir en arrière !!!! </a>
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
