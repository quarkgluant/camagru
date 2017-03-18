<?php
require_once __DIR__ . '/bdd.php';

class User extends Modele {
    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé
    // Renvoie la liste des utilisateurs
    public function getUsers() {
        $sql = 'select USER_LOGIN as login,'
            . ' USER_EMAIL as email, USER_PASSWORD as password'
            . ' from T_USERS';

        $users = $this->executerRequete($sql);
        return $users->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveUser(array $user) {
        $sql = 'insert into T_USERS'
                .'(USER_LOGIN, USER_EMAIL, USER_PASSWORD)'
                .'values'
                .'(:login, :email, :password)' ;

        $user_bind = array(
            ':login'    => $user['login'],
            ':password' => $user['password'],
            ':email'    => $user['email']
        );

        $this->executerRequete($sql, $user_bind);
    }

    public function countAllUsers() {
        $sql = 'select count(*) from T_USERS';
        $count = $this->executerRequete($sql)->fetchColumn();
        return $count;
    }

    public function majUser(array $user) {
        $sql = "UPDATE T_USERS SET
            USER_PASSWORD = :password,
            USER_EMAIL = :email,
            USER_UPDATE = :date_update
    		WHERE
            USER_LOGIN = :login";

        $user_bind = array(
            ':login'        => $user['login'],
            ':password'     => $user['password'],
            ':email'        => $user['email'],
            ':date_update'  => date(DATE_W3C)
        );

        $this->executerRequete($sql, $user_bind);
    }

    public function delUser(array $user) {
        $sql = "DELETE FROM T_USERS
                WHERE
                USER_LOGIN = :login";

        $user_bind = array(
            ':login' => $user['login']
        );

        $this->executerRequete($sql, $user_bind);
    }
}
