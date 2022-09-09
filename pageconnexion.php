<?php
session_start();
include "header.php";
include "conn.php";
if(isset($_POST["ok"]))
    {
        $nomutilisateur = $_POST["nomutilisateur"];
        $mdp = $_POST["mdp"];
        $reqConnection = "select * from users where nomutilisateur = '$nomutilisateur' and mdp = '$mdp'";
        $resreqConnection = $id->query($reqConnection);
        $row = $resreqConnection->num_rows;
        if($row > 0){
            echo "ok";
        }else{
            echo "fail";
        }
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
  </div>
<?php include "footer.php"; ?>
</body>
</html>