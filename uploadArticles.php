<?php
session_start();
include "conn.php";
if(isset($_POST['submit'])){
    
    //bails de produits
    $nom = $_POST["nom"];
    $descproduit = $_POST["descproduit"];
    $categorie = $_POST["categorie"];
    $prix = $_POST["prix"];

    //bails de photos
    $nomPhoto = $_FILES['upload']['name'];
    $typePhoto = $_FILES['upload']['type']; 
    $photoTmpNom = $_FILES['upload']['tmp_name'];
    $photoErreur = $_FILES['upload']['error'];

    //si pas d'erreur dans les photos 
    if($photoErreur == 0){    
        //ajout produit dans la BDD 
        $ajoutProduit=$id->prepare("INSERT INTO produits(nomproduit,descproduit,categorie,prix) VALUES (?,?,?,?)");
        $ajoutProduit->bind_param('sssd',$nom, $descproduit, $categorie, $prix);
        $ajoutProduit->execute();

        //si requete faite
        if ($ajoutProduit){
        //Prend le nom du produit qu'on vient de crée pour lui donner ses images
        $reqProduitCree = "SELECT id, nomproduit FROM produits where nomproduit = '$nom';";
        $infoProduitCree = mysqli_query($id, $reqProduitCree);
        $rowPhoto = "";
        $nomArticle = "";
        $produit = mysqli_fetch_array($infoProduitCree);
        $idProduitprPhoto = $produit['id'];
        $nomProdRecup = $produit['nomproduit'];
        for($i=0; $i<count($_FILES['upload']['name']); $i++) {
            //ici que je met les images dans le fichier et que je les mets dans la BDD
            //apres avoir crée et recuperé l'ID du nvx produit et c'est ici que je fait les verifs 
            //de tailles, extension etc...
            //echo $idProduitprPhoto." ".$nomPhoto[$i]."<br>";
            $ligne=$id->prepare("INSERT INTO imgproduits(nomIMG,id) VALUES (?,?)");
            $ligne->bind_param('si',$nomPhoto[$i],$idProduitprPhoto);
            $ligne->execute();
            $DestinationImg = 'images/vetements/'.$nomPhoto[$i];
            move_uploaded_file($photoTmpNom[$i], $DestinationImg); 
            }
        }else{
            echo "Erreur : ".$ajoutProduit->error;
        }
    }else{
        echo "Erreur lors du téléchargement de l'image".$photoNom;
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
            <form action="" method="post" enctype="multipart/form-data">
                Nom : <input type="text" name="nom" ><br><br>
                Description : <textarea name="descproduit"></textarea><br><br>
                Categorie : <input type="text" name="categorie" ><br><br>
                Prix <input type="text" name="prix">€
            <input type="file" accept="image/*" name="upload[]" multiple="multiple" />
            <p><input type="submit" name="submit" value="Submit"></p>
    </div>
          <?php
    } else header('Location:index.php');
  } else header('Location:index.php');
?>
<?php include "footer.php"; ?>
</body>
</html>