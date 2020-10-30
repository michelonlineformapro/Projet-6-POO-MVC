

<?php
ob_start();
?>
<hr>
<h1 class="text-danger text-center">Top des ventes</h1>
<hr>
<?php
//Appel de la variable : $gamesList = $gamesManager->getMixedGames(); du controller
while ($data = $gamesList->fetch()){
    ?>
        <div class="row">
            <div class="col-6 text-center">
                <h2 class="text-warning"><?= $data['title'] ?></h2>
                <img width="25%" src="<?= $data['imgurl'] ?>">
            </div>
            <div class="col-6">
                <h2 class="text-success">Description :</h2>
                <p><?= $data['description'] ?></p>
                <p>PRIX : <?= $data['price'] ?></p>
                <p>En stock : <?= $data['stock'] ?></p>
                <a href="index.php?url=gameID&amp;id=<?= $data['id'] ?>" class="btn btn-outline-danger">Plus d'infos</a>
            </div>
        </div>
    <br />
<?php
}
?>

