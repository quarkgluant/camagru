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

               <?php
               echo '<a href="../views/main_comments.php?image='.$_GET['image'].'"> Revenir à la page précédente !!!! </a></li>';
              ?>

         </ul>
       </br></br>
        </td>
      </tr>
      <tr>
          <td><div>Login</div></br></br></td><td><div>Commentaires :</div></br></br></td></tr>

            <tr>
              <td><b>
<?php
                echo $_SESSION['loggued_on_user'];
?>
                </b></td>
              <td>
                <form method="post" action="../add_comments.php">

<?php
                echo '<input type="hidden" name="image_hidden" value="'.$_GET['image'] . '">';
?>
                <TEXTAREA name="comment" rows=10 cols=120 wrap="physical" placeholder="Votre commentaire."/></TEXTAREA>
              </BR><input Onclick="var sentence='Voullez-vous réellement envoyer un commentaire ? ';return Confirm(sentence);" type="submit" value="Valider commentaire">
            </form>
          </td>
            </tr>


</table>
