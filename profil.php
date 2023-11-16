<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/styles/profil.css">
    <title>Il etait une fois ..</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION["login"])){
    ?>
    <header>
        <a href="./index.php" id="return">
            <img src="./src/assets/imgs/home.png" alt="Accueil" id="return_home_img">
        </a>
        <div id='compte'>
            <a href='./src/scripts/logout.php'>Deconnection</a>
        </div>
    </header>
    <?php
} else {
    header("Location: ./index.php");
};

$db = new PDO('mysql:host=localhost;dbname=blog_kola;port=3306;charset=utf8', 'root', '');
$requete="SELECT * FROM utilisateurs";
$stmt=$db->query($requete);
$result=$stmt->fetchall(PDO::FETCH_ASSOC);
?>


<h1>Votre Profil</h1>
<?php
echo "Vous êtes connecté en tant que " . $_SESSION["login"] . " ";
// echo "<img src='./src/assets/images_profil/". $_SESSION["login"] .".png' alt='photo de profil' id='photo_de_profil'>";
?>

<!-- <form action="./src/scripts/upload_pdp.php" method="post" enctype="multipart/form-data">
    Sélectionnez une image à télécharger :
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Télécharger l'image" name="submit">
</form> -->

    
</body>
</html>