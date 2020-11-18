
<br >
<div class="main-bloc">
    <h1 class="text-warning">INSCRIPTION</h1>
    <form method="post" action="" enctype="multipart/form-data">

        <div class="form-group">
            <label for="pseudo">Votre pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo"/>
        </div>

        <div class="form-group">
            <label for="email">Votre email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Votre email"/>
        </div>

        <div class="form-group">
            <label for="password">Votre mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe"/>
        </div>

        <div class="form-group">
            <label for="password-repeat">Répéter votre mot de passe</label>
            <input type="password" class="form-control" id="password-repeat" name="password-repeat" placeholder="Répéter votre mot de passe"/>
        </div>
        <div class="form-group">
            <label for="img">Votre image de profil</label>
            <input type="file" name="img" class="form-control-file" id="img">
        </div>
        <br />
        <button type="submit" class="btn btn-outline-success">Valider</button>
    </form>
</div>


<?php
//Traitement de l'image
//Chemin

if(isset($_POST['img'])){
    $img = $_GET['img'];
}

//Chemin ou sont stocké les images
$target_dir = "public/img/";
//dossier + nom de l'image
$img = $_POST['img'];
$img = $target_dir .basename($_FILES["img"]["name"]);
//Bool ok ou non
$uploadOK = 1;
//Formatage du nom des photos
$imageFileType = strtolower(pathinfo($img, PATHINFO_EXTENSION));

//Verifie si image est vraie ou fausse
if(isset($_POST['submit'])){
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if($check !== false){
        echo "Image valide : " . $check["mime"] . ".";
        $uploadOK = 1;
    }else{
        echo "Image non valide ! ";
        $uploadOK = 0;
    }
}
//Verifie si image existe deja
if(file_exists($img)){
    echo "Cette image existe deja !";
    $uploadOK = 0;
}
//Autorisé des formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"){
    echo "Désolé ce format d'image n'est pas pris en charge ! Seul png, jpg, jpeg et gif sont autorisé.";
    $uploadOK = 0;
}

//Si tous est ok
if($uploadOK == 0){
    echo '<h1 class="text-danger">Une erreur s\'est produite lors du téléchargement de votre image</h1>';
}else{
    if(move_uploaded_file($_FILES["img"]["tmp_name"], $img)){
        echo '<script type="text/javascript"> alert("Vous êtes désormais inscrit sur notre site !")</script>';
        header("location: index.php?url=membres");
    }else{
        echo '<h1 class="text-danger">Une erreur de téléchargement c\'est produite lors du traitement </h1>';
    }
}
?>





