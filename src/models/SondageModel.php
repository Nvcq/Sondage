<?php
namespace Model;

use Core\Model\DefaultModel;

class SondageModel extends DefaultModel {

    public static function createSondage($data) {
        $ddb = self::getDb();

        $query = $ddb->prepare("INSERT INTO sondage (user_id, question, choice1, choice2, ending_date) VALUES (:user_id, :question, :c1 ,:c2, :ending_date)");

        return $query->execute($data);
    }


    public static function getMySondages($id) {
        $ddb = self::getDb();

        $query = $ddb->prepare("SELECT sondage_id, question, choice1, choice2 FROM sondage WHERE user_id = :user_id");

        $query->execute($id);

        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }


    public static function getFriendSondage($id) {
        $ddb = self::getDb();

        $query = $ddb->prepare("SELECT sondage_id, question, choice1, choice2, sondage.user_id, pseudo FROM sondage INNER JOIN user ON sondage.user_id = user.user_id WHERE sondage_id = :id");

        $query->execute($id);

        return $query->fetch();

    }


    public static function getRep($data) {
        $ddb = self::getDb();

        $query = $ddb->prepare("SELECT sondage_id, answers.user_id, choice, rep, pseudo FROM answers INNER JOIN user ON answers.user_id = user.user_id WHERE sondage_id = :id");
        $query->execute($data);
        echo json_encode($query->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function postRep1($data) {
        $ddb = self::getDb();

        $prepare = $ddb->prepare("INSERT INTO answers (sondage_id, user_id, choice, rep) VALUES (:sondageId, :user_id, 1, :rep)");
        $prepare->execute($data);
        echo json_encode("");
    }

    public function postRep2($data) {
        $ddb = self::getDb();

        $prepare = $ddb->prepare("INSERT INTO answers (sondage_id, user_id, choice, rep) VALUES (:sondageId, :user_id, 2, :rep)");
        $prepare->execute($data);
        echo json_encode("");
    }


    public static function checkIfAnswered($data) {
        $ddb = self::getDb();

        $query = $ddb->prepare("SELECT user_id FROM answers WHERE sondage_id = :sondage_id AND user_id = :user_id");
        $query->execute($data);

        return $query->fetch();

    }


    public static function closeSondage($id) {
        $ddb = self::getDb();

        $query = $ddb->prepare("SELECT TIMEDIFF(ending_date, CURRENT_TIMESTAMP) AS time FROM sondage WHERE sondage_id = :id");
        $query->execute($id);

        return $query->fetch();
    }

} 