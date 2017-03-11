<td class="side" syle="margin-top:10px; margin-right:10px;">
    Choisissez votre décor !
</br></br>
    <?php
    $nb_fichier = 0;
    //echo '<form method="post" action="javascript:decor()"><select id="decor" onchange='javascript:decor()'>';
    echo '<form method="post"><select id="decor" onchange="javascript:decorJS();">';
    //echo '<ul>';
    $dossier_ref = '../../../public/img/decor/';
    if (($dossier = opendir('../../../public/img/decor')))
    {
        while (false !== ($fichier = readdir($dossier)))
        {
            //if ($fichier != '.' && $fichier != '..' && $fichier != 'index.php' && !is_dir($fichier))
          if (strstr($fichier, '.png'))
            {
                $nb_fichier++; // On incrémente le compteur de 1
                echo __DIR__;
                echo '<option value="./' . $dossier_ref . $fichier . '">'. $fichier  . '</option>';
            } // On ferme le if (qui permet de n'afficher que les .png)
        } // On termine la boucle
        //echo '</select><input type="submit" value="Afficher le décor choisi" /></form>';
        echo '</select></form>';
        echo '</br></br>Vous avez le choix entre <strong>' . $nb_fichier .'</strong> décors différents';
        closedir($dossier);
    }
    else
    echo 'Le dossier n\' a pas pu être ouvert';
    ?>

  </br>  </br>
     <div>
    <img id="decorPng" src="" width="75" height="75" style="border: 1px solid red;"/>
    </div>

</td>
