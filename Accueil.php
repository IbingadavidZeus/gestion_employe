<?php
session_start();
include('connexion_bd.php');
if(isset($_POST['envoie']))
{
    if(!empty($_POST['nom_utilisateur']) && !empty($_POST['password_utilisateur']))
    {
        $nom_utilisateur=strip_tags($_POST['nom_utilisateur']);
        $password_utilisateur=(strip_tags($_POST['password_utilisateur']));

        $selectuser = $connexion->prepare("SELECT * FROM utilisateur WHERE nom_utilisateur = ? AND password_utilisateur = ?");
        $selectuser->execute(array($nom_utilisateur, $password_utilisateur));

            if($selectuser->rowCount() > 0)
            {
                $_SESSION['nom_utilisateur'] = $nom_utilisateur;
                $_SESSION['password_utilisateur'] = $password_utilisateur;
                $_SESSION['id_utilisateur'] = $selectuser->fetch()['id_utilisateur'];
                
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
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> Acceuil </title>
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
                <section class="home">
                    <div class="content">
                        <h2> Bienvenue! </h2>
                        <p> L'on me prénomme David, je suis en 2ème Année Analyste-Programmeur à l'Institut Africain d'Informatique.
                            Spécialisé et passionné du developpement Web, toutefois, j'ai des acquis dans les domaines de maintenance informatique et le reseau.
                            Merci.</p>
                    </div>
                    <div class="login">
                        <h2> Connexion</h2>
                        <form method="post">
                            <div class="input-box">
                                <span class="icone">
                                <i class="fa-solid fa-user"></i>
                                </span>
                                <input type="text" class="input" name="num_utilisateur" placeholder="Entrez votre nom" autocomplete="off">
                            </div>                            
                            <div class="input-box">
                                <span class="icone">
                                <i class="fa-solid fa-lock"></i>
                                </span>
                                <input type="password" class="input" name="password_utilisateur" placeholder="Entrez votre mot de pass" autocomplete="off">
                            </div>
                            <button>
                                <input class="submit" value="Connexion" type="submit" name="envoie" id="envoie"> 
                            </button>
                            <div class="sign-link">
                                <pre>
                                    pas de compte <a href="creer_compte.php"> Creer Compte </a>
                                </pre>
                            </div>
                        </form>
                    </div>
                </section>
    </body>
</html>