<?php

session_start();
$flag = '0';
?>
<HTML>
<HEAD>
	<title id="title-doc">Camagru</title>
	<meta content="camagru; sangare,cadiot,42,école 42,php,HTML5,webcam,cybercaméra,caméra,getUserMedia,device,multimédia,vidéo,MediaStream" name="keywords">
	<Meta  charset = "UTF-8">
<meta name="viewport" content="initial-scale=1.0,width=device-width" />
<link rel="stylesheet" href="../../public/css/application.css" />
</HEAD>
<body>

<?php
	include('../views/header.php');
?>
<hr/>
<br/>
<table  name="table1">
<tr>

<?php
	include('../views/contact_main.php');
?>

</tr>
</table>
<br/>

<?php
	include('../views/footer.php');
?>

</body>
</html>
