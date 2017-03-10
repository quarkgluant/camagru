<?php
require_once __DIR__ . '/../modeles/membres.php';
require_once __DIR__ . '/../modeles/images.php';

// vérifie identification utilisateur
function identification_user() {

    if (isset($_POST['login'], $_POST['password'], $_POST['passverif'], $_POST['email']))
    {
        $_POST['login'] =  htmlspecialchars(trim($_POST['login']));
        $_POST['password'] =  htmlspecialchars(trim($_POST['password']));
        $_POST['passverif'] =  htmlspecialchars(trim($_POST['passverif']));
        $_POST['email'] =  htmlspecialchars(trim($_POST['email']));

        try {
                // On verifie si le mot de passe et celui de la verification sont identiques
                if ($_POST['password'] == $_POST['passverif'])
                {
                    //On verifie si le mot de passe a 8 caracteres ou plus
                    if (strlen($_POST['password']) >= 8)
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
                                $_SESSION['loggued_on_user'] = $_POST['login'];
                                $message = '1';
                            }
                            else
                            {
                                foreach($users as $user)
                                {
                                    if ($user['login'] === $_POST['login'])
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
                                        $_SESSION['loggued_on_user'] = $_POST['login'];
                                        saveUser($user);
                                        $message = '1';
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

function auth_user($login, $passwd)
{
	try {

        $users = getUsers();

    	foreach($users as $entry)
    	{
    		if ($entry['login'] == $login)
    		{
    			$passwd_hash = hash('whirlpool', $passwd);
    			if ($passwd_hash == $entry['password'])
    			{
                    $_SESSION['passwd_hash'] = $passwd_hash;
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
    } catch (Exception $e) {
        $message = $e->getMessage();
        echo "<div>$message</div>";
    }
}


function get_mail($login)
{
    try {
        $users = getUsers();

        // var_dump($users);
    	foreach($users as $entry)
    	{
    		if ($entry['login'] == $login)
    		{
    			return ($entry['email']);
    		}
    	}
    } catch (Exception $e) {
        $message = $e->getMessage();
        echo "<div>$message</div>";
    }
}

function get_password($login)
{
    try {
    	$users = getUsers();

        // var_dump($users);
    	foreach($users as $entry)
    	{
    		if ($entry['login'] == $login)
    		{
    			return ($entry['password']);
    		}
    	}
    } catch (Exception $e) {
        $message = $e->getMessage();
        echo "<div>$message</div>";
    }
}

function password_modify() {
    if (isset($_POST['passnew'], $_POST['passnewverif']))
    {
        $_POST['passnew'] = htmlspecialchars(trim($_POST['passnew']));
        $_POST['passnewverif'] = htmlspecialchars(trim($_POST['passnewverif']));
        try {
            // On verifie si le mot de passe et celui de la verification sont identiques
            if ($_POST['passnew'] == $_POST['passnewverif'])
            {
                //On verifie si le mot de passe a 8 caracteres ou plus
                if (strlen($_POST['passnew']) >= 8)
                {

                        $users = getUsers();

                        foreach($users as $user)
                        {
                            if ($user['login'] === $_SESSION['loggued_on_user'])
                            {
                              $passwd_hash = hash('whirlpool', $_POST['passnew']);
                              $user = array(
                                  'login' => $_SESSION['loggued_on_user'],
                                  'email' => $user['email'],
                                  'password' => $passwd_hash);
                              majUser($user);
                              //Si ca a fonctionne, on naffiche pas le formulaire
                              $message = "Votre mot de passe vient d'être correctement modifié.";

                            }
                            else
                            {
                              //Sinon, on dit que le pseudo n'existe pas
                              $message = 'Erreur lors de la modification de votre mot de passe.';
                            }
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

function email_modify() {
    if (isset($_POST['newemail']))
    {
        $_POST['newemail'] = htmlspecialchars(trim($_POST['newemail']));

        try {

                    //On verifie si l'email est valide
                    if (filter_var($_POST['newemail'], FILTER_VALIDATE_EMAIL))
                    {
                        $users = getUsers();
                        foreach($users as $user)
                        {
                            if ($user['login'] === $_SESSION['loggued_on_user'])
                            {
                              $users = array('login' => $_SESSION['loggued_on_user'], 'email' => $user['email'], 'password' => $user['password']);
                              majUser($user);
                              //Si ca a fonctionne, on naffiche pas le formulaire
                              $message = "Votre mail d'être correctement modifié.";
                            }
                            else
                            {
                              //Sinon, on dit que le pseudo n'existe pas
                              $message = 'Erreur lors de la modification de votre mail.';
                            }
                        }
                    }
                    else
                    {
                        //Sinon, on dit que lemail nest pas valide
                        $message = 'L\'email que vous avez entré n\'est pas valide.';
                    }

        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        return $message;
    }
}

function sauvergarde_image(array $img){
    try {
        saveImage($img);
    }catch (Exception $e) {
        $message = $e->getMessage();
    }

}
