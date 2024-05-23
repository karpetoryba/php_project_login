<?php
session_start();

require_once 'parts/header.php';

// connexion à la base de données

    $connectDataBase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");
    $connectDataBase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// Vérifier si l'ID utilisateur est défini dans la session
if (!isset($_SESSION['id'])) {
    echo "User is not logged in.";
    exit();
}

// obtenir des recettes
$request = $connectDataBase->prepare("SELECT * FROM recipes WHERE user_id = :user_id");
$request->bindParam(':user_id', $_SESSION['id']);
$request->execute();
$recipes = $request->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (!$recipes) : ?>
    <div>
        <p> il n'y a pas des recettes. </p>
    </div>
<?php else : ?>
    <section id="post-recipes" class="container mt-5">
        <ul class="formulary" id="forme">
            <?php foreach ($recipes as $recipe) : ?>
                <li>
                    <strong><?php echo htmlspecialchars($recipe['nom']); ?></strong>
                    <ul>
                    
                       <? $recipe['ingredient'] = explode(";", $recipe['ingredient']);?>
                        <?php if (!empty($recipe['ingredient'])) : ?>
                            <li>Ingredients:</li>
                            <ul>
                                <?php foreach ($recipe['ingredient'] as $ingredient) : ?>

                                    <li><?php echo htmlspecialchars($ingredient); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>

                        <?$recipe['steps'] = explode(";", $recipe['steps']); ?>
                        <?php if (!empty($recipe['steps'])) : ?>
                            <li>Steps:</li>
                            <ul>
                                <?php foreach ($recipe['steps'] as $step) : ?>
                                    <li><?php echo htmlspecialchars($step); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </ul>
                    <form method="POST" action="scripts/delete-recipe.php">
                        <button type="submit" class="btn btn-outline-danger m-1" name="id" value="<?php echo $recipe['id']; ?>">Supprimer</button>
                    </form>
                    <form method="POST" action="/update-carte.php">
                        <button type="submit" class="btn btn-outline-warning m-1" name="id" value="<?php echo $recipe['id']; ?>">Modifier</button>
                    </form>
                    <form method="POST" action="/create-carte.php">
                        <button type="submit" class="btn btn-outline-primary m-1" name="id" value="<?php echo $recipe['id']; ?>">Ajouter</button>
                    </form>
                    <form method="POST" action="scripts/duplicate-post.php">
                        <button type="submit" class="btn btn-outline-primary m-1" name="id" value="<?php echo $recipe['id']; ?>">Dubliquer</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>



<?php require_once 'parts/footer.php' ?>