<?php
session_start();
require_once 'parts/header.php';

?>

<form method="POST" class="card p-3 col-4" action="/scripts/create-post.php">
  <div class="form-group">
    <label for="nom">Nom</label>
    <input name="nom" type="text" class="form-control" id="nom" placeholder="Nom">
  </div>
  <div class="form-group">
    <label for="ingredient">Ingrédient</label>
    <input name="ingredient" type="text" class="form-control" id="ingredient" placeholder="Ingrédient">
  </div>
  <div class="form-group">
    <label for="steps">Étapes</label>
    <input name="steps" type="text" class="form-control" id="steps" placeholder="Étapes">
  </div>
  <input name="id" type="hidden">
  <button type="submit" class="btn btn-primary">Soumettre</button>
</form>

<?php require_once 'parts/footer.php' ?>