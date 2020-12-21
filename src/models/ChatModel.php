<?php 
namespace Model;

use Core\Model\DefaultModel;

class ChatModel extends DefaultModel{

    public function getMessages($data)
    {   
        $ddb = self::getDb();
        $query = $ddb->prepare("SELECT content, pseudo FROM chat INNER JOIN user ON chat.user_id = user.user_id WHERE sondage_id = :sondage_id ORDER BY msg_date");
        $query->execute($data);
        echo json_encode($query->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function postMessage($data)
    {
        $ddb = self::getDb();
        $prepare = $ddb->prepare("INSERT INTO chat (content, sondage_id, user_id) VALUES (:content, :sondage_id, :user_id)");
        $prepare->execute($data);
        echo json_encode("");
    }
}