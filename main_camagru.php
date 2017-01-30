<?php

session_start();

?>
<html>
<HEAD>
	<title id="title-doc">Camagru</title>
	<meta content="camagru; sangare; monnier; 42; école 42; php" name="keywords">
	<Meta  charset = "UTF-8">
		<link rel="stylesheet" href="css/user.css" />
<style type="text/css">
.copyright {
font-style : italic ;
font-family : monospace ;
text-align : right ;
}
table {
 width:100%;
 }
td {
 width:50%;
 }
 div
 {
font-style : italic ;
font-family : monospace ;
 }
html {
color: black;
background-color: #DEB887;
background-image: url("https://www.eic.fr/content/externe/site/commun/images/fond.png");
background-repeat: no-repeat;
background-attachment: scroll;
background-position: 50% 50%;
}
h1 {
color :  #000000 ;
text-align : center ;
}
h2 {
	color: red;
	font-style : bold ;
	font-family : monospace ;
	text-align : center;
}
.main
{
 width:80%;
 }
.side {
  	width:20%;
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
	include('./views/header.php');
?>

<table>
<tr>

<?php
	include('./views/main.php');
	include('./views/side.php');
?>

</tr>
</table>
<br/>
<?php
	include('./views/footer.php');
?>
</body>
</html>
