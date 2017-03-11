<?php
require_once __DIR__ . '/bdd.php';

// Effectue la connexion à la BDD
// Instancie et renvoie l'objet PDO associé
// Renvoie la liste des utilisateurs
function getUsers()
{
    $bdd = getBdd();
    $users = $bdd->query('select USER_LOGIN as login,'
        . ' USER_EMAIL as email, USER_PASSWORD as password'
        . ' from T_USERS')->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function saveUser(array $user)
{
    $bdd = getBdd();
    $statement = $bdd->prepare(
        'insert into T_USERS
        (USER_LOGIN, USER_PASSWORD, USER_EMAIL)
        values
        (:login, :password, :email)'
    );
    $statement->bindParam(':login', $user['login']);
    $statement->bindParam(':password', $user['password']);
    $statement->bindParam(':email', $user['email']);

    $statement->execute();
}

function countAll()
{
    $bdd = getBdd();
    $count = $bdd->query('select count(*) from T_USERS')->fetchColumn();
    return $count;
}

function majUser(array $user)
{

    $bdd = getBdd();

    $requete = $bdd->prepare("UPDATE T_USERS SET
        USER_PASSWORD = :password,
        USER_EMAIL = :email,
        USER_UPDATE = :login
		WHERE
        USER_LOGIN = :login");

    $requete->bindParam(':login', $user['login']);
    $requete->bindParam(':password', $user['password']);
    $requete->bindParam(':email', $user['email']);

    return $requete->execute();
}

function delUser(array $user)
{
    $bdd = getBdd();
    $statement = $bdd->prepare("DELETE FROM T_USERS
              WHERE
                USER_LOGIN = :login");

    $statement->bindParam(':login', $user['login']);

    $statement->execute();
}
