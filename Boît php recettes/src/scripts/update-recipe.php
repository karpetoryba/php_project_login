<?php
$recipeId = $_POST['id'];
$nom = $_POST["nom"];
$ingredient = $_POST["ingredient"];
$steps = $_POST["steps"];

$connectDataBase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");

    $updateRequest = $connectDataBase->prepare("UPDATE recipes SET nom = :nom, ingredient = :ingredient, steps = :steps  WHERE id = :id");
    $updateRequest->bindParam(':id', $recipeId);
    $updateRequest->bindParam(':nom', $nom);
    $updateRequest->bindParam(':ingredient', $ingredient);
    $updateRequest->bindParam(':steps', $steps);
    $updateRequest->execute();

    header('Location: ../recipe.php');

