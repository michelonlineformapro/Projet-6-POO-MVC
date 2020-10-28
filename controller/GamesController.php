<?php
require_once "model/GamesModel.php";

function listMixedGames(){
    //Appel de la classe model
    $gamesManager = new GamesModel();
    //Appel de la fonction request da la classe model
    $gamesList = $gamesManager->getMixedGames();
    require "view/mixedGamesView.php";
    //Appel de la vue

}

function addGamesByID(){
    $gamesManager = new GamesModel();
    $gameById = $gamesManager->getMixedGamesById($_GET['id']);
    require "view/mixedGamesDetailView.php";

}