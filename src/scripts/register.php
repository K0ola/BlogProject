<?php
session_start();

$db = new PDO('mysql:host=localhost;dbname=blog_kola;port=3306;charset=utf8', 'root', '');
$requete="SELECT * FROM utilisateurs";
$stmt=$db->query($requete);
$result=$stmt->fetchall(PDO::FETCH_ASSOC);
?>
