<?php

include __DIR__ . "/modeles/model.php";
// include __DIR__ . "/users_push.php";

include __DIR__ . "/../views/user_modif.php";

        //On verifie que le formulaire a ete envoye
        if (isset($_POST['login'], $_POST['oldpw'], $_POST['newpw'], $_POST['newpwverif']))
        {
            $_POST['login'] = trim($_POST['login']);
            $_POST['oldpw'] = trim($_POST['oldpw']);
            $_POST['newpw'] = trim($_POST['newpw']);
            $_POST['newpwverif'] = trim($_POST['newpwverif']);

            // On verifie si le mot de passe et celui de la verification sont identiques
            if($_POST['newpw'] == $_POST['newpwverif'])
            {
                //On verifie si le mot de passe a 8 caracteres ou plus
                if(strlen($_POST['newpw']) >= 8)
                {
                    //On verifie si l'email est valide
                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                    {
                        $users = getUsers();
                        foreach($users as $user)
                        {
                            if ($user['login'] === $_POST['login'])
                            {
                                //Sinon, on dit que le pseudo voulu est deja pris
                                $form = true;
                                $message = 'Un autre utilisateur utilise déjà le nom d\'utilisateur que vous désirez utiliser.';
                            }
                            else
                            {
                                $passwd_hash = hash('whirlpool', $_POST['passwd']);
                                $user = array('login' => $_POST['login'], 'email' => $_POST['email'], 'password' => $passwd_hash);
                                saveUser($user);
                                //Si ca a fonctionne, on naffiche pas le formulaire
                                    <div class="message">Vous avez bien été inscrit. Vous pouvez dorénavant vous connecter.<br/><br/>
                                    <a href="../../public/index.php">Se connecter</a></div>

                                }
                            }
                        }
                        else
                        {
                            //Sinon, on dit que lemail nest pas valide
                            $form = true;
                            $message = 'L\'email que vous avez entré n\'est pas valide.';
                        }
                    }
                    else
                    {
                        //Sinon, on dit que le mot de passe nest pas assez long
                        $form = true;
                        $message = 'Le mot de passe que vous avez entré contient moins de 8 caractères.';
                    }
                }
                else
                {
                    //Sinon, on dit que les mots de passes ne sont pas identiques
                    $form = true;
                    $message = 'Les mots de passe que vous avez entré ne sont pas identiques.';
                }
            }
            else
            {
                $form = true;
            }
            if($form)
            {
                //On affiche un message sil y a lieu
                if(isset($message))
                {
                    echo '<h2><p><div class="message">'.$message.'</div><br/><br/></P></h2>';
                }
                //On affiche le formulaire
                ?>
                <table>
                  <tr>
                    <td>
                <form method="post">
                    Pseudo.........................: <input type="text" name="login" value=""/>
                  </td>
                  <td>
                    Mail....................................................: <input type="email" name="email" value=""/>
                  </td>
                  <td>
                    Ancien mot de passe: <input type="password" name="password" value=""/>
                  </td>
                  </tr>
                  <tr>
                   <td>
                    Nouveau mot de passe: <input type="password" name="passwordnew1" value=""/>
                  </td>
                  <td>
                    Vérification du nouveau mot de passe: <input type="password" name="passnewverif" value=""/>
                  </td>
                  <td>
                </td>
                </tr>
              </table>
                    <input type="submit" name="submit" value="OK" />
                    <INPUT TYPE="reset" NAME="reset" VALUE="Effacer">
                    </form>

                    <?php
                }
                ?>

                <br/>
                <br/>
                <br/>
                <a  href = "../../public/index.php"> Revenir à l'accueil !!!! </a>
                <br/>
                <a  href = "../views/main_camagru.php"> Revenir à la page précédente !!!! </a>
                <br/>
                <br/>
                <br/>
                <hr/>
                <br/>
                <p  class = "copyright"> © Camagru - pcadiot/fsangare 2017 </p>
            </body>
            </html>
