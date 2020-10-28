<?php
//Appel du controller
require "controller/GamesController.php";
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
    }
    if(empty($url)){
        require "view/404.php";
    }
$content = ob_get_clean();
require "view/template.php";





