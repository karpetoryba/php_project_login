<?php
session_start();

$nom = $_POST['nom']; 
$ingredient = $_POST['ingredient']; 
$steps = $_POST['steps']; 

$connectDataBase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");

    $createRequest = $connectDataBase->prepare("INSERT INTO recipes (nom,ingredient,user_id,steps) VALUES (:nom, :ingredient,:user_id, :steps)");
    $createRequest->bindParam(':nom', $nom);
    $createRequest->bindParam(':ingredient', $ingredient);
    $createRequest->bindParam(':steps', $steps);
    $createRequest->bindParam(':user_id', $_SESSION['id']);
    $createRequest->execute();

    header('Location: ../recipe.php');