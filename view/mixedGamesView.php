
<h1 class="text-danger">Top des ventes</h1>
<?php
ob_start();
//Appel de la variable : $gamesList = $gamesManager->getMixedGames(); du controller
while ($data = $gamesList->fetch()){
    ?>
<h2 class="text-warning"><?= $data['title'] ?></h2>
    <img src="<?= $data['imgurl'] ?>">
    <p>Description :</p>
    <p><?= $data['description'] ?></p>
    <p>PRIX : <?= $data['price'] ?></p>
    <p>En stock : <?= $data['stock'] ?></p>
    <a href="index.php?url=gameID&amp;id=<?= $data['id'] ?>" class="btn btn-outline-danger">Plus d'infos</a>
<?php
}
?>

