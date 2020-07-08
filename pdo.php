<?php
$connString = "mysql:host=localhost;port=3306;dbname=project3";
$user = "root";
$pass = "";
$pdo = new PDO($connString, $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>