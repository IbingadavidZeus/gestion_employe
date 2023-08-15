<?php
$serveur = "localhost";
$login = "root";
$pass = "";
$dbname = "gestion_employe";
try
{
    $connexion = new PDO("mysql:host=$serveur;dbname=$dbname", $login, $pass);
    $connexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        // echo "vous êtes connectés la Base de Données Gestion Employé.....";   
}

catch(PDOException $e)
{
    echo "la connexion a echoué: " .$e->getMessage();
}

?>