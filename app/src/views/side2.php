<td class="side2" syle="margin-top:10px; margin-right:10px;">
  Vos images sauvegardées !</td><td>
</br></br>
    <?php
    $nb_fichier = 0;

    $dossier_ref = '../../../public/img/save/';
    $dossier_ref2 = '../../public/img/save/';
    $dossier_heart = '../../../public/img/heart/';

    if (($dossier = opendir('../../../public/img/save')))
    {
        while (false !== ($fichier = readdir($dossier)))
        {
          if (strstr($fichier, '.png') || strstr($fichier, '.jpg') || strstr($fichier, '.jpeg') || strstr($fichier, '.gif'))
            {
                $nb_fichier++;
                $image_path = $dossier_ref2 . $fichier;
                $image = get_image_by_path(array(
                    'image_path' => $image_path
                ));
                $image_id = array(
                  'img_id' => $image['img_id']
                );

                $nb_heart = get_likes_by_image($image_id);
                echo '&nbsp;&nbsp;<A href="./main_comments.php?image='. $fichier
                    .'"><img id="imgtag4" src="./' . $dossier_ref . $fichier
                    . '"width="75" height="75" style="border: 1px solid black;" title="Cliquez pour accéder aux commentaires"/></A>&nbsp;'
                    . $nb_heart .'&nbsp;<A href="../add_likes.php?image_add='. $fichier .'"><img src=" ./'
                    . $dossier_heart .'1.png" width="12" height="12"></A>&nbsp;<A href="../del_likes.php?image_del='. $fichier .'"><img src=" ./'
                    . $dossier_heart .'4.png" width="12" height="12"></A></BR>';
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
