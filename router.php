<?php

use Controller\HomeController;
use Controller\SondageController;
use Controller\UserController;
use Model\ChatModel;
use Model\SondageModel;

$user = new UserController();
$sondage = new SondageController();


if(array_key_exists("page", $_GET)){
    switch ($_GET['page']) {

        case 'sign':
            $user->displaySignPage();
            break;

        case 'signed':
            $user->sign();
            break;

        case 'log':
            $user->displayLogPage();
            break;

        case 'logged':
            $user->log();
            break;

        case 'logout':
            $user->logout();
            break;

        case 'profile':
            $user->displayProfilePage();
            break;

        case 'changeProfile':
            $user->displayChangeProfilePage();
            break;

        case 'changed':
            $user->changeProfile();
            break;

        case 'friend':
            $user->displayFriendPage();
            break;

        case 'removeFriend':
            $user->removeFriend();
            break;

        case 'addFriend':
            $user->addFriend();
            break;

        case 'createSondage':
            $sondage->displayCreateSondagePage();
            break;

        case 'creating':
            $sondage->createSondage();
            break;

        case 'mySondages':
            $sondage->displayMySondagesPage();
            break;

        case 'answer':
            $sondage->displayAnswerPage();
            break;

        case 'postRep1':
            $rep = new SondageModel();
            $rep->postRep1($_POST);
            break;

        case 'postRep2':
            $rep = new SondageModel();
            $rep->postRep2($_POST);
            break;

        case 'getRep':
            $rep = new SondageModel();
            $rep->getRep($_POST);
            break;

        case 'result':
            $sondage->displayResultPage();
            break;


        case 'postMessage':
            $chat = new ChatModel();
            $chat->postMessage($_POST);
            break;

        case 'getMessages':
            $chat = new ChatModel();
            $chat->getMessages($_POST);
            break;
        
        default:
            echo "Mauvais url !";
            die();
            break;
    }
}else {
    $controller = new HomeController();
    $controller->displayHomePage();
}

