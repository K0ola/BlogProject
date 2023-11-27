<?php
session_start();

if (isset($_SESSION['login']) && isset($_POST['titre_topic']) && isset($_POST['contenu_topic'])) {
    $titre_topic = $_POST['titre_topic'];
    $contenu_topic = $_POST['contenu_topic'];
    $sujet_topic = $_POST['sujet_topic'];
    $auteur_topic = $_SESSION['login']; 

    $db = new PDO('mysql:host=localhost;dbname=DB_NAME;port=3306;charset=utf8', 'root', '');
    $requete = "INSERT INTO topics (titre_topic, sujet_topic, contenu_topic, auteur_topic) VALUES (:titre_topic, :sujet_topic, :contenu_topic, :auteur_topic)";
    $stmt = $db->prepare($requete);
    $stmt->execute(['titre_topic' => $titre_topic, 'sujet_topic' => $sujet_topic, 'contenu_topic' => $contenu_topic, 'auteur_topic' => $auteur_topic]);

    echo "Topic créé avec succès.";
    header("Location: ../../profil.php");
}
?>
