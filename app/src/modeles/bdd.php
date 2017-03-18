<?php
// function getBdd()
// {
//     $dsn = "mysql:host=localhost;dbname=camagru;charset=utf8";
//     $db_user = 'root';
//     $db_pass = 'root';
//     $bdd = new PDO($dsn,
//         $db_user,
//         $db_pass,
//         array(
//             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//         ));
//     return $bdd;
// }
//
//
// class BDDAccess
// {
//     public $bdd;
//
//     public function __construct(
//         $dsn = "mysql:host=localhost;dbname=camagru;charset=utf8",
//         $db_user = "root",
//         $db_pass = "root")
//     {
//             $bdd = new PDO($dsn,
//                         $db_user,
//                         $db_pass,
//                         array(
//                             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
//                         ) );
//             $this->bdd = $bdd;
//
//     }
//
//     public function countAllUsers()
//     {
//         $count = $this->db->query('select count(*) from t_users')->fetchColumn();
//         return $count;
//     }
// }
//
//
/**
 * Classe abstraite Modèle.
 * Centralise les services d'accès à une base de données.
 * Utilise l'API PDO
 *
 * @author Baptiste Pesquet et Patrice Cadiot
 */
abstract class Modele {

    /** Objet PDO d'accès à la BD */
    private $bdd;

    /**
     * Exécute une requête SQL éventuellement paramétrée
     *
     * @param string $sql La requête SQL
     * @param array $valeurs Les valeurs associées à la requête
     * @return PDOStatement Le résultat renvoyé par la requête
     */
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe
        }
        else {
            $resultat = $this->getBdd()->prepare($sql);  // requête préparée
            foreach ($params as $key => $value) {
                $resultat->bindParam($key, $value);
            }
            $resultat->execute($params);
        }
        return $resultat;
    }

    /**
     * Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
     *
     * @return PDO L'objet PDO de connexion à la BDD
     */
    private function getBdd() {
        if ($this->bdd == null) {
            // Création de la connexion
            $this->bdd = new PDO(
                'mysql:host=localhost;dbname=camagru;charset=utf8',
                'root',
                'root',
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ));
        }
        return $this->bdd;
    }

}
