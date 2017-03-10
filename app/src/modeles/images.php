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
            . ' USER_ID as user_id, REV_ID as rev_id'
            . ' from T_IMAGES')->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function saveImage(array $img)
{
    $bdd = getBdd();
    $statement = $bdd->prepare(
        'insert into T_IMAGES
        (IMG_PATH, USER_ID)
        values
        (:path, :password, :email)'
    );
    $statement->bindParam(':path', $img['path']);
    $statement->bindParam(':user_id', $user['user_id']);

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
        path = :path,
        rev_id = :rev_id
		WHERE
        login = :login");

	$requete->bindParam(':login', $user['login']);
	$requete->bindParam(':password', $user['password']);
    $requete->bindParam(':email', $user['email']);

	return $requete->execute();
}
