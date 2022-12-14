<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<?php include "header.php"; include "conn.php"; ?>
<body>
  <div class="form">
    <form action="" method="post">
          <?php
          if(isset($_SESSION["loggedIn"])){
            if($_SESSION["loggedIn"] == true){ ?>
            <a href="uploadArticles.php">upload article</a>
            <?php }
          }
          ?>
          <input type="text" name="nomproduit" placeholder="Nom de l'article">
          <select name="categorie">
                  <option value="vide">Trier par: </option>
                  <option value="nomproduit">Nom du produit</option>
                  <option value="categorie">Catégorie</option>
                  <option value="prix">Prix</option>
          </select>
          <input type="radio" name="tri" value="asc" checked> Croissant  
          <input type="radio" name="tri" value="desc"> Decroissant
          <button class="button buttonSearch" type="submit" name="ok">Rechercher</button>
    </form>
  </div>

    <?php
    if(isset($_POST["ok"]))
    {
        $tri = $_POST["tri"];
        $categorie = $_POST["categorie"];
        $nomproduit = $_POST["nomproduit"];
        $req = "select * from produits"; 
        //RIGHT JOIN imgproduits ON produits.id = imgproduits.id";

        if($categorie == "vide"){
          $req = "SELECT * from produits 
          /*RIGHT JOIN imgproduits 
          ON produits.id = imgproduits.id*/
          WHERE nomproduit like '%$nomproduit%'";
        }else{
          $req = "SELECT * from produits 
          /*RIGHT JOIN imgproduits 
          ON produits.id = imgproduits.id*/
          WHERE nomproduit like '%$nomproduit%' 
          order by $categorie $tri";
        }
        $resReq = mysqli_query($id, $req);
    }if(!isset($_POST["ok"]))
    {
      //SELECT MIN(imgID), nomIMG FROM `imgproduits` WHERE `id` = 101;
      //RIGHT JOIN POUR LES PHOTO SANS PRODUIT, LEFT POUR VERSA
      $req = "SELECT * from produits";
      //SELECT imgID, nomIMG from produits INNER JOIN imgproduits 
      //ON produits.id = imgproduits.id 
      //where produits.id = 137 and imgproduits.imgID = (SELECT min(imgID) FROM imgproduits WHERE imgproduits.id = '137');
      //INNER JOIN imgproduits ON produits.id = imgproduits.id";
      $resReq = mysqli_query($id, $req);
    }
        ?>
  <div class="main-content">
    <?php 
        $lignes = mysqli_fetch_all($resReq, MYSQLI_BOTH);
        foreach($lignes as $ligne){ ?>
        <?php $idProduit = $ligne['id']; ?>
          <div class="produit-carte">
            <a href="PageProduits.php?id=<?php echo $idProduit ?>">
            <?php $reqInfoIMG = "SELECT min(imgID), nomIMG FROM `imgproduits` WHERE `id` = $idProduit";
            $resInfoIMG = mysqli_query($id, $reqInfoIMG);
            $infoIMG = mysqli_fetch_array($resInfoIMG);
            echo "<img src='images/vetements/".$infoIMG[1]."'>";?>
            <br><hr style="width: 80%; margin-left: 10%;"><br>
            <p><h1><?php echo $ligne['nomproduit']; ?></h1></p><br>
            <p><?php echo $ligne['categorie']; ?></p>
            <p><?php echo "(HT) ".$ligne['prix']; ?> €</p></a>
          </div>
        <?php } ?>
  </div>
</body>
<?php include "footer.php"; ?>
</html>