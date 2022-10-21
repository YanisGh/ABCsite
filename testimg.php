<?php
session_start();
include "conn.php";
if (isset($_POST['ok'])){

    $nom = $_POST["nom"];
    $descproduit = $_POST["descproduit"];
    $categorie = $_POST["categorie"];
    $prix = $_POST["prix"];

    //bail de photo 
    $photo = $_FILES['photo'];
    $photoNom = $_FILES['photo']['name'];
    $photoTmpNom = $_FILES['photo']['tmp_name'];
    $photoTaille = $_FILES['photo']['size'];
    $photoErreur = $_FILES['photo']['error'];
    $photoType = $_FILES['photo']['type'];
    //print_r($photo);
    //bail de photo

    $photoExt = explode('.', $photoNom);
    //Pour mettre en LowerCase l'extension du fichier pour verifier. 
    $photoLC = strtolower(end($photoExt));
    //Les extensions qu'on va autorisé
    $ExtAutorise = array ('jpg', 'jpeg', 'png'); 
    //Apres avoir mis en LowerCase les Ext, on check si le ficher a une extension autorisé
    if(in_array($photoLC, $ExtAutorise)){
        if($photoErreur == 0){
            if ($photoTaille < 500000){
              //var_dump($nom, $descproduit, $categorie, $prix);
                $photoNomFinal = strtolower($photoNom);
                $DestinationImg = 'images/vetements/'.$photoNomFinal;
                move_uploaded_file($photoTmpNom, $DestinationImg);
                $result=$id->prepare("INSERT INTO produits(nomproduit,descproduit,categorie,prix) VALUES (?,?,?,?)");
                $result->bind_param('sssd',$nom, $descproduit, $categorie, $prix);
                $result->execute();
                $sql = "SELECT id, nomproduit FROM produits where nomproduit = '$nom';";
                $resultphoto = mysqli_query($id, $sql);
                while($ligne = mysqli_fetch_array($resultphoto)) {
                    $rowPhoto = $ligne['id']; 
                    $ligne=$id->prepare("INSERT INTO imgproduits(nomIMG,id) VALUES (?,?)");
                    $ligne->bind_param('si',$photoNomFinal,$rowPhoto);
                    $ligne->execute();
                }              
            }
            else{
                echo "Image".$photoNom."trop lourde";
            }
        }
        else {
            echo "Erreur lors du téléchargement de l'image".$photoNom;
        }
    }
    else{
        echo "Le type de fichier de l'image ".$photoNom." n'est pas autorisé";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<?php include "header.php"; ?>
<body>
    <?php
    if(isset($_SESSION["loggedIn"])){
    if($_SESSION["loggedIn"] == true){?>
    <div class="main-content">
        <div class="contact">
            <form action="" method="POST" enctype="multipart/form-data">
                Nom : <input type="text" name="nom" ><br><br>
                Description : <textarea name="descproduit"></textarea><br><br>
                Categorie : <input type="text" name="categorie" ><br><br>
                Prix <input type="text" name="prix"> €<br><br>
            <input type="file" name="photo" required>
            <button type="submit" name="ok">Ok</button> 
        </div>
    </div>
          <?php
    } else header('Location:index.php');
  } else header('Location:index.php');
?>
<?php include "footer.php"; ?>
</body>
</html>