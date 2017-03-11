<?php

require_once __DIR__ . '/bdd.php';

// Renvoie la liste des images
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

function countAllImages()
{
    $bdd = getBdd();
    $count = $bdd->query('select count(*) from T_IMAGES')->fetchColumn();
    return $count;
}

function majImg(array $img) {

    $bdd = getBdd();

	$requete = $pdo->prepare("UPDATE T_IMAGES SET
        IMG_PATH = :path
		WHERE
        USER_LOGIN = :login");

	$requete->bindParam(':path', $img['path']);
	$requete->bindParam(':login', $img['login']);

	return $requete->execute();
}
