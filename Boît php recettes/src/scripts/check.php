<?php
$username = $_POST['username'];


// Connect to db with PDO
$connectDataBase = new PDO("mysql:host=db;dbname=users_enter", "root", "admin");

// Prepare request
$request = $connectDataBase->prepare("SELECT * FROM users_enter.users WHERE username = :username");

// Bind params
$request->bindParam(':username', $username);

// Execute request
$request->execute();

// Fetch data from the result
$result = $request->fetch(PDO::FETCH_ASSOC);


if(!$result){
    header("Location: ../index.php?error=i can't find the user");
    die();
}
else {
    session_start();

    $_SESSION['id'] = $result['id'];
    $_SESSION['username'] = $result['username'];

    header("Location: ../recipe.php");
};

?>
