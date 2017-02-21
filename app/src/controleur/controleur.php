<?php
require_once __DIR__ . '/../modeles/membres.php';

// Affiche la liste de tous les billets du blog
// function accueil() {
//     $users = getUsers();
//     require 'Vue/vueAccueil.php';
// }

// vérifie identification utilisateur
function identificationUser() {

    if (isset($_POST['login'], $_POST['password'], $_POST['passverif'], $_POST['email']))
    {
        $_POST['login'] =  htmlspecialchars(trim($_POST['login']));
        $_POST['password'] =  htmlspecialchars(trim($_POST['password']));
        $_POST['passverif'] =  htmlspecialchars(trim($_POST['passverif']));
        $_POST['email'] =  htmlspecialchars(trim($_POST['email']));

        try {
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
                                $passwd_hash = hash('whirlpool', $_POST['password']);
                                $user = array(
                                    'login' => $_POST['login'],
                                    'email' => $_POST['email'],
                                    'password' => $passwd_hash
                                );
                                // var_dump($user);
                                saveUser($user);
                                $_SESSION['passwd_hash'] = $passwd_hash;
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
                                        $passwd_hash = hash('whirlpool', $_POST['password']);
                                        $user = array(
                                            'login' => $_POST['login'],
                                            'email' => $_POST['email'],
                                            'password' => $passwd_hash
                                        );
                                        // var_dump($user);
                                        $_SESSION['passwd_hash'] = $passwd_hash;
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
        } catch (Exception $e) {
                $message = $e->getMessage();
        }
        return $message;
    }
}
// include __DIR__ . "/../../views/messages.php";

function auth($login, $passwd)
{
	$users = getUsers();

    // var_dump($users);
	foreach($users as $entry)
	{
		if ($entry['login'] == $login)
		{
			$passwd_hash = hash('whirlpool', $passwd);
			if ($passwd_hash == $entry['password'])
			{
				if (isset($entry['admin']))
					return (2);
				else
					return (1);
			}
			else
				return (0);
		}
	}
	return (0);
}

function password_modify() {
    if (isset($_POST['login'], $_POST['password'], $_POST['passverif'], $_POST['email']))
    {
        $_POST['login'] = htmlspecialchars(trim($_POST['login']));
        $_POST['password'] = htmlspecialchars(trim($_POST['password']));
        $_POST['passverif'] = htmlspecialchars(trim($_POST['passverif']));
        $_POST['email'] = htmlspecialchars(trim($_POST['email']));

        try {
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
                        foreach($users as $user)
                        {
                            if ($user['login'] === $_POST['login'] || $user['email'] === $_POST['email'])
                            {
                                //Sinon, on dit que le pseudo voulu est deja pris

                                $message = 'Un autre utilisateur utilise déjà le nom d\'utilisateur que vous désirez utiliser.';
                            }
                            else
                            {
                                $passwd_hash = hash('whirlpool', $_POST['password']);
                                $users = array('login' => $_POST['login'], 'email' => $_POST['email'], 'passwd' => $passwd_hash);
                                saveUser($user);
                                //Si ca a fonctionne, on naffiche pas le formulaire
                                $message = "Votre mot de passe vient d'être correctement modifié.";
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

        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        return $message;
    }
}

// // Affiche les détails sur un billet
// function billet($idBillet) {
//     $billet = getBillet($idBillet);
//     $commentaires = getCommentaires($idBillet);
//     require 'Vue/vueBillet.php';
// }
//
// // Affiche une erreur
// function erreur($msgErreur) {
//     require 'Vue/vueErreur.php';
// }
