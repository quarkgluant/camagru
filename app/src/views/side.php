<td class="side" syle="margin-top:10px; margin-right:10px;">
    Modifiez vos images !
    <ul>
      <li><a href="#">Vos images sauvegardées !</a></li>
    </br></br>
      <li><b><i>Choisissez votre décor !</i></b></li>
    </ul>
    <?php
    $nb_fichier = 0;
    echo '<form method="post" action="javascript:decor()"><select id="decor">';
    //echo '<ul>';
    $dossier_ref = '../../public/img/decor';
if($dossier = opendir('../../public/img/decor'))
  {
    while(false !== ($fichier = readdir($dossier)))
    {
      if($fichier != '.' && $fichier != '..' && $fichier != 'index.php')
      {
        $nb_fichier++; // On incrémente le compteur de 1
        echo '<option value="./' . $dossier_ref . '/' . $fichier . '">'. $fichier  . '</option>';
  //echo '<li><a href="./' . $dossier_ref . '/' . $fichier . '">' . $fichier . '</a></li>';
  //      echo '<a href="./' . $dossier_ref . '/' . $fichier . '"><img id="img' .$nb_fichier . '" src="./' . $dossier_ref . '/' . $fichier  . '" width="50" height="50" alt="Décor"/></a></br>';
      } // On ferme le if (qui permet de ne pas afficher index.php, etc.)
    } // On termine la boucle
    echo '</select><input type="submit" value="Afficher le décor choisi" /></form>';
    echo '</br></br>Vous avez le choix entre <strong>' . $nb_fichier .'</strong> décors différents';
    closedir($dossier);
  }
  else
    echo 'Le dossier n\' a pas pu être ouvert';
    ?>
    <td>
     <div id="container3">
    <img id="imgtag2" src="" width="75" height="75"/>
    </div>
</td>
</td>
