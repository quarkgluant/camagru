<?php

if (isset($_POST["mail"]) && isset($_POST["msg"]) && isset($_POST["obj"]))
{
	$flag = 2;
	if ($_POST["html"] == 'html')
	{
		include("./send_mail_html.php");
	}
	else
	{
		include("./send_mail_TXT.php");
	}
}
else
{
	?>

	</br>
	<H4 style="box-shadow:0 0 10px;">Valeurs saisies incorrects : mail non envoyé !</H4>
	</br>

	<?php
}
$_POST["mail"] = "";
$_POST["msg"] = "";
$_POST["obj"] = "";
$_POST["html"] = "txt";
include("./contact.php");
?>
