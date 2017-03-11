<html>
<HEAD>
    <title id="title-doc">Camagru</title>
    <meta content="camagru; sangare; cadiot; 42; école 42; php" name="keywords">
    <Meta charset="UTF-8">
    <link rel="stylesheet" href="../../public/css/application.css"/>

</head>

<body>
<center><B><h1>Ouvrez vous à la magie de Camagru !</h1></B></center>
<br/>
<br/>
<br/>
<p><B><I>Réinitialiser votre mot de passe :</I></B></p>
<br/>
<br/>
<form method="post" action="../src/password_forgotten.php">
    Pseudo : <input type="text" name="login" placeholder="login" required/>
    Mail : <input type="email" name="email" placeholder="votre mail" required
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"/>
    <input type="submit" name="submit" value="OK"/>
    <INPUT TYPE="reset" NAME="reset" VALUE="Effacer">
</form>
<br/>

<br/>
<br/>
<ul id="menu">
<li><a href="./logout.php"> Revenir à l'accueil !!!! </a></li>
</ul>
<br/>
<br/>
<br/>
<hr/>
<br/>
<p class="copyright"> © Camagru - pcadiot/fsangare 2017 </p>
</body>
</html>
