<?php
$connectDataBase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");

    $recipeId = $_POST['id'];
    $deleteRequest = $connectDataBase->prepare("DELETE FROM recipes WHERE id = :id");
    $deleteRequest->bindParam(':id', $recipeId);
    $deleteRequest->execute();

    header("Location: ../recipe.php");

