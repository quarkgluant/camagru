<html>
<html>
<HEAD>
	<meta content="commerce en ligne; sangare; monnier; 42; piscine; php" name="keywords">
	<Meta  charset = "UTF-8">
    <link rel="stylesheet" href="../../public/css/application.css" />
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
