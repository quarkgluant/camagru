<?php
require_once __DIR__ . '/../modeles/bdd.php';
require_once __DIR__ . '/../modeles/membres.php';
require_once __DIR__ . '/../modeles/images.php';

// vérifie identification utilisateur
function identification_user()
{

    if (isset($_POST['login'], $_POST['password'], $_POST['passverif'], $_POST['email'])) {
        $_POST['login'] = htmlspecialchars(trim($_POST['login']));
        $_POST['password'] = htmlspecialchars(trim($_POST['password']));
        $_POST['passverif'] = htmlspecialchars(trim($_POST['passverif']));
        $_POST['email'] = htmlspecialchars(trim($_POST['email']));

        try {
            // On verifie si le mot de passe et celui de la verification sont identiques
            if ($_POST['password'] == $_POST['passverif']) {
                //On verifie si le mot de passe a 8 caracteres ou plus
                if (strlen($_POST['password']) >= 8) {
                    //On verifie si l'email est valide
                    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $utilisateur = new User();
                        $users = $utilisateur->getUsers();
                        // var_dump($users);
                        if (empty($users)) {
                            $passwd_hash = hash('whirlpool', $_POST['password']);
                            $user = array(
                                'login' => $_POST['login'],
                                'email' => $_POST['email'],
                                'password' => $passwd_hash
                            );
                            // var_dump($user);
                            $utilisateur->saveUser($user);
                            $_SESSION['passwd_hash'] = $passwd_hash;
                            $_SESSION['loggued_on_user'] = $_POST['login'];
                            $message = '1';
                        } else {
                            foreach ($users as $user) {
                                if ($user['login'] === $_POST['login']) {
                                    //Sinon, on dit que le pseudo voulu est deja pris
                                    $message = 'Un autre utilisateur utilise déjà le nom d\'utilisateur que vous désirez utiliser.';
                                } else {
                                    $passwd_hash = hash('whirlpool', $_POST['password']);
                                    $user = array(
                                        'login' => $_POST['login'],
                                        'email' => $_POST['email'],
                                        'password' => $passwd_hash
                                    );
                                    // var_dump($user);
                                    $_SESSION['passwd_hash'] = $passwd_hash;
                                    $_SESSION['loggued_on_user'] = $_POST['login'];
                                    $utilisateur->saveUser($user);
                                    $message = '1';
                                    return $message;
                                }
                            }
                        }

                    } else {
                        //Sinon, on dit que lemail nest pas valide
                        $message = 'L\'email que vous avez entré n\'est pas valide.';
                    }
                } else {
                    //Sinon, on dit que le mot de passe nest pas assez long
                    $message = 'Le mot de passe que vous avez entré contient moins de 8 caractères.';
                }
            } else {
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
        $utilisateur = new User();
        $users = $utilisateur->getUsers();

        foreach ($users as $entry) {
            if ($entry['login'] == $login) {
                $passwd_hash = hash('whirlpool', $passwd);
                if ($passwd_hash == $entry['password']) {
                    $_SESSION['passwd_hash'] = $passwd_hash;
                    if (isset($entry['admin']))
                        return (2);
                    else
                        return (1);
                } else
                    return (0);
            }
        }
        return (0);
    } catch (Exception $e) {
        $message = $e->getMessage();
        echo '<html><HEAD><title id="'.'"title-doc"'.'">Camagru</title><meta content="'.'"camagru; sangare; pcadiot; 42; école 42; php"'.'" name="'.'"keywords"'.'"><Meta  charset ="'.'"UTF-8"'.'"><link rel="'.'"stylesheet"'.'" href="'.'"css/application.css"'.'"/></head><body><div>'.$message.'</div></body></html>';
    }
}

function delete_user()
{
    if (isset($_SESSION['loggued_on_user'])) {
        $login = htmlspecialchars(trim($_SESSION['loggued_on_user']));
        $utilisateur = new User();

        try {
            $user = array('login' => $login);
            $utilisateur->delUser($user);
        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        return $message;
    }
}

function get_mail($login)
{
    try {
        $utilisateur = new User();
        $users = $utilisateur->getUsers();

        // var_dump($users);
        foreach ($users as $entry) {
            if ($entry['login'] === $login) {
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
        $utilisateur = new User();

        $users = $utilisateur->getUsers();

        // var_dump($users);
        foreach ($users as $entry) {
            if ($entry['login'] === $login) {
                return ($entry['password']);
            } else {
                return false;
            }
        }
    } catch (Exception $e) {
        $message = $e->getMessage();
        echo "<div>$message</div>";
    }
}

function password_modify()
{
    if (isset($_POST['passnew'], $_POST['passnewverif'])) {
        $_POST['passnew'] = htmlspecialchars(trim($_POST['passnew']));
        $_POST['passnewverif'] = htmlspecialchars(trim($_POST['passnewverif']));
        try {
            // On verifie si le mot de passe et celui de la verification sont identiques
            if ($_POST['passnew'] === $_POST['passnewverif']) {
                //On verifie si le mot de passe a 8 caracteres ou plus
                if (strlen($_POST['passnew']) >= 8) {
                    $utilisateur = new User();
                    $users = $utilisateur->getUsers();

                    foreach ($users as $user) {
                        if ($user['login'] === $_SESSION['loggued_on_user']) {
                            $passwd_hash = hash('whirlpool', $_POST['passnew']);
                            $user = array(
                                'login' => $_SESSION['loggued_on_user'],
                                'email' => $user['email'],
                                'password' => $passwd_hash);
                            $utilisateur->majUser($user);
                            //Si ca a fonctionne, on naffiche pas le formulaire
                            $message = "Votre mot de passe vient d'être correctement modifié.";

                        } else {
                            //Sinon, on dit que le pseudo n'existe pas
                            $message = 'Erreur lors de la modification de votre mot de passe.';
                        }
                    }
                } else {
                    //Sinon, on dit que le mot de passe nest pas assez long
                    $message = 'Le mot de passe que vous avez entré contient moins de 8 caractères.';
                }
            } else {
                //Sinon, on dit que les mots de passes ne sont pas identiques
                $message = 'Les mots de passe que vous avez entré ne sont pas identiques.';
            }

        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        return $message;
    }
}

function email_modify()
{

    if (isset($_POST['newemail'])) {
        $_POST['newemail'] = htmlspecialchars(trim($_POST['newemail']));

        try {

            //On verifie si l'email est valide
            if (filter_var($_POST['newemail'], FILTER_VALIDATE_EMAIL)) {
                $utilisateur = new User();
                $users = $utilisateur->getUsers();
                foreach ($users as $user) {
                    if ($user['login'] === $_SESSION['loggued_on_user']) {
                        $users = array('login' => $_SESSION['loggued_on_user'], 'email' => $user['email'], 'password' => $user['password']);
                        $utilisateur->majUser($user);
                        //Si ca a fonctionne, on naffiche pas le formulaire
                        $message = "Votre mail d'être correctement modifié.";
                    } else {
                        //Sinon, on dit que le pseudo n'existe pas
                        $message = 'Erreur lors de la modification de votre mail.';
                    }
                }
            } else {
                //Sinon, on dit que lemail nest pas valide
                $message = 'L\'email que vous avez entré n\'est pas valide.';
            }

        } catch (Exception $e) {
            $message = $e->getMessage();
        }
        return $message;
    }
}

function get_image_by_user(array $user)
{
    $image = new Image();
    try {
        return $image->getImageByUser($user);
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
    return $message;
}

function sauvegarde_image(array $img)
{
    $image = new Image();
    try {
        $image->saveImage($img);
    } catch (Exception $e) {
        return $message = $e->getMessage();
    }
}

function sauvegarde_review(array $comment)
{
    $review = new Review();
    try {
        $review->saveReview($comment);
    } catch (Exception $e) {
        return $message = $e->getMessage();
    }
}
