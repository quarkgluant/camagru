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
	<center>
		<h1><B> Valider votre panier</B></h1>
<br/><br/><br/>
	</center>
  <table contentEditable="true">

		<table contentEditable="true">
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
			<td>
				<div class="element" style="background: rgb(128,218,235)">
					Quantité
				</div>
			</td>
		</tr>


<?php

include("./category_get.php");
include("./category_push.php");

	$category = category_get();

	if (isset($_SESSION['basket']))
	{
		foreach($_SESSION['basket'] as $entry)
		{
	?>

	<?php echo '<tr><td><div class="element">'.$entry['name'] .'</div></td> <td><div class="element">'. $entry['pu'].'</div></td> <td><div class="element">' . $entry['qt'].'</div></td></tr>';?>


<?php
	}
}
?>
<tr>
	<td>

	</td>
	<td>

	</td>
	<td>
<?php echo $tot; ?>

</td>
</tr>
</table>


<br/>
<form method="post" action="basket_validate.php">
	<input type="submit" name="submit" value="Valider le Panier"></input>
</form>
<br/>
<form method="post" action="basket_empty.php">
	<input type="submit" name="submit" value="Vider le Panier"></input>
</form>
<br/>
<br/>
<a  href = "index.php"> Revenir à l'accueil !!!! </a>
<br/>

<hr/>
<p  class = "copyright"> © rmonnier/fsangare 2016 </p>
</body>
</html>
