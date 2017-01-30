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
	<B><h1> Liste des paniers utilisateurs </h1></B>

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

		<tr>
			<td>

			</td>
			<td>

			</td>
			<td>

			</td>
		</tr>
</table>


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
