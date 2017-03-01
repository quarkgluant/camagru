<td class="side2" syle="margin-top:10px; margin-right:10px;">
  Vos images sauvegardées !
</br></br>
    <?php
    $nb_fichier = 0;

    $dossier_ref = '../../../public/img/save/';
    if (($dossier = opendir('../../../public/img/save')))
    {
        while (false !== ($fichier = readdir($dossier)))
        {
            //if ($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && !is_dir($fichier))
          if (strstr($fichier, '.png') || strstr($fichier, '.jpg') || strstr($fichier, '.jpeg') || strstr($fichier, '.gif'))
            {
                $nb_fichier++; // On incrémente le compteur de 1
                echo '<img id="imgtag4" src="./' . $dossier_ref . $fichier . '"width="75" height="75" style="border: 1px solid black;"/>&nbsp;&nbsp;';
            } // On ferme le if (qui permet de n'afficher que les .png)
        } // On termine la boucle
        echo '</br></br>Vous avez sauveagardé <strong>' . $nb_fichier .'</strong> images différentes';
        closedir($dossier);
    }
    else
    echo 'Le dossier n\' a pas pu être ouvert';
    ?>

</td>
