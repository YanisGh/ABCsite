<!DOCTYPE html>
<html lang="fr">
<?php include "header.php"; include "conn.php" ?>
<body>
  <div class="main-content">
    <div class="servicep">
      <h1>Nos services :</h1>
      <hr style="width:50%;margin:auto;">
      <div class="services">
        <div class="broderie">
        <p>Broderie</p>
        <img src="images/services/broderier.jpg">
        </div>
        <div class="flocage">
        <p>Flocage</p>
        <img src="images/services/flocage.jpg">
        </div>
        <div class="mv">
        <p>Marquages sur véhicules</p>
        <img src="images/services/mv.jpg">
        </div>
        <div class="vhv">
        <p>Vêtements haute visibilité</p>
        <img src="images/services/vhv.jpg">
        </div>
      </div>
    </div>
    <div class="produits-acceuil-parent">
        <div class="produits-acceuil-titre">
          <p>Produits</p>
        </div>
        <div class="produits-acceuil">
          <?php 
          $req = "SELECT * from produits INNER JOIN imgproduits ON produits.id = imgproduits.id ORDER by rand() limit 2;";
          $resReq = mysqli_query($id, $req);
          $lignes = mysqli_fetch_all($resReq, MYSQLI_BOTH);
            foreach($lignes as $ligne){ ?>
                <a href="PageProduits.php?id=<?php echo $ligne['id']?>">
                <?php echo "<img src='images/vetements/".$ligne['nomIMG']."'>";?>
            <?php } ?>
        </div>
      <form action="produits.php">
        <button class="button">Voir +</button>
      </form>
      </div>
  </div>
<?php include "footer.php"; ?>
</body>
</html>