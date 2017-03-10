<?php

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
function getBdd() {
    $dsn = "mysql:host=localhost;dbname=camagru;charset=utf8";
    $db_user = 'root';
    $db_pass = 'root';
    $bdd = new PDO($dsn,
                $db_user,
                $db_pass,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ) );
    return $bdd;
}

// Renvoie la liste des utilisateurs
function getImages() {
    $bdd = getBdd();
    $users = $bdd->query('select IMG_PATH as path,'
            . ' USER_LOGIN as login'
            . ' from T_IMAGES')->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function saveImage(array $img)
{
    $bdd = getBdd();
    $statement = $bdd->prepare(
        'insert into T_IMAGES
        (IMG_PATH, USER_LOGIN)
        values
        (:path, :user_login)'
    );
    $statement->bindParam(':path', $img['path']);
    $statement->bindParam(':user_login', $img['login']);

    $statement->execute();
}

function countAll()
{
    $bdd = getBdd();
    $count = $bdd->query('select count(*) from T_IMAGES')->fetchColumn();
    return $count;
}

function maj_img(array $img) {

    $bdd = getBdd();

	$requete = $pdo->prepare("UPDATE T_IMAGES SET
        IMG_PATH = :path
		WHERE
        USER_LOGIN = :login");

	$requete->bindParam(':path', $img['path']);
	$requete->bindParam(':login', $img['login']);

	return $requete->execute();
}
