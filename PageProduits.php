<!DOCTYPE html>
<html lang="fr">
<?php
include "header.php"; include "conn.php";?>
<body>
  <div class="main-content">
  <?php
  //On verifie l'id
  if(isset($_GET['id'])){
    $idP = mysqli_real_escape_string($id, $_GET['id']);
    $req = "SELECT * FROM produits RIGHT JOIN imgproduits ON produits.id = imgproduits.id where imgproduits.id = $idP";
    $res = mysqli_query($id, $req);
    //$produit = mysqli_fetch_assoc($res);
    $lignes = mysqli_fetch_all($res, MYSQLI_BOTH);
    foreach($lignes as $ligne){ ?>
    <div class="produit">
      <div class="photo-produit">
        <?php echo "<img src='images/".$ligne['nomIMG']."'>";?>
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
      </div>
    </div>
  <?php } ?>
<?php }?>
<?php include "footer.php"; ?>
</body>
</html>