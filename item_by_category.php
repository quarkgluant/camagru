<html>
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
			<center><B><h1> Faîtes vos courses chez Robin et Franck</h1></B>
</center>
<table contentEditable="true">
		<tr>
			<td>
			<div class="element" style="background: rgb(128,218,235)">
			Catégorie article
			</div>
		</td>
		<td>
		xxxxxxxxxxx
	</td>
	</tr>
</table>
<br/>

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
include("./items_get.php");
include("./items_push.php");

$items = items_get();

if (isset($items))
{
	foreach($items as $i_entry)
	{
		if (in_array($_GET['category'], $i_entry['categories']) || $_GET['category'] == 'all')
		{
?>


<tr>
	<td>
		<div class="element">
		 <?php echo $i_entry['name']; ?>
		</div>
	</td>
	<td>
		<div class="element" >
			<?php echo $i_entry['pu']; ?>
		</div>
	</td>
	<td>
	<form method="post" action="basket_do.php">
			<input type="number" name="qt" min="0" max="30" maxlength="2"/>
			<input type="hidden" name="name" value=<?php echo '"' . $i_entry['name'] .'"' ;?> />
			<input type="hidden" name="pu" value=<?php echo '"' . $i_entry['pu'] .'"' ;?> />
					<input type="submit" name="submit" value="Valider article par article"/>

	</form>
	</td>
</tr>

	<?php
		}
	}
}
	?>
</table>

<br/>
<br/>
<a  href = "index.php"> Revenir à l'accueil !!!! </a>
<Hr/>
<P  class = "copyright"> © rmonnier/fsangare 2016 </p>
</body>
</html>
