<?php ob_start(); ?>

<p> Voulez-vous supprimer cet animé ?</p>
<form action="index.php" method="POST">
    <input type="submit" value="Oui" name="deleteanime">
    <input type="hidden" name="deleteanimevalue" value="<?php echo $_GET['delete']; ?>">
    <input type="submit" name="non" value="Non">
</form>
<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>