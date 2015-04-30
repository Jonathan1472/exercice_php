<!DOCTYPE html>
<?php
/*-------------------------------------------------------------
* Te pratique Jonathan Rohrbach
* Nom du fichier: edit.php
* Auteur: Jonathan Rohrbach
* Date : 27.04.2015
* Description: Fichier permettant de mettre à jour les informations de la tables cities.
*--------------------------------------------------------------
*/
// Constantes pour se connecter à la base de donnée
const DB_SERVER   = 'localhost';
const DB_USER     = 'cpnv';
const DB_PASSWORD = 'cpnv1234';
const DB_NAME     = 'world';

// Déclaration des variables
//Déclaration des variables
$id=$_POST['ID'];
$district=$_POST['District'];
$population=$_POST['Population'];
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>UPDATE</title>
</head>
<body>
    
<?php

// Contiendra éventuellement un message d'erreur
$error_msg = '';

// Connection à la base de donnée
$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PWD, DB_NAME);

if ($mysqli->connect_errno) {
    
    $error_msg = sprintf('Problème de connexion : (%d) %s',
                         $mysqli->connect_errno, $mysqli->connect_error);
} else {
    
// Requête pour mettre à jour la base de données
$query = "UPDATE City SET District= '$district' , Population = $population WHERE ID = $id ORDER BY Name";
    
// Gestion des erreurs de la requête
    if (!$result = $mysqli->query($query)) {
        
        $error_msg = sprintf('Problème lors de la requête : (%d) %s',
                             $mysqli->errno, $mysqli->error);
    }

// Fermeture de la connexion à la DB
    $mysqli->close();
}

// On rafraichit et on revient à la première page au bout d'une seconde
header( "Refresh:1; url=cities.php");

?>
    
</body>
</html>
