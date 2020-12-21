<?php 
namespace Model;

use Core\Model\DefaultModel;

class UserModel extends DefaultModel{

    public static function signup($data) {
        $ddb = self::getDb();
        
        $query = $ddb->prepare("INSERT INTO user (firstname, lastname, pseudo, email, password) VALUES (:firstname, :lastname, :pseudo, :email, :password)");

        return $query->execute($data);
    }

    public static function checkUser($email) {
        $ddb = self::getDb();

        $query = $ddb->prepare("SELECT user_id FROM user WHERE email = :email");

        $query->execute($email);

        return $query->fetch();
    }

    public static function chekUserExcept($data) {
        $ddb = self::getDb();

        $query = $ddb->prepare("SELECT user_id FROM user WHERE email = :email EXCEPT SELECT user_id FROM user WHERE user_id = :id");

        $query->execute($data);

        return $query->fetchAll();
    }


    public static function findUser($email) {
        $ddb = self::getDb();

        $query = $ddb->prepare("SELECT user_id, firstname, lastname, pseudo, password FROM user WHERE email = :email");

        $query->execute($email);

        return $query->fetch();
    }


    public static function updateProfile($data) {
        $ddb = self::getDb();

        $query = $ddb->prepare("UPDATE user SET firstname = :firstname, lastname = :lastname, pseudo = :pseudo, email = :email, password = :password WHERE user_id = :user_id");

        return $query->execute($data);
    }


    public static function listingFriend($id) {
        $ddb = self::getDb();

        $query = $ddb->prepare(
            "SELECT friend_asked, email, pseudo
            FROM friend
            INNER JOIN user ON friend.friend_asked = user.user_id
            WHERE friend_asking = :id"
        );

        $query->execute($id);

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }


    public static function removeFriend($data) {
        $ddb = self::getDb();

        $query = $ddb->prepare("DELETE FROM friend WHERE friend_asking = :asking AND friend_asked = :asked");

        return $query->execute($data);
    }


    public static function addFriend($data) {
        $ddb = self::getDb();

        $query = $ddb->prepare("INSERT INTO friend (friend_asking, friend_asked) VALUES (:asking, :asked)");

        return $query->execute($data);
    }

    public static function checkFriend($data) {
        $ddb = self::getDb();

        $query = $ddb->prepare("SELECT * FROM friend WHERE friend_asking = :asking AND friend_asked = :asked");

        $query->execute($data);

        return $query->fetch();
    }

}