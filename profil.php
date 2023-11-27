<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/styles/root.css">
    <link rel="stylesheet" href="./src/styles/profil.css">
    <title>Todoom - Profil</title>
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
        <h1>Votre Profil</h1>
        <div id='compte'>
            <a href='./src/scripts/logout.php'>Deconnection</a>
        </div>
        <?php echo "Vous êtes connecté en tant que " . $_SESSION["login"] . " ";?>
    </header>
    <?php
} else {
    header("Location: ./index.php");
};

$db = new PDO('mysql:host=localhost;dbname=DB_NAME;port=3306;charset=utf8', 'root', '');
$requete="SELECT * FROM utilisateurs";
$stmt=$db->query($requete);
$result=$stmt->fetchall(PDO::FETCH_ASSOC);



?>

<section id="affiche_topics">
<h1>Voici vos précédents topics</h1>
<?php
if (isset($_SESSION["login"])) {
    $login = $_SESSION["login"];
    $requete = "SELECT * FROM topics WHERE auteur_topic = :login";
    $stmt = $db->prepare($requete);
    $stmt->execute(['login' => $login]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div id="container">
<?php foreach ($result as $topic): ?>
        <a href="topic<?php ($topic['titre_topic'])?>.php" target="_blank" rel=" ">
            <div class="topic">
                <div class="header_topic">
                    <h3><?php echo ($topic['titre_topic']); ?></h3>
                </div>
                <form action="./src/scripts/suppression_topic.php" method="post">
                    <input type="hidden" name="id_topic" value="<?php echo $topic['id_topic']; ?>">
                    <input type="submit" value="Supprimer"  id="supp_topic_btn">
                </form>
            </div>
            </a>

<?php endforeach; ?>

</section>

<section id="creation_topic">
    <form action="./src/scripts/creation_topic.php" method="post">
        <label for="titre_topic">Titre du Topic :</label>
        <input type="text" id="titre_topic" name="titre_topic" required>

        <label for="sujet_topic">Sujet du Topic :</label>
        <input type="text" id="sujet_topic" name="sujet_topic" required>

        <label for="contenu_topic">Contenu :</label>
        <textarea id="contenu_topic" name="contenu_topic" required></textarea>



        <input type="submit" value="Poster" id="btn_poster_topic">
    </form>
</section>

</body>
</html>