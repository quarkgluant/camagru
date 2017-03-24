<?php

require_once __DIR__ . '/bdd.php';

class Like extends Modele
{
    // Renvoie la liste des images
    public function getLikes()
    {
        $sql = 'select LIK_ID as like_id,'
            . ' USER_LOGIN as login'
            . ' from T_LIKES'
            . ' where IMG_ID = :img_id';

        $likes = $this->executerRequete($sql);
        return $likes->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveLike(array $like)
    {
        $sql =
            'insert into T_LIKES
            (IMG_ID, USER_LOGIN)
            values
            (:img_id, :user_login)';

        $like_bind = array(
            ':img_id'       => $like['img_id'],
            ':user_login'   => $like['login']
        );
        $this->executerRequete($sql, $like_bind);
    }

    public function countLikesByImage(array $like)
    {
        $sql = 'select count(*) from T_LIKES  where IMG_ID = :img_id';

        $like_bind = array(
            ':img_id' => $like['img_id']
        );
        $count = $this->executerRequete($sql, $like_bind)->fetchColumn();
        return $count;
    }

    public function majLike(array $like)
    {
        $sql = "UPDATE T_LIKES SET
            IMG_ID = :img_id,
            USER_LOGIN = :login,
            LIK_UPDATE = :lik_update
    		WHERE
            USER_LOGIN = :login";

        $like_bind = array(
            ':img_id'       => $like['img_id'],
            ':user_login'   => $like['login'],
            ':lik_update'   => date(DATE_W3C)
        );
        $this->executerRequete($sql, $like_bind);
    }

    public function dellike(array $like)
    {
        $sql = "DELETE FROM T_LIKES
                WHERE
                IMG_ID = :img_id and USER_LOGIN = :login limit 1";

        $like_bind = array(
            ':img_id'       => $like['img_id'],
            ':login'   => $like['login']
          );

        $this->executerRequete($sql, $like_bind);
    }
}
