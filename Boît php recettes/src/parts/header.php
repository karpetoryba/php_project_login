<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<div class="container">
<?php if (isset($_SESSION['username'])) : ?>
        <div class="text-center alert alert-success">
        <p>Utilisateur connecté</p></div>
    <?php else : ?>
        <div class="text-center alert alert-danger">
        <p>Utilisateur non connecté</p></div>
        <?php if(isset($_GET['error'])) : ?>
            <div class="text-center alert alert-danger">
                <?php echo $_GET['error']; ?>
            </div>
        <?php endif; ?>
        <?php if(isset($_GET['sucess'])) : ?>
            <div class="text-center alert alert-success">
                <?php echo $_GET['sucess']; ?>
            </div>
        <?php endif; ?>
        <?php endif ?>


</div>