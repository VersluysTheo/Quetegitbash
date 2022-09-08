<?php
require 'controllers/controller.php';

if (isset($_GET['action'])){
    if ($_GET['action'] == 'listAnime'){
        listAnime();
    }
    elseif ($_GET['action'] == 'listAuteur'){
        listAuteur();
    }   
    elseif ($_GET['action'] == 'addanime'){
        addanime();
    }  
    elseif ($_GET['action'] == 'addauteur'){
        addauteur();
    }
    elseif ($_GET['action'] == 'updateAuteur'){
        updateAuteur2();
    }
    elseif ($_GET['action'] == 'updateAnime'){
        updateAnime2();
    }
    elseif ($_GET['action'] == 'readAnime'){
        readAnime2();
    }
    elseif ($_GET['action'] == 'readAuteur'){
        readAuteur2();
    }
    elseif ($_GET['action'] == 'deleteAnime'){
        DeleteAnime();
    }
    elseif ($_GET['action'] == 'deleteAuteur'){
        DeleteAuteur();
    }

}   
else{
    home();
}

    if (isset($_POST['submit'])){
    if (!empty($_POST['nom']) && !empty($_POST['synopsis']) && !empty($_FILES['anime'])){
        Verifimganime();
        CreateAnime();
    }
}

elseif (isset($_POST['submit2'])){
    if (!empty($_POST['studio']) && !empty($_POST['style']) && !empty($_FILES['imgstudio'])){
        Verifimgauteur();
        CreateAuteur();
}
}

elseif (isset($_POST['submitanime'])){
        
    if ($_FILES['imageanime'] && $_FILES['imageanime']['error'] == 0 && $_FILES['imageanime']['size'] <= 1000000){
        $file = pathinfo($_FILES['imageanime']['name']);
        $extension = $file['extension'];
        $extensionAccept = ['jpg','jpeg','png'];

        if (in_array($extension,$extensionAccept)){
            updateAnime();
            echo 'Animé modifié';
        }
        else{
            echo 'jpg,jpeg,png Uniquement';
        }
    }

    else{
        echo 'Image trop lourde et/ou non envoyée </br> Et/ou modifie un nom de champion';
    }

}

if (isset($_POST['submitauteur'])){
        
    if ($_FILES['imageauteur'] && $_FILES['imageauteur']['error'] == 0 && $_FILES['imageauteur']['size'] <= 1000000){
        $file = pathinfo($_FILES['imageauteur']['name']);
        $extension = $file['extension'];
        $extensionAccept = ['jpg','jpeg','png'];

        if (in_array($extension,$extensionAccept)){
            updateAuteur();
            echo 'Auteur modifié';
        }
        else{
            echo 'jpg,jpeg,png Uniquement';
        }
    }

    else{
        echo 'Image trop lourde et/ou non envoyée </br> Et/ou modifie un nom de champion';
    }
}
// Delete
if (isset($_POST['deleteanime'])){
    DelAnime();
    echo "Votre animé a bien été supprimé";
}

if (isset($_POST['deleteauteur'])){
    DelAuteur();
    echo "Votre studio / auteur a bien été supprimé";
}