<td class="side2" syle="margin-top:10px; margin-right:10px;">
  Vos images sauvegardées !</td><td>
</br></br>
    <?php
    $nb_fichier = 0;

    $dossier_ref = '../../../public/img/save/';
    $dossier_ref2 = '../../public/img/save/';
    $dossier_heart = '../../../public/img/heart/';
    $page = (int)($_GET['nb_page']);

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

                if ((int)($nb_fichier / 10) == $page)
                  {
                echo '&nbsp;&nbsp;<A href="./main_comments.php?image='. $fichier
                    .'"><img id="imgtag4" src="./' . $dossier_ref . $fichier
                    . '"width="75" height="75" style="border: 1px solid black;" title="Cliquez pour accéder aux commentaires"/></A>&nbsp;'
                    . $nb_heart .'&nbsp;<A href="../add_likes.php?image_add='. $fichier .'"><img src=" ./'
                    . $dossier_heart .'1.png" width="12" height="12"></A>&nbsp;<A href="../del_likes.php?image_del='. $fichier .'"><img src=" ./'
                    . $dossier_heart .'4.png" width="12" height="12"></A></BR>';
                  }
                  $nb_page_fin = (int)($nb_fichier / 10);
            } // On ferme le if (qui permet de n'afficher que les images)
        } // On termine la boucle

        if ($page == $nb_page_fin){
          $nb_page_plus = 0;
          if ($nb_page_fin != 0) {
            $nb_page_moins = (int)($_GET['nb_page'] - 1);
          }
          else {$nb_page_moins = 0;}
        }
        elseif ($page == 0) {
          $nb_page_moins = $nb_page_fin;
          $nb_page_plus = (int)($_GET['nb_page'] + 1);
        }
        else {
          $nb_page_moins = (int)($_GET['nb_page'] - 1);
          $nb_page_plus = (int)($_GET['nb_page'] + 1);
        }
          echo '</br></br><center>'.$nb_page_moins.'&nbsp;&nbsp;<A href="./main_camagru.php?nb_page='.$nb_page_moins.'&move=-"><img src="../../../public/img/arrows/agauche.png"width="30" height="30" title="Précédent"></A>&nbsp;&nbsp;<b>Page : '.$page.'</b>&nbsp;&nbsp;<A href="./main_camagru.php?nb_page='.$nb_page_plus.'&move=+"><img src="../../../public/img/arrows/adroite.png"width="30" height="30" title="Suivant"></A>&nbsp;&nbsp;'.$nb_page_plus.'</center>';

          closedir($dossier);
    }
    else
    echo 'Le dossier n\' a pas pu être ouvert';
    ?>

</td>
