<?php
$flag = 0;
if (filter_var($_POST["mail"], FILTER_VALIDATE_EMAIL))
    $flag = 1;
if (strlen($_POST["mail"]) != 0 && strlen($_POST["msg"]) != 0 && strlen($_POST["obj"]) != 0 && $flag == 1) {
    $flag = 2;
    if ($_POST["html"] == 'html') {
        include("./send_mail_html.php");
    } else {
        include("./send_mail_TXT.php");
    }
} else {
    ?>

    </br>
    <H4 style="box-shadow:0 0 10px;">Valeurs saisies incorrects : mail non envoyé !</H4>
    </br>

    <?php
}
include("./contact.php");
?>
