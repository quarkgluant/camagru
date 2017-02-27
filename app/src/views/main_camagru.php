<HTML>
<HEAD>
    <title id="title-doc">Camagru</title>
    <meta content="camagru; sangare,cadiot,42,école 42,php,HTML5,webcam,cybercaméra,caméra,getUserMedia,device,multimédia,vidéo,MediaStream"
          name="keywords">
    <Meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,width=device-width"/>
    <?php
    if (basename(__DIR__) === "src"){
        $href = "../../public/css/application.css";
    }
    elseif (basename(__DIR__) === "views") {
        $href = "../../../public/css/application.css";
    }
    ?>
    <link rel="stylesheet" <?= "href="."'".$href."'" ?> />
    <script>

        function confirmDel() {
            var r = confirm("Voulez-vous réellement supprimer votre profil ?");
            if (r == true) {
                x = "Vous avez confirmé !";
                location.href = '../../public/index.php';
            } else {
                x = "Vous avez changé d'avis !";
            }
        }

        function decor() {
            select = document.getElementById("decor");
            choice = select.selectedIndex  // Récupération de l'index du <option> choisi
            valeur_cherchee = select.options[choice].value; // Récupération de la valeur du <option> choisi
            img = "imgtag2";// Nom de l'image
            img.src = valeur_cherchee;
            var r = confirm(valeur_cherchee);
        }

    </script>
</HEAD>
<body>
<header>
    <center><h1><B> Vous êtes sur Camagru (poil au ...)</B></h1></center>

    <nav>
        <ul>
            <li><a href="../password_modify.php">Modifier son mot de passe !</a></li>
            <li><a href="javascript:confirmDel()">Supprimer son compte !</a></li>
            <li><a href="./contact.php">Contacts</a></li>
            </br>
            <li><i><a href="../../../public/index.php"> Revenir à l'accueil !!!! </a></i></li>
            <br/>
            <h3><a href="../../../public/index.php">Se déconnecter !</a></h3>
        </ul>
    </nav>

</header>
<hr/>
<br/>
<table>
    <tr>
        <td>

            <table name="table1">
                <tr>
                    <td class="main">
                        <form>
                            <table style="border:solid 1px black; border-radius:5px; text-align:left; box-shadow:0 0 10px;">
                                <tr>
                                    <td>
                                        <div>
                                            <input type="button" value="Click photo !" id="save"/>
                                            <b><- Prenez une photo ! -><b/>
                                        </div>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            </br>
                                            <canvas id="canvas" width="500" height="375"></canvas>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="container">
                                            <video autoplay id="videoElement">
                                            </video>
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <input id="fileselect" type="file" accept="image/*" capture="camera">
                                            <b><- Ou choisissez une image ! -><b/>
                                        </div>
                                    </td>
                                    <td>
                                        <div id="container2">
                                            <img id="imgtag" src="" width="500" height="375" alt="capture d'image"
                                                 style="position:absolute;z-index:1;"/>
                                            <img id="imgtag2" src="" width="500" height="375"
                                                 style="position:absolute;z-index:2;"/>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <input type="reset">
                        </form>
                    </td>

                </tr>
            </table>

        </td>

        <td class="side" syle="margin-top:10px; margin-right:10px;">
            Modifiez vos images !
            <ul>
                <li><a href="#">Vos images sauvegardées !</a></li>
                </br></br>
                <li><b><i>Choisissez votre décor !</i></b></li>
            </ul>
            <form method="post" action="javascript:decor()"><select id="decor">
                    <option value="./../../../public/img/decor/Butterfly.jpeg">Butterfly.jpeg</option>
                    <option value="./../../../public/img/decor/Dog.jpeg">Dog.jpeg</option>
                    <option value="./../../../public/img/decor/Fingerprint.jpeg">Fingerprint.jpeg</option>
                    <option value="./../../../public/img/decor/Fly.jpeg">Fly.jpeg</option>
                    <option value="./../../../public/img/decor/Glasses.jpeg">Glasses.jpeg</option>
                    <option value="./../../../public/img/decor/Hand-Butterfly.jpeg">Hand-Butterfly.jpeg</option>
                    <option value="./../../../public/img/decor/Idea.jpeg">Idea.jpeg</option>
                    <option value="./../../../public/img/decor/Iphone.png">Iphone.png</option>
                    <option value="./../../../public/img/decor/Loupe.jpeg">Loupe.jpeg</option>
                    <option value="./../../../public/img/decor/Plume.jpeg">Plume.jpeg</option>
                    <option value="./../../../public/img/decor/Unlike.jpeg">Unlike.jpeg</option>
                    <option value="./../../../public/img/decor/Valentin.png">Valentin.png</option>
                    <option value="./../../../public/img/decor/WakeUp.jpeg">WakeUp.jpeg</option>
                </select><input type="submit" value="Afficher le décor choisi"/></form>
            </br></br>Vous avez le choix entre <strong>13</strong> décors différents
        <td>
            <div id="container3">
                <img id="imgtag2" src="" width="75" height="75"/>
            </div>
        </td>
        </td>
    </tr>
</table>

<br/>


<footer>
    <hr/>
    <br/>
    <p class="copyright"> © Camagru - pcadiot/fsangare 2017 </p>
</footer>

<script>
    var video = document.querySelector("#videoElement");

    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    if (navigator.getUserMedia) {
        navigator.getUserMedia({video: true}, handleVideo, videoError);
    }

    function handleVideo(stream) {
        video.src = window.URL.createObjectURL(stream);
    }

    function videoError(e) {
        // no webcam found - do something
    }
    var v, canvas, context, w, h;
    var imgtag = document.getElementById('imgtag');
    var sel = document.getElementById('fileselect');

    document.addEventListener('DOMContentLoaded', function () {
        v = document.getElementById('videoElement');
        canvas = document.getElementById('canvas');
        context = canvas.getContext('2d');
        w = canvas.width;
        h = canvas.height;

    }, false);

    function draw(v, c, w, h) {

        if (v.paused || v.ended) return false;

        context.drawImage(v, 0, 0, w, h);
        var uri = canvas.toDataURL("image/png");
        imgtag.src = uri;
    }

    document.getElementById('save').addEventListener('click', function (e) {
        draw(v, context, w, h);
    });

    var fr;

    sel.addEventListener('change', function (e) {
        var f = sel.files[0];

        fr = new FileReader();
        fr.onload = receivedData;

        fr.readAsDataURL(f);
    })

    function receivedData() {
        imgtag.src = fr.result;
    }

</script>
</body>
</html>
