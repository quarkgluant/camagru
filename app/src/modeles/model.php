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
function getUsers() {
    $bdd = getBdd();
    $users = $bdd->query('select USER_LOGIN as login,'
            . ' USER_EMAIL as email, USER_PASSWORD as password'
            . ' from users')->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function saveUser(array $user)
{
    $bdd = getBdd();
    $statement = $bdd->prepare(
        'insert into users
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
    $count = $bdd->query('select count(*) from users')->fetchColumn();
    return $count;
}
