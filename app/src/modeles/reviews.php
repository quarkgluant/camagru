<?php
require_once __DIR__ . '/bdd.php';

class Review extends Modele
{
    // Effectue la connexion à la BDD
    // Instancie et renvoie l'objet PDO associé
    // Renvoie la liste des utilisateurs
    public function getAllReviews()
    {
        $sql = 'select USER_LOGIN as login,'
            . ' REV_TEXT as comment,'
            . ' IMG_ID as id'
            . ' from T_REVIEWS';

        $reviews = $this->executerRequete($sql);
        return $reviews->fetchAll(PDO::FETCH_ASSOC);
    }

    public function saveReview(array $review)
    {
        $sql = 'insert into T_REVIEWS'
            . '(USER_LOGIN, REV_TEXT, IMG_ID)'
            . 'values'
            . '(:login, :comment, :id)';

        $reviews_bind = array(
            ':login' => $review['login'],
            ':comment' => $review['comment'],
            ':id' => $review['img_id']
        );

        $this->executerRequete($sql, $reviews_bind);
    }

    public function countAllReviews()
    {
        $sql = 'select count(*) from T_REVIEWS';
        $count = $this->executerRequete($sql)->fetchColumn();
        return $count;
    }

    public function majReview(array $review)
    {
        $sql = "UPDATE T_REVIEWS SET
            REV_TEXT = :comment,
            IMG_ID = :img_id,
            REV_UPDATE = :date_update
    		WHERE
            USER_LOGIN = :login";

        $reviews_bind = array(
            ':login' => $reviews['login'],
            ':comment' => $reviews['comment'],
            ':id' => $reviews['img_id'],
            ':date_update' => date(DATE_W3C)
        );

        $this->executerRequete($sql, $reviews_bind);
    }

    public function delReview(array $reviews)
    {
        $sql = "DELETE FROM T_REVIEWS
                WHERE
                USER_LOGIN = :login and IMG_ID = :img_id";

        $reviews_bind = array(
            ':img_id' => $reviews['img_id'],
            ':login' => $reviews['login'],
        );

        $this->executerRequete($sql, $reviews_bind);
    }

    public function listByUser(array $user)
    {
        $sql = 'select '
            . ' REV_TEXT as comment,'
            . ' IMG_ID as id'
            . ' from T_REVIEWS'
            . ' where USER_LOGIN = :login'
            . ' order by REV_DATE DESC';

        $reviews_bind = array(
            ':login' => $user['login']
        );

        $reviews = $this->executerRequete($sql, $reviews_bind);
        return $reviews->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listByImage(array $image)
    {
        $sql = 'select '
            . ' REV_TEXT as review,'
            . ' USER_LOGIN as login'
            . ' from T_REVIEWS'
            . ' where IMG_ID = :img_id'
            . ' order by REV_DATE DESC';

        $reviews_bind = array(
            ':img_id' => $image['img_id']
        );

        $reviews = $this->executerRequete($sql, $reviews_bind);
        return $reviews->fetchAll(PDO::FETCH_ASSOC);
    }


}
