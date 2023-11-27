<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=DB_NAME;port=3306;charset=utf8', 'root', '');
$requete =" SELECT * FROM utilisateurs WHERE login=:login";
$stmt=$db->prepare($requete);
$stmt->bindValue(':login',$_GET["login"],PDO::PARAM_STR);
$stmt->execute();

if($stmt->rowCount()){
    $result=$stmt->fetch();
    if(password_verify($_GET["password"],$result["password_utilisateur"])){
    $_SESSION["login"]=$result["login"];
    header('Location: ../../index.php');
    }
}
else {
    header('Location:../../connexion.php?err=pblm');
}
?>


