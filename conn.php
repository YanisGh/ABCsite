<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "atelier78";

// Create connection
$id = new mysqli($servername, $username, $password, $dbname);
if ($id->connect_error) {
    die("Connection failed: " . $id->connect_error);
  }
?>