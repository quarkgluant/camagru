<?php
require_once __DIR__ . '/bdd.php';

class User extends Modele {
    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé
    // Renvoie la liste des utilisateurs
    public function getUsers()
    {
        $sql = 'select USER_LOGIN as login,'
            . ' USER_EMAIL as email, USER_PASSWORD as password'
            . ' from T_USERS';
        $users = $this->executerRequete($sql);
        return $users;
    }

    public function saveUser(array $user)
    {
        $sql = "insert into T_USERS
                (USER_LOGIN, USER_EMAIL, USER_PASSWORD )
                values
                (?, ?, ?)" ;
        // $statement->bindParam(':login', $user['login']);
        // $statement->bindParam(':password', $user['password']);
        // $statement->bindParam(':email', $user['email']);

        $this->executerRequete($sql, array($user['login'], $user['email'], $user['password'] ));
    }

    public function countAll()
    {
        $sql = 'select count(*) from T_USERS';
        $count = $this->executerRequete($sql)->fetchColumn();
        return $count;
    }

    public function majUser(array $user)
    {
        $sql = "UPDATE T_USERS SET
            USER_PASSWORD = ?,
            USER_EMAIL = ?,
            USER_UPDATE = ?
    		WHERE
            USER_LOGIN = ?";

        return $this->executerRequete($sql, $user);
    }

    public function delUser(array $user)
    {
        $sql = "DELETE FROM T_USERS
                WHERE
                USER_LOGIN = ?";

        $this->executerRequete($sql, $user);
    }
}
