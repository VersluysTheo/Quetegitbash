<?php ob_start(); ?>


<?php
$list = readAuteur();
    ?>

<div class="card mb-3" style="max-width: 1240px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?php echo $list ['photo']; ?>" alt="anime" style="width:24rem">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $list ['nom']; ?></h5>
        <p class="card-text"><?php echo $list ['style']; ?></p>
        <a href="index.php?action=updateAuteur&update=<?php echo htmlspecialchars( $list ['id']); ?>"><button type="submitgood" class="btn btn-secondary" value="">Modifier</button></a>
      <a href="index.php?action=deleteAuteur&delete=<?php echo ($list['id']); ?>"><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">Supprimer</button></a>
      </div>
    </div>
  </div>
</div>

<?php

$content = ob_get_clean();
require 'view/template.php'; ?>