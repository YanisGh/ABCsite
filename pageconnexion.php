<?php
session_start();
include "header.php";
include "conn.php";
//Si l'on appuie sur le bouton pour se connecter
if(isset($_POST["ok"]))
    {
        $nomutilisateur = $_POST["nomutilisateur"];
        $mdp = $_POST["mdp"];
        $reqConnection = "select * from users where nomutilisateur = '$nomutilisateur' and mdp = '$mdp'";
        $resreqConnection = $id->query($reqConnection);
        $row = $resreqConnection->num_rows;
        if($row == 1){
        $_SESSION["loggedIn"] = true;
        $_SESSION['nomutilisateur'] = $nomutilisateur;
        echo  $_SESSION['nomutilisateur'];
        }else{
            echo "mauvais identifiants";
        }
    }
    //--pour la deconnexion
    if(isset($_POST["deconnexion"]))
    {
        session_destroy();
        session_unset();
        unset($_SESSION["loggedIn"]);
    }
?>
<!DOCTYPE html>
<html lang="fr">
<body>
  <div class="main-content">
    <div class="connexion">
        <h1>Espace employé</h1> 
        <form action="" method="post">
            <input type="text" name="nomutilisateur" placeholder="Nom d'utilisateur employé">
            <input type="text" name="mdp" placeholder="Mot de passe">
            <input type="submit" value="Se connecter" name="ok">
        </form>
    </div>
    <div class="connexion">
        <h1>Espace employé</h1> 
        <form action="" method="post">
            <input type="text" name="nomutilisateur" placeholder="Nom d'utilisateur employé">
            <input type="text" name="mdp" placeholder="Mot de passe">
            <input type="submit" value="Se deconnecter" name="deconnexion">
        </form>
    </div>
  </div>
<?php include "footer.php"; ?>
</body>
</html>