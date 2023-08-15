<?php
session_start();
include('connexion_bd.php'); 

if(isset($_POST['envoie']))
{
    if(!empty($_POST['num_utilisateur']) AND !empty($_POST['password_utlisateur']))
    {
        $pseudo=strip_tags($_POST['nom_utilisateur']);
        $mdp=(strip_tags($_POST['password_utilisateur']));

        $selectuser = $connexion->prepare("SELECT * FROM utilisateur WHERE nom_utilisateur = ? AND password_utilisateur = ?");
        $selectuser->execute(array($pseudo, $mdp));

            if($selectuser->rowCount() > 0)
            {
                $_SESSION['nom_utilisateur'] = $pseudo;
                $_SESSION['password_utilisateur'] = $mdp;
                $_SESSION['id_utilisateur'] = $selectuser->fetch()['id_utilisateur'];
                echo "Salut";
                // header('Location:utilisateur.php');
            }
            else
            {
                echo " Identifiant ou Password incorrecte... ";
            }
    
        
    }
    else
    {
        echo "Veuillez compléter les champs....";
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="inscription.php"> Inscription Utilisateur </a>
    <title>Inscription Utilisateur</title>
</head>
<body>
    <form method="post" action="">
        <input type="text" name="pseudo" placeholder="pseudo" id="pseudo" required>
        <br>
        <input type="password" name="mdp" placeholder="Password" id="mdp" required>
        <br>
        <input type="submit" name="envoie" id="envoie">
    </form>
</body>
</html>