<?php
session_start();
include_once __DIR__ . "/../modeles/membres.php";
include_once __DIR__ . "/../controleur/controleur.php";

?>

<HTML>
  <?php
  if (strlen($_SESSION['loggued_on_user']) <= 0 || auth_user($_SESSION['loggued_on_user'], $_SESSION['passwd_hash']) == TRUE)
  {
    ?>

  <head></head><body><B></br></br></br></br></br></br><center><div>Erreur de connexion : petit malin !!!!!</div></center><br/><br/></B></body>

  <?php
  }
  else
  {
  ?>
    <HEAD>
        <title id="title-doc">Camagru : Commentaires !</title>
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
                  $email = get_mail($_SESSION['loggued_on_user']);
                  include __DIR__ . '/comments2.php';
                ?>

          </tr>
            </table>
            <?php
            include_once __DIR__ . "/messages.php";
            include __DIR__ . '/footer.php';
            ?>
        </body>
        <?php
        }
        ?>
</html>
