<?php ob_start(); ?>


<?php
$list = getAuteur();
    foreach ($list as $read){
    ?>

<div class="card mb-3" style="max-width: 1240px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?php echo $read ['photo']; ?>" alt="anime" style="width:24rem">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $read ['nom']; ?></h5>
        <p class="card-text"><?php echo $read ['style']; ?></p>
        <a href="index.php?action=readAuteur&read=<?php echo htmlspecialchars( $read ['id']); ?>"><button type="submit" class="btn btn-secondary" value="">Auteur</button></a>
      </div>
    </div>
  </div>
</div>

<?php
}
$content = ob_get_clean();
require 'view/template.php'; ?>