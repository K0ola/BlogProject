<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/styles/root.css">
    <link rel="stylesheet" href="./src/styles/topic.css">
    <?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=DB_NAME;port=3306;charset=utf8', 'root', '');
$id_topic = $_GET['id'];
$requete = "SELECT * FROM topics WHERE id_topic = :id_topic";
$stmt = $db->prepare($requete);
$stmt->execute(['id_topic' => $id_topic]);
$topic = $stmt->fetch(PDO::FETCH_ASSOC);

?>
    <title>Todoom topic | <?php echo($topic['titre_topic'])?></title>
</head>
<body>

<div class="topic">
<?php
echo "<h1>".$topic['titre_topic']."</h1>";
echo "<h2>".$topic["sujet_topic"]."</h2>";
echo "<p>".$topic["contenu_topic"]."</p>";
?>
</div>

<div id="sous-topic">

<div class="commentaires">
<?php
$requete_com = "SELECT * FROM commentaires WHERE topic_com = :id_topic";
$stmt_com = $db->prepare($requete_com);
$stmt_com->execute(['id_topic' => $id_topic]);
$result_com = $stmt_com->fetchAll(PDO::FETCH_ASSOC);

foreach ($result_com as $commentaire) {
    echo "<div class='com'>";
    echo "<h3>".$commentaire['auteur_com']."</h3>";
    echo "<p>".$commentaire['contenu_com']."</p>";
    echo "</div>";
}
?>
</div>
<form action="./src/scripts/post-com.php" method="post">
    <div class="form-element">
        <label for="com">Que voulez-vous répondre ?</label>
        <input type="textarea" name="com" id="com">
    </div>
    <input type="hidden" name="id_topic" value="<?php echo $id_topic; ?>">
    <input type="submit" value="Poster" id="btn_post_com">
</form>

</div>
</body>
</html>

