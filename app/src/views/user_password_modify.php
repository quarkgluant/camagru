
<td>
    <br/>
    <p><B><I>Modification de votre mot de passe :</I></B></p>
    <br/>
    <table>
        <tr>
                <form method="post" >
        </tr>
        <tr>
            <td>
                Nouveau mot de passe: <input type="password" name="passnew" placeholder="..."
                                             required/>
            </td>
            <td>
                Vérification du nouveau mot de passe: <input type="password" name="passnewverif"
                                                             placeholder="...." required/>
            </td>
            <td>
            </td>
        </tr>
    </table>
        <br/>
    <input type="submit" name="submit" value="OK"/>
    <INPUT TYPE="reset" NAME="reset" VALUE="Effacer">
    </form>

    <br/>
    <br/>
    <br/>
    <ul id="menu">

      <?php
      if ($_SESSION['tag'] != 'GOOD'){
          ?>
        <li><a href="./main_camagru.php"> Revenir à la page précédente !!!! </a></li>
        <?php
        }
        else
        {
            ?>
      <li><a href="./../logout.php"> Revenir à la page d'accueil !!!! </a></li>
      <?php
      }
      ?>

    </ul>
