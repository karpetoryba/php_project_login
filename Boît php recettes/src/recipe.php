<?php
session_start();

require_once 'parts/header.php'
?>

<?php
$connectDataBase = new PDO("mysql:host=db;dbname=users_enter", "root", "admin");

$request = $connectDataBase->prepare("SELECT * FROM users_enter.recipes WHERE user_id = :user_id");

$request->bindParam(':user_id', $_SESSION['id']);

$request->execute();

$recipes = $request->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if(!$recipes) : ?>
    <div>
    <p> Dégage </p>
</div>

<?php else : ?>
    <section id="post-recipes" class="container mt-5">
<ul>
<?php foreach ($recipes as $recipe) : ?>
    <li>
        <?php echo ($recipe['nom']); ?>
    </li>
    <?php endforeach; ?>


    <?php $ingredients = json_decode($recipe['ingredient']); ?>

<?php foreach ($ingredients as $ingredient) : ?>

<li>
<?php echo $ingredient ?>
</li>
<?php endforeach; ?>

<?php $ingredients = json_decode($recipe['steps']); ?>

<?php foreach ($ingredients as $steps) : ?>

<li>
<?php echo $steps ?>
</li>
<?php endforeach; ?>

</ul>
</section>
<?php endif ?>

<?php require_once 'parts/footer.php' ?>