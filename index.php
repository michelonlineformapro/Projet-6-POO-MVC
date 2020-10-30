<?php
//Appel du controller
require "controller/GamesController.php";
require "controller/UsersController.php";
ob_start();
if(isset($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = "top-des-ventes";
}
//Si index.php?url=top-des-ventes

    if($url == "top-des-ventes"){
        $title = "QIWOGAMES SHOP";
        listMixedGames();
    }elseif(isset($_GET['id']) && $_GET['id'] > 0){
        if($url == "jeuxID"){
            require "view/404.php";
        }else{
            $title = "QIWOGAMES DÉTAILS DU JEUX";
            addGamesByID();
        }
    }elseif($url == "meteo-api"){
        require "meteo.php";
    }elseif ($url == "inscription"){
        $title = "QIWOGAMES - Inscription -";
        require "view/inscription.php";
        if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_FILES['img']['name'])){
            $title = "QIWOGAMES - Inscription -";
            recordUser();
        }
    }elseif ($url == "profile"){
        require "view/profile.php";
    }elseif ($url == "membres"){
        $title = "QIWOGAMES - Membres -";
        displayAllUser();

    }elseif ($url == "connexion"){
        require "view/connexion.php";
        $title = "QIWOGAMES - Connexion -";
        loginUsers();
    }


    if(empty($url)){
        require "view/404.php";
    }
$content = ob_get_clean();
require "view/template.php";





