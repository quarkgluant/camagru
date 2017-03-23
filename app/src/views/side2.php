<td class="side2" syle="margin-top:10px; margin-right:10px;">
  Vos images sauvegardées !</td><td>
</br></br>
    <?php
    $nb_fichier = 0;

    $dossier_ref = '../../../public/img/save/';
    $dossier_heart = '../../../public/img/heart/';
    // ici on doit appeler la/les fonctions du controleur pour peupler les images
    // sauvegardées dans la base
    if (($dossier = opendir('../../../public/img/save')))
    {
        while (false !== ($fichier = readdir($dossier)))
        {
            //if ($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && !is_dir($fichier))
          if (strstr($fichier, '.png') || strstr($fichier, '.jpg') || strstr($fichier, '.jpeg') || strstr($fichier, '.gif'))
            {
                $nb_fichier++;
                $nb_heart = rand(0, 10);
                echo '&nbsp;&nbsp;<A href="./main_comments.php?image='. $fichier
                    .'"><img id="imgtag4" src="./' . $dossier_ref . $fichier
                    . '"width="75" height="75" style="border: 1px solid black;" title="Cliquez pour accéder aux commentaires"/></A>&nbsp;'
                    . $nb_heart .'&nbsp;<A href="#"><img src=" ./'
                    . $dossier_heart .'1.png" width="12" height="12"></A></BR>';
                if ($nb_fichier%10 == 0)
                  {
                      echo '</td><td></br></br>';
                  }
            } // On ferme le if (qui permet de n'afficher que les .png)
        } // On termine la boucle
          closedir($dossier);
    }
    else
    echo 'Le dossier n\' a pas pu être ouvert';
    ?>

</td>
