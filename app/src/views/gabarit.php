<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="../../public/css/application.css" />
        <title id="title-doc">Camagru</title>
        <meta content="camagru; sangare,cadiot,42,école 42,php,HTML5,webcam,cybercaméra,caméra,getUserMedia,device,multimédia,vidéo,MediaStream" name="keywords">
        <Meta charset = "UTF-8">
        <meta name="viewport" content="initial-scale=1.0,width=device-width" />
        <link rel="stylesheet" href="/base/public/css/application.css" />
        <script>

         <?php
        include __DIR__ . '/../../../public/js/confirm_del.js';
        include __DIR__ . '/../../../public/js/decor.js';
        ?>

        </script>

    </head>
    <body>
        <div id="global">
            <header>
                <a href="index.php"><h1 id="titreBlog">Mon Blog</h1></a>
                <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
            </header>
            <div id="contenu">
                <?= $contenu ?>
            </div> <!-- #contenu -->
            <footer id="piedBlog">
                Blog réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div> <!-- #global -->
    </body>
</html>
