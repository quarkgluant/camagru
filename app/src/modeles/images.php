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

    public function getImageByPath($user)
    {
        $sql = 'select IMG_ID as img_id, USER_LOGIN as img_user '
            . 'from T_IMAGES '
            . ' WHERE IMG_PATH = :image_path';

        $image_bind = array(
            ':image_path' => $user['image_path']
        );
        $image = $this->executerRequete($sql, $image_bind);
        // return $image->fetch();
        if ($image->rowCount() > 0)
            return $image->fetchAll(PDO::FETCH_ASSOC);
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

    public function delImage(array $img)
    {
        $sql = 'DELETE FROM T_IMAGES WHERE USER_LOGIN = :login AND IMG_ID = :img_id';

            var_dump($img['image_path']);var_dump($img['login']);
        $image_bind = array(
            ':img_id' => $img['img_id'],
            ':login' => $img['login']
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
