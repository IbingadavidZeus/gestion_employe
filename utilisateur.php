<?php
session_start();
if(!$_SESSION['password_utilisateur'])
{
    header('Location: Accueil.php');
}
echo "Bienvenue $_SESSION[nom_utilisateur]";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="deconnexion.php">
        <button> Se Déconnecter</button>
    </a>    
</body>
</html>