<?php
session_start();
include('connexion_bd.php'); 

if(isset($_POST['envoie']))
{
    if(!empty($_POST['nom_utilisateur']) && !empty($_POST['password_utilisateur']))
    {
        $nom_utilisateur=strip_tags($_POST['nom_utilisateur']);
        $password_utilisateur=(strip_tags($_POST['password_utilisateur']));

        $inseruser = "INSERT INTO utilisateur (nom_utilisateur, password_utilisateur) VALUES (:nom_utilisateur, :password_utilisateur)";
        $stmt = $connexion->prepare($inseruser);
        $stmt->execute
        (
            array
            (
                ':nom_utilisateur'=>$nom_utilisateur,
                ':password_utilisateur'=>$password_utilisateur
            )
           
        );
         header('Location: Accueil.php');

        $selectuser = $connexion->prepare("SELECT * FROM user WHERE pseudo = ? AND mdp = ?");
        $selectuser->execute(array($pseudo, $mdp));

            if($selectuser->rowCount() > 0)
            {
                $_SESSION['nom_utilisateur'] = $nom_utilisateur;
                $_SESSION['password_utilisateur'] = $password_utilisateur;
                $_SESSION['id_utilisateur'] = $selectuser->fetch()['id_utilisateur'];

            }
    
        
    }
    else
    {
        echo "Veuillez compléter les champs....";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_enregistre.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Nouveau Utilisateur</title>
</head>
<body>
        <header class="header">
            <a href="#" class="logo"><i class="fa-solid fa-code"></i> Ing. David MANFOUMBI IBINGA </a>

            <nav class="nav">
                <a href="Accueil.php"> Home </a>
                <a href="#"> About </a>
                <a href="#"> Menu </a>
                <a href="#"> Review </a>
                <a href="#"> Contact </a>
            </nav>
        </header>
    <section class="registre">
        <h2> Inscription </h2>
        <form method="post">
                            <div class="input-box">
                                <span class="icone">
                                <i class="fa-solid fa-user-plus"></i>
                                </span>
                                <input type="text" name="nom_utilisateur" class="input" placeholder="Entrez votre nom">
                            </div>
                            <div class="input-box">
                                <span class="icone">
                                <i class="fa-solid fa-lock"></i>
                                </span>
                                <input type="password" name="password_utilisateur" class="input" placeholder="Entrez votre mot de pass">
                            </div>
                            <button>
                            <input class="submit" value="Creer compte" type="submit" name="envoie" id="envoie"> 
                            </button>
                            <div class="sign-link">
                                <p> Sign up </p>
                                <a href="Accueil.php"> Connexion </a>
                            </div>
                        </form>
    </section>
</body>
</html>