

<?php

ob_start();
?>
<br />
<div class="main-bloc form-inline my-2 my-lg-0 text-center">
    <h1 class="text-danger">Liste des vendeurs</h1>
    <br />
    <a class="btn btn-outline-dark float-right" name="generatePDF">Generer un PDF</a>
</div>
<br>

<?php
//Appel de la variable : $gamesList = $gamesManager->getMixedGames(); du controller
while ($data = $userList->fetch()){
    ?>
<div class="main-bloc">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Pseudo</th>
            <th scope="col">Email</th>
            <th scope="col">Mot de passe</th>
            <th scope="col">Image</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row"><?= $data['id'] ?></th>
            <td><img width="10%" src="<?= $data['img'] ?>" alt="<?= $data['img'] ?>" title="<?= $data['img'] ?>"/></td>
            <td><?= $data['pseudo'] ?></td>
            <td><?= $data['email'] ?></td>
            <td><?= $data['password'] ?></td>
        </tr>
        </tbody>
    </table>
</div>
    <?php
}
?>

<?php


