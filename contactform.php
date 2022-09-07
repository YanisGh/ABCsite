<?php

if(isset($_POST["submit"])){
    $mailoutel = $_POST['mailoutel'];
    $objet = $_POST['objet'];
    $message = $_POST['message'];
    $mailTo = "contact@abc-textil.fr";
    $header = "De: ".$mailoutel;
    $txt = $mailoutel." vous a envoyé un e-mail depuis abc-textil.fr. \n\n".$message;
    mail($mailTo, $objet, $txt, $header);
}
header('Location: contact.php?mailenvoye');