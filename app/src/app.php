<?php
session_start();
?>
<html>
<HEAD>
	<title id="title-doc">Camagru</title>
	<meta content="camagru; sangare; pcadiot; 42; école 42; php" name="keywords">
	<Meta  charset = "UTF-8">
	<link rel="stylesheet" href="../../public/css/application.css" />
<style type="text/css">

</head>
<body>

<?php
	include '../views/header.php';
?>

<table>
<tr>

<?php
	include '../views/main.php';
	include '../views/side.php';
?>

</tr>
</table>
<br/>
<?php
	include '../views/footer.php';
?>
</body>
</html>
