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

            $res = $req->fetch();
                if($res['email'] == $email && $res['password'] == $password) {
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    echo "connexion reussie, bienvenue : " . $email . " Votre mot de passe : " . $password . "<br />";
                    echo '<a href="index.php?url=administration" class="btn btn-outline-warning">Espace administration</a>';
                }else{
                    echo "Erreur de connexion : Merci de vérifié que les champs email et mot de passe soient bien rempli et valide !";
                }






    }
}

