<?php
session_start();

?>

<HTML>
  <?php
  if (strlen($_SESSION['loggued_on_user']) > 0)
  {
  ?>
    <HEAD>
        <title id="title-doc">Camagru : changement de mot de passe !</title>
        <meta content="camagru; sangare,cadiot,42,école 42,php,HTML5,webcam,cybercaméra,caméra,getUserMedia,device,multimédia,vidéo,MediaStream" name="keywords">
        <Meta  charset = "UTF-8">
        <meta name="viewport" content="initial-scale=1.0,width=device-width" />
        <?php
        if (basename(__DIR__) === "src"){
            $href = "../../public/css/application.css";
        }
        elseif (basename(__DIR__) === "views") {
            $href = "../../../public/css/application.css";
        }
        ?>
        <link rel="stylesheet" <?= "href="."'".$href."'" ?> />
        </HEAD>
        <body>

            <?php
            include __DIR__ . '/header.php';
            ?>
            <hr/>
            <br/>
            <table>
                <tr>
                <?php
                  include __DIR__ . '/user_password_modify.php';
                ?>

          </tr>
            </table>

            <br/>


            <?php
            include __DIR__ . '/footer.php';
            ?>
        </body>
        <?php
        }
        ?>
</html>
