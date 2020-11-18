<?php
require "public/pdf/fpdf.php";
class DatabasePDO
{
    protected function pdoConnect(){
        $user = "root";
        $pass = "";
        try{
            $db = new PDO("mysql:host=localhost;dbname=phpmvc;charset=utf8", $user, $pass);
            return $db;
        }catch (PDOException $e){
            die("Erreur de connexion" .$e->getMessage());
        }
    }
}