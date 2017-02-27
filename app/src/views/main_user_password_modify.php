<td>
    <br/>
    <p><B><I>Modification de votre mot de passe :</I></B></p>
    <br/>
    <br/>
    <table>
        <tr>
            <td>
                <form method="post">
                    Pseudo.........................: <input type="text" name="login" placeholder="login" required/>
            </td>
            <td>
                Mail....................................................: <input type="email" name="email"
                                                                                 placeholder="votre mail"
                                                                                 pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"/>
            </td>
            <td>
                Ancien mot de passe: <input type="password" name="password" placeholder="ancien mot de passe" required/>
            </td>
        </tr>
        <tr>
            <td>
                Nouveau mot de passe: <input type="password" name="passwordnew1" placeholder="nouveau mot de passe"
                                             required/>
            </td>
            <td>
                Vérification du nouveau mot de passe: <input type="password" name="passnewverif"
                                                             placeholder="nouveau mot de passe" required/>
            </td>
            <td>
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="OK"/>
    <INPUT TYPE="reset" NAME="reset" VALUE="Effacer">
    </form>

    <br/>
    <br/>
    <br/>
    <i><a href="views/main_camagru.php"> Revenir à la page précédente !!!! </a></i>
    <br/>
    <br/>
