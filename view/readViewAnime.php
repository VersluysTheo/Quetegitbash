<?php ob_start(); ?>


<?php
$list = getAnime();
    foreach ($list as $read){
    ?>

<div class="card mb-3" style="max-width: 1240px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="<?php echo $read ['image']; ?>" alt="anime" style="width:24rem">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $read ['anime']; ?></h5>
        <p class="card-text"><?php echo $read ['description']; ?></p>
        <a href="index.php?action=readAnime&read=<?php echo htmlspecialchars( $read ['id']); ?>"><button type="submit" class="btn btn-secondary" value="">Animé</button></a>
      </div>
    </div>
  </div>
</div>

<?php
}
$content = ob_get_clean();
require 'view/template.php'; ?>