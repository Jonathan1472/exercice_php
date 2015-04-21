<?php
/*------------------------------------------------------
* Nom du fichier: cities.php
* Auteur: Jonathan Rohrbach
* Date : 13.03.2015
* Description: Programme permettant d'afficher les villes Suisses d'une table de donnée.
* -------------------------------------------------------
*/
// Constantes ustilisées pour se connecter à la base de données
const DB_SERVER   = 'localhost';
const DB_USER     = 'cpnv';
const DB_PASSWORD = 'cpnv1234';
const DB_NAME     = 'world';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Lecture d'enregistrements dans une table</title>
</head>
<body>
<?php

//Connection à la base de données

$dbh = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

  //Gestion d'erreur de conexion à la base de données
if ($dbh->connect_errno) {
    $error_msg = sprintf('Problème de connexion : (%d) %s',
                         $dbh->connect_errno, $dbh->connect_error);
}

//Requête pour afficher les villes Suisses
const QUERY = "SELECT ID, Name, CountryCode, District FROM City WHERE CountryCode = 'CHE' ORDER BY Name";

//Affichage du nombre de villes Suisses
if ($result = $dbh->query(QUERY)) {
    $nbr = $result->num_rows;
    echo "Cette base de donnée contient " . $nbr ." villes en Suisse";
}

//Tableau avec les données sur les villes Suisses
  //Création du tableau
?>
  <table border="1">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>CountryCode</td>
        <td>District</td>
        <td>Modifier</td>
    </tr>
<?php

//Boucle affichant les enregistrements
while ($city = $result->fetch_assoc()) { ?>
            
    <tr>
        <td><?php echo $city['ID'];?></td>
        <td><?php echo $city['Name'];?></td>
        <td><?php echo $city['CountryCode'];?></td>
        <td><?php echo $city['District'];?></td>
        <td><a href="edit.php?ID=<?=$city['ID']?>"> modifier </a></td>
    </tr>
<?php
}
$result->free();
//Fermeture de la connexion établit avec la base de données
$dbh->close();
?>

  </table>
</body>
</html>
