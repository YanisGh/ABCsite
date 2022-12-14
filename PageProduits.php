<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<?php
include "header.php"; include "conn.php";
if(isset($_GET['id'])){
  $idObtenu = true;
  $idProduit = mysqli_real_escape_string($id, $_GET['id']);
}
//Pour modifier 
if (isset($_POST['okModif'])){
  $nomMAJ = $_POST["nomUpdate"];
  $descMAJ = $_POST["descproduitUpdate"];
  $catMAJ = $_POST["categorieUpdate"];
  $prixMAJ = $_POST["prixUpdate"];
  $reqMAJ=$id->prepare("UPDATE `produits` SET `nomproduit`= ?, `descproduit`= ?, `categorie`= ?, `prix`= ? WHERE `id`= ?");
  $reqMAJ->bind_param('sssdi',$nomMAJ, $descMAJ, $catMAJ , $prixMAJ, $idProduit);
  $reqMAJ->execute();
  echo "Produit mis à jour.";
  }
  //Pour supprimer
if (isset($_POST['okSupp'])){
  $photoNom = $_POST["photoNom"];
  $reqSuppImg = "DELETE FROM imgproduits WHERE id = '$idProduit'";
  if ($id->query($reqSuppImg) === TRUE) {
    unlink("images/vetements/".$photoNom);
    $reqSuppProd = "DELETE FROM produits WHERE id = '$idProduit'";
    if ($id->query($reqSuppProd) === TRUE) {
      echo "<center>Produit Supprimé</center>";
    } else {
      echo "Error updating record: " . $id->error;
    }
  } else {
    echo "Error updating record: " . $id->error;
  }  
  }
?>

<body>
  <div class="main-content">
    <?php
    //On verifie l'id
    if($idObtenu == true){
      $req = "SELECT * FROM produits RIGHT JOIN imgproduits ON produits.id = imgproduits.id where imgproduits.id = $idProduit LIMIT 1";
      $res = mysqli_query($id, $req);
      //$produit = mysqli_fetch_assoc($res);
      $lignes = mysqli_fetch_all($res, MYSQLI_BOTH);
      foreach($lignes as $ligne){ ?>
        <div class="produit">
          <div class="photo-produit">
            <?php echo "<img src='images/vetements/".$ligne['nomIMG']."'>";?>
          </div>
          <div class="info-produit">
            <p><?php echo "<i>reference article : n°".$ligne['id']."</i>"; ?></p><br>
            <hr style="width:20%;"><br>
            <p><?php echo $ligne['categorie']; ?></p><br>
            <p><?php echo "<h1>".$ligne['nomproduit']."</h1>"; ?></p></br>
            <hr style="width:90%;">
            <br>
            <p><?php echo $ligne['descproduit']; ?></p><br>
            <hr style="width:90%;">
            <br>
            <p><?php echo "<h2>".$ligne['prix']." €</h2>"; ?></p><br>
            <div class="modifPageProduit">
              <?php
              if(isset($_SESSION["loggedIn"])){
                if($_SESSION["loggedIn"] == true){?>
                <form action="" method="POST" id="formModifArticle" enctype="multipart/form-data" style="display:none;" >
                        Nom : <input type="text" value="<?php echo $ligne['nomproduit']; ?>" name="nomUpdate" ><br><br>
                        Description : <textarea name="descproduitUpdate"><?php echo $ligne['descproduit']; ?></textarea><br><br>
                        Categorie : <input type="text" value="<?php echo $ligne['categorie']; ?>" name="categorieUpdate" ><br><br>
                        Prix <input type="text" value="<?php echo $ligne['prix']; ?>" name="prixUpdate"> €<br><br>
                    <!--<input type="file" name="photo"!-->
                    <button class="button" type="submit" name="okModif">Confirmer modifications</button>
                </form>
              <button class="button" id="btnModifArticle">Modifier l'article</button>
              <script>
                const btn = document.getElementById("btnModifArticle");
                var nomBtnModif = document.getElementById("btnModifArticle");
                btn.addEventListener('click', () => {
                  const form = document.getElementById('formModifArticle');
                  if (form.style.display === 'block') {
                    // Montre form
                    form.style.display = 'none';
                    nomBtnModif.innerHTML="Modifier l'article";
                  } else {
                    // cache --
                    form.style.display = 'block';
                    nomBtnModif.innerHTML="Annuler les modifications";
                  }
                });
              </script>
              <form action="" method="POST">
              <input type="hidden" value="<?php echo $ligne['nomIMG']; ?>" name="photoNom">
              <button class="button buttonSupp" type="submit" name="okSupp">Supprimer l'article</button>
              </form>
                <?php }
              } ?>
            <div>

          </div>
      </div>
  <?php } ?>
<?php }else {
  die("Probleme rencontrée");
}
?>
<?php include "footer.php"; ?>
</body>
</html>