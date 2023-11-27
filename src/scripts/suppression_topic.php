<?php
session_start();
if (isset($_POST['id_topic']) && isset($_SESSION['login'])) {
    $id_topic = $_POST['id_topic'];
    $login = $_SESSION['login'];


    $db = new PDO('mysql:host=localhost;dbname=DB_NAME;port=3306;charset=utf8', 'root', '');
    
    $requete = "DELETE FROM topics WHERE id_topic = :id_topic AND auteur_topic = :login";
    $stmt = $db->prepare($requete);
    $stmt->execute(['id_topic' => $id_topic, 'login' => $login]);


    header("Location: ../../profil.php");
    exit;
}
?>
