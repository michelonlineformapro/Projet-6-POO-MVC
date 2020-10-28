<?php
require "model/DatabasePDO.php";
class GamesModel extends DatabasePDO {

    //Cette classe herite de DatabasePDO

    //On accède à la methode pdoConect() depuis la classe DatabasePDO car elle est declarée protected

    public function getMixedGames(){
        $db = $this->pdoConnect();
        $req = $db->query('SELECT * FROM mixedgames');
        return $req;
    }

    public function getMixedGamesById($getId){
        $db = $this->pdoConnect();
            $req = $db->prepare("SELECT * FROM mixedgames WHERE id = ?");
        $req->execute(array($getId));
        $gameById = $req->fetch();
        return $gameById;
    }
}
