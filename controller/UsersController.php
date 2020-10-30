<?php
require_once "model/UsersModel.php";

function displayAllUser(){
    $userManager = new UsersModel();
    $userList = $userManager->getAllUser();
    require "view/members.php";
}

function recordUser(){
    //Appel de la classe model
    $userManager = new UsersModel();
    //Appel de la fonction request da la classe model
    $addUser = $userManager->addUser();
}

function loginUsers(){
    $userManager = new UsersModel();
    $logUser = $userManager->logUser();
}


