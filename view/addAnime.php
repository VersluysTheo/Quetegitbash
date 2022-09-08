<?php ob_start(); ?>
<div class="container">
    <div class="row-flex">
    <form action="index.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
    <label for="exampleFormControlInput1">Nom de l'anime</label>
    <input type="text" class="form-control" name="nom" id="exampleFormControlInput1" placeholder="ex : Naruto ">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Synopsis</label>
    <textarea class="form-control" name="synopsis" id="exampleFormControlTextarea1" rows="3" placeholder="ex : C'est l'histoire d'un renard maudit qui bouffe des nouilles"></textarea>
  </div>
  <input type="file" name="anime" id="anime" accept="image/png, image/jpeg">
  <input type="submit" name="submit" value="Envoyez"></input>
</form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php' ?>