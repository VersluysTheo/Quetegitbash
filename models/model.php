<?php

// BDD
function dbConnect(){

    try{
        $db = new PDO(
            'mysql:host=localhost;dbname=bdd dessin;charset=UTF8',
            'root',
            ''
        );
        return $db;
    }
    catch(Exception $e){
        die ("Error: " . $e->getMessage());   
    }
}

//  GET anime

function getAnime(){

    $db = dbConnect();
    $sql = 'SELECT * FROM anime';
    $prepare = $db->prepare($sql);
    $prepare->execute();
    $list = $prepare->fetchall();
    return $list;
}

//  GET auteur

function getAuteur(){

    $db = dbConnect();
    $sql = 'SELECT * FROM auteur';
    $prepare = $db->prepare($sql);
    $prepare->execute();
    $list = $prepare->fetchall();
    return $list;
}

// Add Anime
function CreateAnime(){
    $db = dbconnect();
    $addanime = 'INSERT INTO `anime`(`anime`,`description`,`image`) VALUES (:anime, :description, :image)';
    $addedanime = $db->prepare($addanime);
    $addedanime->execute([
        'anime' => $_POST['nom'],
        'description' => $_POST['synopsis'],
        'image' => 'public/imganime/' . $_FILES ['anime']["name"]
    ]);
}

function Verifimganime(){
    $db = dbConnect();
    $target_dir = "public/imganime/";
    $target_file = $target_dir . basename($_FILES["anime"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Vérification si le fichier est une image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["anime"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "Le fichier n'est pas une image.";
    $uploadOk = 0;
  }


// vérification si le fichier existe déjà
if (file_exists($target_file)) {
  echo "Le fichier existe déjà.";
  $uploadOk = 0;
}

// Vérification de la taille du fichier
if ($_FILES["anime"]["size"] > 5000000000000) {
  echo "La taille du fichier est trop importante.";
  $uploadOk = 0;
}

// Autorisation seulement de certain format de fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
  echo "Seulement les fichiers JPG, JPEG, et PNG sont autorisés.";
  $uploadOk = 0;
}

// Vérification si $upload n'est pas à 0 (envoie message d'erreur)
if ($uploadOk == 0) {
  echo " Le fichier n'a pas été envoyé.";
// Si tout est ok, alors le fichier est uploadé dans le bon dossier
} else {
  if (move_uploaded_file($_FILES["anime"]["tmp_name"], $target_file)) {
    echo print_r($target_file);
    echo "Le fichier ". htmlspecialchars( basename( $_FILES["anime"]["name"])). " a été envoyé.";
  } else {
    echo " Erreur lors de l'envoi du fichier";
  }
}
}
}

// Add Auteur
function CreateAuteur(){
    $db = dbconnect();
    $addstudio = 'INSERT INTO `auteur`(`nom`,`style`,`photo`) VALUES (:nom, :style, :photo)';
    $addedstudio = $db->prepare($addstudio);
    $addedstudio->execute([
        'nom' => $_POST['studio'],
        'style' => $_POST['style'],
        'photo' => 'public/imgauteur/' . $_FILES ['imgstudio']["name"]
    ]);
}

function Verifimgauteur(){
    $db = dbConnect();
    $target_dir = "public/imgauteur/";
    $target_file = $target_dir . basename($_FILES["imgstudio"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Vérification si le fichier est une image
if(isset($_POST["submit2"])) {
  $check = getimagesize($_FILES["imgstudio"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "Le fichier n'est pas une image.";
    $uploadOk = 0;
  }


// vérification si le fichier existe déjà
if (file_exists($target_file)) {
  echo "Le fichier existe déjà.";
  $uploadOk = 0;
}

// Vérification de la taille du fichier
if ($_FILES["imgstudio"]["size"] > 5000000000000) {
  echo "La taille du fichier est trop importante.";
  $uploadOk = 0;
}

// Autorisation seulement de certain format de fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
  echo "Seulement les fichiers JPG, JPEG, et PNG sont autorisés.";
  $uploadOk = 0;
}

// Vérification si $upload n'est pas à 0 (envoie message d'erreur)
if ($uploadOk == 0) {
  echo " Le fichier n'a pas été envoyé.";
// Si tout est ok, alors le fichier est uploadé dans le bon dossier
} else {
  if (move_uploaded_file($_FILES["imgstudio"]["tmp_name"], $target_file)) {
    echo print_r($target_file);
    echo "Le fichier ". htmlspecialchars( basename( $_FILES["imgstudio"]["name"])). " a été envoyé.";
  } else {
    echo " Erreur lors de l'envoi du fichier";
  }
}
}
}

// UPDATE auteur

function updateAuteur (){
  $db = dbConnect();
  $fileName = 'public/imgauteur/' . basename($_FILES['imageauteur']['name']);
  move_uploaded_file($_FILES ['imageauteur']['tmp_name'],$fileName);
  $sql = "UPDATE auteur SET `nom` = :nom, `style` = :style, `photo` = :photo WHERE id = :id";
  $prepare = $db->prepare($sql);
  $prepare ->execute(
      [
      'nom' => $_POST['villechamp'],
      'style' => $_POST['championchamp'],
      'photo' => 'public/imgauteur/' . $_FILES ['imageauteur']['name'],
      'id' => $_POST['id']
  ]);
  }

  // UPDATE anime

function updateAnime (){
  $db = dbConnect();
  $fileName = 'public/imganime/' . basename($_FILES['imageanime']['name']);
  move_uploaded_file($_FILES ['imageanime']['tmp_name'],$fileName);
  $sql = "UPDATE anime SET `anime` = :anime, `description` = :description, `image` = :image WHERE id = :id";
  $prepare = $db->prepare($sql);
  $prepare ->execute(
      [
      'anime' => $_POST['anime'],
      'description' => $_POST['description'],
      'image' => 'public/imganime/' . $_FILES ['imageanime']['name'],
      'id' => $_POST['id']
  ]);
  }

  // SHOW anime

function readAnime() {
  $db = dbConnect();
  $sql = 'SELECT * FROM anime WHERE id = :id';
  $prepare = $db ->prepare($sql);
  $prepare ->execute(
      [
          'id' => $_GET['read']
      ]
  );
  $list = $prepare -> fetch();
  return $list;
}

// SHOW auteur

function readAuteur(){
  $db = dbConnect();
  $sql = 'SELECT * FROM auteur WHERE id = :id';
  $prepare = $db ->prepare($sql);
  $prepare ->execute(
      [
          'id' => $_GET['read']
      ]
  );
  $list = $prepare -> fetch();
  return $list;
}

// Delete Anime
function DelAnime(){
  $db = dbConnect();
  $Deleteanime = 'DELETE FROM `anime` WHERE id = :id';
  $Deletedanime = $db->prepare($Deleteanime);
  $Deletedanime->execute([
    'id' => $_POST['deleteanimevalue']
  ]);
}

// Delete Auteur
function DelAuteur(){
  $db = dbConnect();
  $Deleteauteur = 'DELETE FROM `auteur` WHERE id = :id';
  $Deletedauteur = $db->prepare($Deleteauteur);
  $Deletedauteur->execute([
    'id' => $_POST['deleteauteurvalue']
  ]);
}