<?php

if(isset($_POST["ok"])){
    $mailSrc = $_POST['mailSrc'];
    $objet = $_POST['objet'];
    $message = $_POST['message'];
    $headers = 'FROM: '.$mailSrc;
    $txt = $mailSrc." vous a envoyé un e-mail depuis abc-textil.fr. \n\n".$message;
    mail('contact@abc-textil.fr', $objet, $txt, $headers);
 	header('Location: contact.php?mailenvoye');
}

?>