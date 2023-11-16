<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./src/styles/connection.css">

    <title>BK - Connection</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION['erreur_login'])) {
	echo "<script type='text/javascript'>alert('" . $_SESSION['erreur_login'] . "');</script>";
	unset($_SESSION['erreur_login']);
  } else if (isset($_SESSION['success_login'])) {
	echo "<script type='text/javascript'>alert('" . $_SESSION['success_login'] . "');</script>";
	unset($_SESSION['success_login']);
  }
$db = new PDO('mysql:host=localhost;dbname=blog_kola;port=3306;charset=utf8', 'root', '');
$requete="SELECT * FROM utilisateurs";
$stmt=$db->query($requete);
$result=$stmt->fetchall(PDO::FETCH_ASSOC);
?>
	<?php
	if (isset($_GET["err"])){
		echo "Vous n'avez pas entré le bon login/mdp";
	}
	?>
    <!-- <?php 
     echo (password_hash("tutur", PASSWORD_DEFAULT))
    ?> -->
	<a href="./index.php" id="return">
            <img src="./src/assets/imgs/home.png" alt="Accueil" id="return_home_img">
        </a>

		<h1>Bienvenue sur la page de connection</h1>
		<h2>Veuillez completer les champs du formulaire ci-dessous pour pouvoir vous connecter</h2>
	
	
	<section id="login_register">
		<div id="identification">
			<FORM action="./src/scripts/login.php">
				<label for="login">Nom d'utilisateur</label>
				<INPUT type=text name="login"> 
				<label for="mdp" id="label_mdp">Mot de passe</label>
				<input type="password" name="password">
				<input type=submit value= "Connection" id="bouton_valide">
			</FORM>
		</div>

		<div id="inscription">
            <form action="./src/scripts/creation_compte.php">
                <label for="new_login">Nom d'utilisateur</label>
                <input type="varchar" name="new_login" id="new_login">

                <label for="new_password">Mot de passe</label>
                <input type="varchar" name="new_password" id="new_password">

                <label for="new_prenom">Pseudonyme</label>
                <input type="varchar" name="new_pseudonyme" id="new_pseudonyme">

                <input type="submit" value="Inscription" id="bouton_valide">
            </form>
	</section>

</body>
</html>




    
</body>
</html>