<?php

session_start();

?>
<HTML>
<HEAD>
	<title id="title-doc">Camagru</title>
	<meta content="camagru; sangare,cadiot,42,école 42,php,HTML5,webcam,cybercaméra,caméra,getUserMedia,device,multimédia,vidéo,MediaStream" name="keywords">
	<Meta  charset = "UTF-8">
    <meta name="viewport" content="initial-scale=1.0,width=device-width" />
    <link rel="stylesheet" href="/base/public/css/application.css" />
    <script>

     <?php
    include __DIR__ . '/../../../public/js/confirm_del.js';
    include __DIR__ . '/../../../public/js/decor.js';
    ?>

    </script>
</HEAD>
<body>
    <?php
        include __DIR__ . '/header.php';
    ?>
     <hr/>
    <br/>
    <table>
        <tr>
            <td>

                <table  name = "table1">
                    <tr>
                        <?php
                            include __DIR__ . '/main.php';
                        ?>

                    </tr>
                </table>

        	</td>

            <?php
                include __DIR__ . '/side.php';
            ?>
        </tr>
    </table>

    <br/>

    <?php
    	include __DIR__ . '/footer.php';
    ?>

    <script>
     <?php
     include __DIR__ . '/../../../public/js/camera.js';
     ?>

    </script>
</body>
</html>
