<?php ob_start(); ?>

<p> Voulez-vous supprimer cet auteur / ce studio ?</p>
<form action="index.php" method="POST">
    <input type="submit" value="Oui" name="deleteauteur">
    <input type="hidden" name="deleteauteurvalue" value="<?php echo $_GET['delete']; ?>">
    <input type="submit" name="non" value="Non">
</form>
<?php $content = ob_get_clean(); ?>
<?php require 'view/template.php'; ?>