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
