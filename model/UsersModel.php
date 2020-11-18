<?php
session_start();

class UsersModel extends DatabasePDO
{
    //Lister tous les utilisateurs
    function getAllUser(){
        $db= $this->pdoConnect();
        $req = $db->query("SELECT * FROM user ORDER BY id DESC");
        return $req;
    }
    //Creation d'utilisateur
    public function addUser(){
        $db = $this->pdoConnect();

        if(isset($_POST['pseudo'])){
            $pseudo = $_POST['pseudo'];
        }

        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }

        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }

        if(isset($_POST['img'])){
            $img = $_POST['img'];
        }

        $req = $db->prepare("INSERT INTO user(pseudo,email,password, img) VALUES (?,?,?,?)");
        $target_dir = "public/img/";
        $img = $target_dir .basename($_FILES["img"]["name"]);
        $req->bindParam(1,$pseudo);
        $req->bindParam(2, $email);
        $req->bindParam(3, $password);
        $req->bindParam(4, $img);

        $req->execute(array($pseudo, $email, $password, $img));
        return $req;
    }

    public function logUser(){
        $db = $this->pdoConnect();
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }

        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }

            $req = $db->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
            $req->bindParam(1, $email);
            $req->bindParam(2, $password);
            $req->execute(array($email, $password));

            $count = $req->rowCount();

            $res = $req->fetch();

                if($count == 1 && !empty($res)) {
                    $_SESSION['email'] = $res['email'];
                    $_SESSION['password'] = $res['password'];
                    $_SESSION['loggedin'] = true;


                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                        echo '<div class="main-bloc"><p class="alert-success">connexion reussie, bienvenue : '. $_SESSION["email"] . '<br /> Votre mot de passe : ' . $_SESSION["password"] . '</p>';
                        echo '<a href="./index.php?url=administration" class="btn btn-outline-warning">Espace administration</a>';
                        echo '<a href="index.php?url=connexion" class="btn btn-outline-danger ml-2 my-2 my-sm-0" type="submit">Deconnexion</a></div>';
                    } else {
                        echo "Erreur de connexion : Merci de vérifié que les champs email et mot de passe soient bien rempli et valide !";
                    }
                }else{
                    echo '<p class="alert-danger">Erreur de connexion : Merci de vérifié que les champs email et mot de passe soient bien rempli et valide !</p>';
                }

    }
}

