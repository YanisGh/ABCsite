<!DOCTYPE html>
<html lang="fr">
<?php include "header.php"; ?>
<body>
<div class="contact-parent">
  <div class="contact">
  <h1><u>Contactez-nous !</u></h1>
  <form action="contactform.php" method="post">
        <input type="email" name="mailSrc" placeholder="Votre Email" required><br>
        <input type="text" name="objet" placeholder="Objet" required><br>
        <textarea name="message" placeholder="Votre message..." required></textarea><br>
        <input type="submit" value="Envoyer" name="ok">
    </form>
  </div>
</div>
<?php include "footer.php"; ?>
</body>
</html>