<?php
session_start();
include_once __DIR__ . "/../modeles/membres.php";
include_once __DIR__ . "/../modeles/images.php";
include_once __DIR__ . "/../modeles/reviews.php";
include_once __DIR__ . "/../modeles/likes.php";
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
        <title id="title-doc">Camagru</title>
        <meta content="camagru; sangare,cadiot,42,école 42,php,HTML5,webcam,cybercaméra,caméra,getUserMedia,device,multimédia,vidéo,MediaStream" name="keywords">
        <meta name="viewport" content="width=device-width, user-scalable=no">
        <Meta charset = "UTF-8">
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
        <script type="text/javascript">

        <?php
        if (basename(__DIR__) === "src"){
          include __DIR__ . '/../../public/js/confirm_del.js';
          include __DIR__ . '/../../public/js/decor.js';
          include __DIR__ . '/../../public/js/fusion.js';
          include __DIR__ . '/../../public/js/confirm.js';
        }
        elseif (basename(__DIR__) === "views") {
          include __DIR__ . '/../../../public/js/confirm_del.js';
          include __DIR__ . '/../../../public/js/decor.js';
          include __DIR__ . '/../../../public/js/fusion.js';
          include __DIR__ . '/../../../public/js/confirm.js';
        }

        ?>

        </script>
        </HEAD>
        <body>

            <?php
            include __DIR__ . '/header.php';
            ?>
            <hr/>
            <br/>
            <table  id="tableau">
                <tr>
                    <td>

                        <table  id="table1">
                            <tr>
                                <?php
                                include __DIR__ . '/main.php';
                                ?>

                            </tr>
                        </table>

                    </td>
                  <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>

                    <?php
                    include __DIR__ . '/side.php';
                    ?>
                                      <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <?php
                    include __DIR__ . '/side2.php';
                      ?>
                </tr>
            </table>

            <br/>


            <?php
            include_once __DIR__ . "/messages.php";
            include __DIR__ . '/footer.php';
            ?>

            <script>
            <?php
            include __DIR__ . '/../../../public/js/camera.js';
            ?>

            </script>
        </body>
        <?php
        }
        ?>
</html>
