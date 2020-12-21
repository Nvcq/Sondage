<?php
namespace Controller;

use Core\Controller\DefaultController;
use Model\HomeModel;
use Model\SondageModel;

class HomeController extends DefaultController {

    public static function displayHomePage() {
        
        $hasSondages = null;
        $hasFriendSondages = null;

        if(isset($_SESSION['email'])) {
            $mine = SondageModel::getMySondages(["user_id"=>$_SESSION['id']]);
            
            if(!$mine) $hasSondages = "Vous n'avez pas créé de sondages";

            $friends = HomeModel::getFriendSondages(["id"=>$_SESSION['id']]);
            
            if(!$friends) $hasFriendSondages = "Vous n'avez pas de sondages d'amis";
        
        }

        if(isset($_SESSION['email'])) {
            self::render("homepage", compact("friends", "mine", "hasSondages", "hasFriendSondages"));
        }
        else {
            self::render("homepage", compact("hasSondages", "hasFriendSondages"));
        }
        
    }
    
}