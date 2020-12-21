<?php 
namespace Core\Model;

class DefaultModel{


    protected static function getDb() : \PDO{
        return new \PDO(
            'mysql:host=localhost;dbname=sondage', "root" , "", 
            array(\PDO::ATTR_ERRMODE=>\PDO::ERRMODE_WARNING,\PDO::ATTR_DEFAULT_FETCH_MODE=>\PDO::FETCH_OBJ)
        );
    }

//             /!\   A CHANGER EN FONCTION DE SA PROPRE CONNEXION A LA BDD    /!\


}


