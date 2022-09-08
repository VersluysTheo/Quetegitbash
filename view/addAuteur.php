<?php ob_start(); ?>
<div class="container">
    <div class="row-flex">
    <form action="index.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="exampleFormControlInput1">Nom de l'auteur/studio</label>
    <input type="text" class="form-control" name="studio" id="exampleFormControlInput1" placeholder="ex : Studio Ghibli">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Style du Studio</label>
    <input type="text" class="form-control" name="style" id="exampleFormControlInput1" placeholder="ex : Film d'animation / Court-métrages">
  </div>
  <input type="file" name="imgstudio" id="imgstudio" accept="image/png, image/jpeg">
  <input type="submit" name="submit2" value="Envoyez"></input>
</form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php' ?>