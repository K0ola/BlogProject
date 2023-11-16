<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/styles/index.css">
    <title>Il etait une fois ..</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION["login"])){
    ?>
    <header>
        <div id='compte'>
            <a href='./src/scripts/logout.php'>Deconnection</a>
            <a href='./profil.php'>
                <img src="./src/assets/imgs/utilisateur.png" alt="profil page" id="profil_page_img">
            </a>
        </div>
    </header>
    <?php
} else {
    ?>
    <header>
        <div id='compte'>
            <a href='connection.php'>Connection</a>
        </div>
    </header>
    <?php
};

$db = new PDO('mysql:host=localhost;dbname=blog_kola;port=3306;charset=utf8', 'root', '');
$requete="SELECT * FROM utilisateurs";
$stmt=$db->query($requete);
$result=$stmt->fetchall(PDO::FETCH_ASSOC);
?>

<h1>K0la's Blog</h1>
<h2>Bienvenu sur le blog de K0la</h2>

    
</body>
</html>