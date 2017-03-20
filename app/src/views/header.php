<header>
    <center><h1><B> <?= ucfirst($_SESSION['loggued_on_user']) ?>, Vous êtes connecté à Camagru !</B></h1></center>
</br> </br>
    <nav>
        <ul id="menu">

          <?php
          if ($_SESSION['tag'] != 'GOOD'){
              ?>
            <li><a href="../views/main_user_password_modify.php">Modifier son mot de passe !</a></li>
            <li><a href="../views/main_user_email_modify.php">Modifier son adresse mail !</a></li>
            <li><a href="javascript:confirmDel()">Supprimer son compte !</a></li>
            <li><a href="../views/main_contact.php">Contacts</a></li>
            <li><i><a href="../../../public/index.php"> Revenir à l'accueil !!!! </a></i></li>
            <li><a href="../logout.php">Se déconnecter !</a></li>
          <?php
              }
      ?>

        </ul>
    </nav>
</br> </br>
</header>
