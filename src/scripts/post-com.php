<?php


session_start();

$db = new PDO('mysql:host=localhost;dbname=DB_NAME;port=3306;charset=utf8', 'root', '');
if (isset($_POST['com']) && isset($_POST['id_topic']) && isset($_SESSION['login'])) {

    $commentaire = ($_POST['com']);
    $id_topic = ($_POST['id_topic']);
    $auteur_com = ($_SESSION['login']);

    if (empty($commentaire)) {
        echo "Le commentaire ne peut pas être vide.";
    } else {
        $requete = "INSERT INTO commentaires (auteur_com, contenu_com, topic_com) VALUES (:auteur_com, :contenu_com, :topic_com)";
        $stmt = $db->prepare($requete);

        $stmt->execute([
            'auteur_com'=> $auteur_com,
            'contenu_com' => $commentaire,
            'topic_com' => $id_topic
        ]);
        header("Location: ../../topic.php?id=" . $id_topic);
        exit;
    }
} else {
    header("Location: ../../connexion.php");
    exit;
}

?>
