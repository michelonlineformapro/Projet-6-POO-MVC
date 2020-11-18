<?php

//Ici appelde la variable $gameById du controller : $gameById = $gamesManager->getMixedGamesById($_GET['id']);
?>
<div class="main-bloc">
    <h1 class="text-danger">Détails du jeux</h1>
    <h2 class="text-warning"><?= $gameById['title'] ?></h2>
    <img width="15%" src="<?= $gameById['imgurl'] ?>" alt="" title="<?= $gameById['title'] ?>">
    <p>Description :</p>
    <p><?= $gameById['description'] ?></p>
    <p>PRIX : <?= $gameById['price'] ?></p>
    <p>En stock : <?= $gameById['stock'] ?></p>

    <a href="" class="btn btn-outline-dark">Acheter</a>
    <a href="index.php?url=top-des-ventes" class="btn btn-outline-success">Retour</a>
</div>



