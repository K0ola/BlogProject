
<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=blog_kola;port=3306;charset=utf8', 'root', '');
$new_password = $_GET["new_password"];
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

$new_login = $_GET["new_login"];

$RechercheLogin = "SELECT * FROM `utilisateurs` WHERE `login` = :login";
$checkStmt = $db->prepare($RechercheLogin);
$checkStmt->bindValue(':login', $new_login, PDO::PARAM_STR);
$checkStmt->execute();

if ($checkStmt->fetchColumn() > 0) {
    $_SESSION['erreur_login'] = 'Identifiant déjà inscrit';
    header('Location: ../../connection.php');
    exit;
  } else {

$requete = "INSERT INTO `utilisateurs` (`id_utilisateur`, `login`, `password_utilisateur`, `pseudonyme_utilisateur`, `permission_utilisateur`) VALUES (NULL, :new_login , :hashed_mdp, :new_pseudonyme, :permission)";
$stmt = $db->prepare($requete);

$stmt->bindValue(':new_login', $_GET["new_login"], PDO::PARAM_STR);
$stmt->bindValue(':hashed_mdp', $hashed_password, PDO::PARAM_STR);
$stmt->bindValue(':new_pseudonyme', $_GET["new_pseudonyme"], PDO::PARAM_STR);
$stmt->bindValue(':permission', "1", PDO::PARAM_STR);
$stmt->execute();
$_SESSION['success_login'] = 'Utilisateur inscrit avec succés ';
header('Location: ../../connection.php');
exit;

}
?>
