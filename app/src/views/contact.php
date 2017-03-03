</br> Contacts : </br><br/><br/>
<table>
    <tr>
        <td>
            <form method="post" action="../send_mail.php" autocomplete="on">
                Votre adresse mail :
        </td>
        <td><input type="email" name="mail" size="80" maxlength="100" <?= "value="."'".$email ."'" ?> autofocus/></br></br>
        </td>
    </tr>
    <tr>
        <td>
            Objet du message :
        </td>
        <td><input list="listObj" name="obj" size="110" maxlength="150" placeholder="Objet de votre message.">
            <datalist id="listObj">
                <option value="Problèmes techniques">
                <option value="Besoin d'informations complémentaires">
                <option value="Candidature libre">
                <option value="Autre">
            </datalist>
            </br>
        </td>
    </tr>
    <tr>
        <td>
            Votre message :
        </td>
        <td><TEXTAREA name="msg" rows=10 cols=120 wrap="physical" placeholder="Votre message."/></TEXTAREA>
        </td>
    </tr>
    <tr>
        <td></br>
            <input type="radio" name="html" value="text" checked> Format texte<br>
            <input type="radio" name="html" value="html"> Format HTML<br>
            </br></br>
            <input type="submit" name="submit" value="Envoi Mail"/>
            </form>
        </td>
    </tr>
</table>
<br/>    <br/>
<br/>
<a href="views/main_camagru.php"> Revenir à la page précédente !!!! </a>
<br/>
<br/><br/>
