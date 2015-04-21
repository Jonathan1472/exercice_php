<!DOCTYPE html>
<?php
/*-------------------------------------------------------------
* Te pratique Jonathan Rohrbach
* Nom du fichier: edit.php
* Auteur: Jonathan Rohrbach
* Date : 13.03.2015
* Description: Fichier permettant de modifier les informations de la tables cities.
*--------------------------------------------------------------
*/
// Constantes pour se connecter à la base de donnée
const DB_SERVER   = 'localhost';
const DB_USER     = 'cpnv';
const DB_PASSWORD = 'cpnv1234';
const DB_NAME     = 'world';

//Déclaration des variables
$id=$_GET['ID'];
?>

<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Modification</title>
</head>
  <body>
      
<?php

    //Connexion à la base de donnée
    $dbh = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

    //Gestion des erreurs de connexion à la base de donnée
    if ($dbh->connect_errno) {
        die("Problème de connexion ({$dbh->connect_errno}) " . $dbh->connect_error);
    }

//Formulaire permettant de modifier les informations

    //Requête pour récupérer les informations
    $query = "SELECT ID, Name, CountryCode, Population, District FROM City WHERE ID = $id ORDER BY Name";
    
    if ($result = $dbh->query($query)) {
        
        //Gestion des erreurs possibles lors de l'envoi de la requête
        if (!$result) {
            $message  = 'Requête incorrect : ' .mysqli_error() . "\n";
            $message .= 'Requête complète : ' . $dbh;
            die($message);
        }
        
        //Affichage de la ville et de ses caractéristiques 
        $city = $result->fetch_assoc();
        ?>
        
<form method="post" action="update.php">
    <p>ID:<input type="text" value="<?= $city['ID']; ?>" name="ID" /></p>
    <p>Name:<input type="text" value="<?= $city['Name']; ?>" /></p>
    <p>CountryCode:<input type="text" value="<?= $city['CountryCode']; ?>" /></p>
    <p>District:<input type="text" value="<?= $city['District']; ?>" name="District" /></p>
    <p>Population:<input type="text" value="<?= $city['Population']; ?>" name="Population" /></p>
    <input type="submit" value="Modifier" />
    <input type="submit" value="Enregistrer" />
</form>

<?php
    }
    $result->free();
    
    //Fermeture de la connexion établit avec la base de données
    $dbh->close();
    ?>
</body>
</html>
