<?php ob_start(); ?>



<form action="index.php" method="POST" class=col-6 enctype="multipart/form-data">
    
    <label for="anime">Animé</label>
    <input type="text" class="form-control" name="anime" id="anime" aria-describedby="text" placeholder="Animé" required>
    
    <label for="description">Description </label>
    <input type="text" class="form-control" name="description" id="description" placeholder="Description" required>

    <label for="image">Image de l'animé </label> <br>
    <input type="file" name="imageanime" id="imageanime" required>

    <input type="hidden" name="id" value="<?= $_GET['update']; ?>">
    
    <button type="submit" name="submitanime" class="btn btn-secondary" value="Envoyer">Envoyer</button>
    
</form>

<?php
$content = ob_get_clean();
require 'view/template.php'; ?>
