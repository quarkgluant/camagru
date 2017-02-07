<?php

include __DIR__ . "/modeles/model.php";
// include __DIR__ . "/users_push.php";

include __DIR__ . "/../views/user_create.php";

//On verifie que le formulaire a ete envoye
if (isset($_POST['login'], $_POST['password'], $_POST['passverif'], $_POST['email']))
{
    $_POST['login'] = trim($_POST['login']);
    $_POST['password'] = trim($_POST['password']);
    $_POST['passverif'] = trim($_POST['passverif']);
    $_POST['email'] = trim($_POST['email']);

    // On verifie si le mot de passe et celui de la verification sont identiques
    if($_POST['password'] == $_POST['passverif'])
    {
        //On verifie si le mot de passe a 8 caracteres ou plus
        if(strlen($_POST['password']) >= 8)
        {
            //On verifie si l'email est valide
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                $users = getUsers();
                // var_dump($users);
                if (empty($users))
                {
                    $passwd_hash = hash('whirlpool', $_POST['passwd']);
                    $user = array(
                        'login' => $_POST['login'],
                        'email' => $_POST['email'],
                        'password' => $passwd_hash
                      );
                    // var_dump($user);
                    saveUser($user);
                    $message = 'Vous avez bien été inscrit. Vous pouvez dorénavant vous connecter.';

                }
                else
                {
                    foreach($users as $user)
                    {
                        if ($user['login'] === $_POST['login'] || $user['email'] === $_POST['email'])
                        {
                            //Sinon, on dit que le pseudo voulu est deja pris
                            $message = 'Un autre utilisateur utilise déjà le nom d\'utilisateur que vous désirez utiliser.';
                        }
                        else
                        {
                            $passwd_hash = hash('whirlpool', $_POST['passwd']);
                            $user = array(
                                'login' => $_POST['login'],
                                'email' => $_POST['email'],
                                'password' => $passwd_hash
                              );
                            var_dump($user);
                            saveUser($user);
                            $message = 'Vous avez bien été inscrit. Vous pouvez dorénavant vous connecter.';
                        }
                    }
                }
            }
            else
            {
                //Sinon, on dit que lemail nest pas valide
                $message = 'L\'email que vous avez entré n\'est pas valide.';
            }
        }
        else
        {
            //Sinon, on dit que le mot de passe nest pas assez long
            $message = 'Le mot de passe que vous avez entré contient moins de 8 caractères.';
        }
    }
    else
    {
        //Sinon, on dit que les mots de passes ne sont pas identiques
        $message = 'Les mots de passe que vous avez entré ne sont pas identiques.';
    }
}

include __DIR__ . "/../views/messages.php";
