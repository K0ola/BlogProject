<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/styles/root.css">
    <link rel="stylesheet" href="./src/styles/index.css">
    <title>Todoom - Beta</title>
</head>
<body>
<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=DB_NAME;port=3306;charset=utf8', 'root', '');
$requete="SELECT * FROM utilisateurs";
$stmt=$db->query($requete);
$result=$stmt->fetchall(PDO::FETCH_ASSOC);

if (isset($_SESSION["login"])){
    ?>
    <header>
        <div id='compte'>
            <a href='./src/scripts/logout.php'>Deconnection</a>
            <a href='./profil.php'>
                <img src="./src/assets/imgs/utilisateur.png" alt="profil page" id="profil_page_img">
            </a>
        </div>
        
        <h1>Todoom</h1>
        <h2>Bienvenu sur Todoom</h2>
        <a href="https://discord.gg/xXnGD57CWT" target="_blank" rel="lien vers le serveur discord Todoom" id="join_button"><img src="./src/assets/imgs/Discord_logo.png" alt="" id="logo_discord">Nous rejoindre</a>

    </header>
    <?php
} else {
    ?>
    <header>
        <div id='compte'>
            <a href='connexion.php'>Connexion</a>
        </div>

        <h1>Todoom</h1>
        <h2>Bienvenu sur Todoom</h2>
        <a href="https://discord.gg/xXnGD57CWT" target="_blank" rel="lien vers le serveur discord Todoom" id="join_button"><img src="./src/assets/imgs/Discord_logo.png" alt="" id="logo_discord">Nous rejoindre</a>

    </header>
    <?php
};



?>

<?php
$db = new PDO('mysql:host=localhost;dbname=DB_NAME;port=3306;charset=utf8', 'root', '');
$requete="SELECT * FROM topics";
$stmt=$db->query($requete);
$result=$stmt->fetchall(PDO::FETCH_ASSOC);
?>
<div id="container">
<h1>Forum - Todoom Beta</h1>
<?php foreach ($result as $topic): ?>
        <a href="topic.php?id=<?php echo $topic['id_topic'];?>.php" target="_blank" rel=" ">
            <div class="topic">
                <div class="header_topic">
                    <h3><?php echo ($topic['titre_topic']); ?></h3>
            
                </div>
                <h4><?php echo ($topic['sujet_topic']); ?></h4>
                <div class="footer_topics">
                    <p><?php echo (" de ".$topic['auteur_topic']);?></p>
                </div> 
            </div>
            </a>

<?php endforeach; ?>

</div>

<footer>
    <a href="mentions-legales.html">mentions légales</a>
    <p>Site développé par K0la</p>
</footer>



</body>
</html>




<!-- Site développé dans le cadre d'un projet étudiant par Arthur ZACHARY | K0la -->