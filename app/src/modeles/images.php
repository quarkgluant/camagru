<?php

require_once __DIR__ . '/bdd.php';

class Image extends Modele {
    // Renvoie la liste des images
    public function getImages() {
        $sql = 'select IMG_PATH as path,'
                . ' USER_LOGIN as login'
                . ' from T_IMAGES';

        $images = $this->executerRequete($sql);
        return $images->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveImage(array $img) {
        $sql =
            'insert into T_IMAGES
            (IMG_PATH, USER_LOGIN)
            values
            (:path, :user_login)'
        ;

        $image_bind = array(
            ':path'         => $img['path'],
            ':user_login'   => $img['login']
        );
        $this->executerRequete($sql, $image_bind);
    }

    public function countAllImages() {
        $sql = 'select count(*) from T_IMAGES';
        $count = $this->executerRequete($sql)->fetchColumn();
        return $count;
    }

    public function majImg(array $img) {
    	$sql = "UPDATE T_IMAGES SET
            IMG_PATH = :path
    		WHERE
            USER_LOGIN = :login";

        $image_bind = array(
            ':path'         => $img['path'],
            ':user_login'   => $img['login']
        );
    	$this->executerRequete($sql, $image_bind);
    }
}
