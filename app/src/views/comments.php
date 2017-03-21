<?php
  $dossier_ref = '../../../public/img/save/';
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
         echo '<a href="main_comments2.php?image='.$_GET['image'].'"> Ajouter un commentaire à la photo !!!! </a>';
         ?>

         </li>
         </ul>
       </br></br>
        </td>
      </tr>
      <tr>
          <td><div>Login</div></br></br></td><td><div>Commentaires :</div></br></br></td></tr>

            <tr>
              <td>Login 1 : </td>
              <td>ccccccccccccccccccccccccc</td>
            </tr>

            <tr>
              <td>Login 2 : </td>
              <td>ccccccccccccccccccccccccc</td>
            </tr>

            <tr>
              <td>Login 3 : </td>
              <td>ccccccccccccccccccccccccc</td>
            </tr>

</table>
