<?php 
namespace Controller;

use Core\Controller\DefaultController;
use Core\Http;
use Model\SondageModel;

class SondageController extends DefaultController {

    public function displayCreateSondagePage() {
        if(isset($_SESSION['email'])) {
            self::render("createSondage");
        }
        else {
            $msgError = "Vous devez être connecté pour créer un sondage";
            self::render("inc/error", compact("msgError"));
            die();
        }
    }


    public function createSondage() {
        if(isset($_POST['create']) && isset($_POST['choice1']) && isset($_POST['choice2']) && isset($_POST['ending_date']) ) {
            
            if(!isset($_SESSION['email'])) Http::redirect("");

            $sondageData = [
                "user_id" =>$_SESSION['id'],
                "question" => $_POST["question"],
                "c1" => $_POST["choice1"],
                "c2" => $_POST["choice2"],
                "ending_date" => $_POST['ending_date'],
            ];
            
            $create = SondageModel::createSondage($sondageData);

            if($create) {
                Http::redirect("");
            }
            else {
                $msgError = "Erreur lors de la création du sondage";
                self::render("inc/error", compact("msgError"));
                die();
            }

        }
        else {
            $msgError = "Vous devez compléter le formulaire de création de sondage !";
            self::render("inc/error", compact("msgError"));
            die();
        }
    }



    public function displayMySondagesPage() {
        
        if(isset($_SESSION['email'])) {
            
            $sondages = SondageModel::getMySondages(["user_id"=>$_SESSION['id']]);

            $hasSondages = null;

            if(!$sondages) $hasSondages = "Vous n'avez pas créé de sondages";

            self::render("sondages", compact("sondages", "hasSondages"));

        }
        else {
            $msgError = "Vous devez être connecté pour consulter vos sondages";
            self::render("inc/error", compact("msgError"));
            die();
        }
    }


    public function displayAnswerPage() {
        if(!isset($_GET['id'])) {
            $msgError = 'Vous ne pouvez pas accéder a cette page';
            self::render("inc/error", compact("msgError"));
            die();
        }
        else {

            $close = SondageModel::closeSondage(["id"=>$_GET['id']]);

            
            if($close->time > 0) {
                $check = SondageModel::checkIfAnswered(["sondage_id"=>$_GET['id'], "user_id"=>$_SESSION['id']]);

                if($check) {
                    $msgError = 'Vous avez déja répondu a ce sondage';
                    self::render("inc/error", compact("msgError"));
                    die();                
                }
                else {
                    $sondage = SondageModel::getFriendSondage(["id"=>$_GET["id"]]);
                    self::render("answer", compact('sondage'));
                }
            }
            else {
                $msgError = "Ce sondage est clôturé";
                self::render("inc/error", compact("msgError"));
                die();
            }
        }

    }


    public function displayResultPage() {
        
        if(isset($_GET['id'])) {
            
            $id = $_GET['id'];
            
            self::render("result", compact("id"));

            
        }
        else {
            $msgError = "Vous n'avez pas accès à cette page";
            self::render("inc/error", compact("msgError"));
            die();
        }
        
    }

}