<?php 
namespace Model;

use Core\Model\DefaultModel;

class HomeModel extends DefaultModel {

    public static function getFriendSondages($id) {
        $ddb = self::getDb();

        $query = $ddb->prepare(
            "SELECT friend_asked, pseudo, sondage_id, question, choice1, choice2, TIMEDIFF(ending_date, CURRENT_TIMESTAMP) AS time
            FROM ((friend
            INNER JOIN sondage ON friend.friend_asked = sondage.user_id)
            INNER JOIN user ON friend_asked = user.user_id)
            WHERE friend_asking = :id
            ORDER BY ending_date DESC"
        );

        $query->execute($id);

        return $query->fetchAll(\PDO::FETCH_ASSOC);
        
    }
}