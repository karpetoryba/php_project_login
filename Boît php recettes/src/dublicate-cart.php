<?php
session_start();
require_once 'parts/header.php';

$recipeId = $_GET['id'];

$connectDataBase = new PDO("mysql:host=db;dbname=wordpress", "root", "admin");

$request = $connectDataBase->prepare("SELECT * FROM recipes WHERE id = :id");
$request->bindParam(':id', $recipeId);
$request->execute();
$recipe = $request->fetchAll(PDO::FETCH_ASSOC);
?>

<form method="POST" class="card p-3 col-4" action="/scripts/update-recipe.php">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input name="nom" type="text" class="form-control" id="nom" placeholder="Nom" value="<?php echo $recipe['0']['nom']; ?>">
  </div>
  <div class="form-group">
    <label for="ingredient">Ingrédient</label>
    <input name="ingredient" type="text" class="form-control" id="ingredient" placeholder="Ingrédient" value="<?php echo $recipe['0']['ingredient']; ?>">
  </div>
  <div class="form-group">
    <label for="steps">Étapes</label>
    <input name="steps" type="text" class="form-control" id="steps" placeholder="Étapes" value="<?php echo $recipe['0']['steps']; ?>">
  </div>
  <input name="id" type="hidden" value="<?php echo $recipeId ?>">
  <button type="submit" class="btn btn-primary">Soumettre</button>
</form>

<?php require_once 'parts/footer.php' ?>
