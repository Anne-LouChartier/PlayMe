<?php 
// Je me connecte à la base de données:
$pdo = new PDO('mysql:host=localhost;dbname=streamingmusique;', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO ::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Je vérifie si BDD bien connecté:
// var_dump($pdo);

// J'ouvre une session pour y stocker par la suite des informations :
session_start();
