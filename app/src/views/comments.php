<?php
  $dossier_ref = '../../../public/img/save/';
  $dossier_ref2 = '../../public/img/save/';
  echo '</br><u>Image '. $_GET['image'] .' :</u><br/><table><tr><td></td>';
  echo '<td> </br><div> <center><img src="'. $dossier_ref . $_GET['image'] . '" style="border:solid 2px black; border-radius:10px; text-align:left; box-shadow:0 0 10px;"></div></center></br></br>';
?>

        </td>
    </tr>
    <tr>
        <td>

         <ul id="menu">
             <li>
              <a href="../views/main_camagru.php"> Revenir à la page précédente !!!! </a>
         <?php
         $image_path = $dossier_ref2 . $_GET['image'];
         $image = get_image_by_path(array(
             'image_path' => $image_path
         ));
         $image_id = array(
           'img_id' => $image['img_id']
         );

         echo '<a href="main_comments2.php?image='.$_GET['image'].'"> Ajouter un commentaire à la photo !!!! </a>';

         if ($image['img_user'] == $_SESSION['loggued_on_user'])
          echo '<A href="../image_supr.php?image_supr='.$_GET['image'].'">Supprimer la photo !</A>';

         $reviews = get_reviews_by_image($image_id);

         ?>

         </li>
         </ul>
       </br></br>
        </td>
      </tr>
      <tr>
          <td><div>Login</div></br></br></td><td><div>Commentaires :</div></br></br></td></tr>
          <?php foreach ($reviews as $review): ?>
            <tr>
              <td><?= $review['login']?></td>
              <td><?= $review['review']?></td>
            </tr>
        <?php endforeach; ?>

</table>
