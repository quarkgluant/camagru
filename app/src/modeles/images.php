<?php

require_once __DIR__ . '/bdd.php';

class Image extends Modele
{
    // Renvoie la liste des images
    public function getAllImages()
    {
        $sql = 'select IMG_PATH as path,'
            . ' USER_LOGIN as login'
            . ' from T_IMAGES';

        $images = $this->executerRequete($sql);
        return $images->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getImageByUser($user)
    {
        $sql = 'select IMG_ID as img_id,'
            . ' IMG_PATH as path from T_IMAGES'
            . ' WHERE USER_LOGIN = :login';

        $image_bind = array(
            ':login' => $user['login']
        );
        $image = $this->executerRequete($sql, $image_bind);
        // return $image->fetch();
        if ($image->rowCount() > 0)
            return $image->fetch(PDO::FETCH_ASSOC);  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucune image ne correspond à l'identifiant '$user'");
    }

    public function saveImage(array $img)
    {
        $sql =
            'insert into T_IMAGES
            (IMG_PATH, USER_LOGIN)
            values
            (:path, :user_login)';

        $image_bind = array(
            ':path' => $img['path'],
            ':user_login' => $img['login']
        );
        $this->executerRequete($sql, $image_bind);
    }

    public function countAllImages()
    {
        $sql = 'select count(*) from T_IMAGES';
        $count = $this->executerRequete($sql)->fetchColumn();
        return $count;
    }

    public function majImg(array $img)
    {
        $sql = "UPDATE T_IMAGES SET
            IMG_PATH = :path
    		WHERE
            USER_LOGIN = :login";

        $image_bind = array(
            ':path' => $img['path'],
            ':user_login' => $img['login']
        );
        $this->executerRequete($sql, $image_bind);
    }
}
