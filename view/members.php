

<?php
ob_start();
?>
<h1 class="text-danger">Liste des membres</h1>
<?php
//Appel de la variable : $gamesList = $gamesManager->getMixedGames(); du controller
while ($data = $userList->fetch()){
    ?>

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
    <?php
}
?>
