<?php
    session_start();
    //connect to db
    //select recipe were id =$_GET["id]
    $connectDataBase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
    

    $request = $connectDataBase->prepare("SELECT * FROM recipes WHERE id = :id");

    $request-> bindParam(':id', $_POST['id']);
    $request-> execute();
    $recipe= $request->fetch(PDO::FETCH_ASSOC);

    $duplicateRequest = $connectDataBase->prepare("INSERT INTO recipes (nom, ingredient, steps, user_id) VALUES (:nom, :ingredient, :steps, :user_id)");
    $duplicateRequest->bindParam(':nom', $recipe['nom']);
    $duplicateRequest->bindParam(':ingredient', $recipe['ingredient']);
    $duplicateRequest->bindParam(':steps', $recipe['steps']);
    $duplicateRequest->bindParam(':user_id', $_SESSION['id']);
    $duplicateRequest->execute();
    

    header("Location: ../recipe.php");
