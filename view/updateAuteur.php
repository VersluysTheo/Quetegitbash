<?php ob_start(); ?>



<form action="index.php" method="POST" class=col-6 enctype="multipart/form-data">
    
    <label for="ville">Nom</label>
    <input type="text" class="form-control" name="villechamp" id="villechamp" aria-describedby="text" placeholder="Nom" required>
    
    <label for="champion">Style </label>
    <input type="text" class="form-control" name="championchamp" id="championchamp" placeholder="Style" required>

    <label for="image">Image de l'auteur </label> <br>
    <input type="file" name="imageauteur" id="imageauteur" required>

    <input type="hidden" name="id" value="<?= $_GET['update']; ?>">
    
    <button type="submit" name="submitauteur" class="btn btn-secondary" value="Envoyer">Envoyer</button>
    
</form>

<?php
$content = ob_get_clean();
require 'view/template.php'; ?>
