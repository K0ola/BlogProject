<?php
session_start();
$target_dir = "../assets/images_profil";
$userId = $_SESSION["login"]; // Obtenir l'identifiant de l'utilisateur
$imageFileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
$target_file = $target_dir . $userId . '.' . $imageFileType;


// Vérifie si le fichier est une image réelle
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "Le fichier est une image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Le fichier n'est pas une image.";
        $uploadOk = 0;
    }
}

// Vérifie si le fichier existe déjà
if (file_exists($target_file)) {
    echo "Désolé, le fichier existe déjà.";
    $uploadOk = 0;
}

// Vérifie la taille du fichier
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Désolé, votre fichier est trop volumineux.";
    $uploadOk = 0;
}

// Vérifie le format du fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés.";
    $uploadOk = 0;
}

// Vérifie si $uploadOk est mis à 0 par une erreur
if ($uploadOk == 0) {
    echo "Désolé, votre fichier n'a pas été téléchargé.";
// Si tout est ok, essaye de télécharger le fichier
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "Le fichier ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " a été téléchargé.";
    } else {
        echo "Désolé, il y a eu une erreur lors du téléchargement de votre fichier.";
    }
}
?>
