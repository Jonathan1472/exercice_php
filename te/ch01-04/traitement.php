<?php
/**
 * Fichier traitement.php
 * Auteur: Jonathan Rohrbach
 * Date: 22.05.2015
 * Description: Ce fichier permet de récupérer les informations du fichier exercice.html
 * et afficher un message comprenant ces informations
 */
// Constantes
// Variables

// Ces variables contiennent les données fournies par l'utilisateur. 
$nom    = $_POST['nom'];
$sexe = $_POST['sex'];
$mail    = $_POST['mail'];

?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Vos données</title>
    <meta charset="utf-8">
  </head>
  <body>
    <?php 
    if ($sexe == "male") {
        echo'Bonjour M. $nom, votre adresse courriel est : $mail';
    }
    if ($sexe == "female") {
        echo'Bonjour Mme. $nom, votre adresse courriel est : $mail';
    }
    ?>
    
  </body>
</html>
